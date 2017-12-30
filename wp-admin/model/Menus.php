<?php

class Menus extends DB{
	protected $table = 'menus';
	protected $primaryId = 'id';

	public function store($data){
		$cateMenuId = $this->storeCateMenu($data['name']);
		$flag = false;

		foreach($data['listItem'] as $key => $value){
			$query = "INSERT INTO $this->table (`cate_menu_id`, `category_id`, `ordinal`, `show_id`) 
			VALUES ($cateMenuId, $value, ($key+1), 0)";

			if($this->execute($query))
				$flag = true;
			else
				$flag = false;
		}
		
		if($flag)
			return mysqli_insert_id($this->conn);
		else
			return false;
	}

	public function edit($data){

		foreach($data['listItem'] as $key => $value){
			$query = "UPDATE $this->table SET 
			`cate_menu_id` = $data[cateMenuId], `category_id` = (int)$value
			) 
			WHERE category_id = (int)$value AND cate_menu_id = $data[cateMenuId]";

			$responsive = $this->execute($query);
		}
		
		return $responsive;
	}

	public function storeCateMenu($name){

		$query = "INSERT INTO category_menu(`name`) VALUES('$name')";

		$check = $this->execute($query);
		if($check != false){
			return mysqli_insert_id($this->conn);
		}else{
			return false;
		}
	}

	public function showMenu(){

		$query = "SELECT m.id, m.cate_menu_id, cm.name as menu_name, c.name as cate_name, m.ordinal, m.show_hide  FROM $this->table AS m
		LEFT JOIN category_menu AS cm ON m.cate_menu_id = cm.id
		LEFT JOIN categories AS c ON m.category_id = c.id
		ORDER BY m.cate_menu_id ASC
		";

		return $this->result($query);
	}

	public function getMenuByCateMenu($cateMenuId){

		$query = "SELECT m.id, m.cate_menu_id, cm.name as menu_name, c.name as cate_name, m.ordinal, m.show_hide  
		FROM $this->table AS m
		LEFT JOIN category_menu AS cm ON m.cate_menu_id = cm.id
		LEFT JOIN categories AS c ON m.category_id = c.id
		WHERE m.cate_menu_id = $cateMenuId
		ORDER BY m.cate_menu_id ASC
		";

		return $this->result($query);
	}

	public function getCateIdByCateMenu($cateMenuId){

		$query = "SELECT category_id
		FROM $this->table
		WHERE cate_menu_id = $cateMenuId
		ORDER BY cate_menu_id ASC
		";

		return $this->result($query);
	}

	public function getNameMenu($cateMenuId){

		$query = "SELECT m.cate_menu_id, cm.name as menu_name
		FROM $this->table AS m
		LEFT JOIN category_menu AS cm ON m.cate_menu_id = cm.id
		GROUP BY m.cate_menu_id HAVING m.cate_menu_id = $cateMenuId
		";

		return $this->result($query);
	}

	public function getCateNameMenu(){

		$query = "SELECT m.id, c.name as cate_name FROM $this->table AS m
		LEFT JOIN categories AS c ON m.category_id = c.id
		ORDER BY m.cate_menu_id ASC
		";

		return $this->result($query);
	}
}