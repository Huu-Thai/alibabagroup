<?php

class Services extends DB{
	protected $table = 'services';
	protected $primaryId = 'id';

	public function store($data){

		$lastId = $this->getLastId();
		$id = $lastId + 1;
		$data['alias'] = $this->stripUnicode($data['title']).'-'.$id;

		$query = "INSERT INTO $this->table (`title`, `alias`, `url_image`, `short_description`, `description`, `keyword`, `category_id`, `show_hide`) 
				VALUES ('$data[title]', '$data[alias]', '$data[urlImage]', '$data[shortDes]', '$data[description]', '$data[keyword]', $data[categoryId], 0)";

		if($this->execute($query)){

			return mysqli_insert_id($this->conn);
		}
		return false;
		
	}

	public function edit($data){

		$data['alias'] = $this->stripUnicode($data['title']).'-'.$data['id'];

		$query = "UPDATE $this->table SET 
		`title` = '$data[title]', `alias` = '$data[alias]',
		`url_image` = '$data[urlImage]', 
		`short_description` = '$data[shortDes]',
		`description` = '$data[description]',
		`keyword` = '$data[keyword]',
		`category_id` = $data[categoryId]
		WHERE $this->primaryId = $data[id]";

		return $this->execute($query);
	}

	public function listService(&$totalRow, $pageNum, $pageSize, $keyword){
		$startRow = ($pageNum-1)*$pageSize;

		if ($keyword != ""){
			$query ="SELECT s.id, s.title, s.alias, s.short_description, c.name as cate_name, s.show_hide
				FROM $this->table AS s
				LEFT JOIN categories AS c ON s.category_id = c.id
				WHERE title like '%$keyword%'
				LIMIT $startRow , $pageSize
			";
			$result = $this->result($query);

			$query ="SELECT count(*)
			FROM  $this->table
			WHERE title like '%$keyword%'
			";

		}else{
			$query = "SELECT s.id, s.title, s.alias, s.short_description, c.name as cate_name, s.show_hide
				FROM $this->table AS s
				LEFT JOIN categories AS c ON s.category_id = c.id
				LIMIT $startRow , $pageSize
			";

			$result = $this->result($query);

			$query ="SELECT count(*) FROM  $this->table";
		}
		$resultTotal = $this->result($query);
		$totalRow = mysqli_fetch_row($resultTotal)[0];
		
		return $result;
	}

	public function findCateById($id){

		$query = "SELECT c.name 
			FROM $this->table AS p
			LEFT JOIN categories AS c ON p.category_id = c.id
			WHERE $this->primaryId = $id 
			";

		$result = $this->result($query);

		if($result != false){
			mysqli_data_seek($result);
			return mysqli_fetch_assoc($result)['name'];
		}
		return false;
	}
}