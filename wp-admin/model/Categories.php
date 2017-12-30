<?php

class Categories extends DB{
	protected $table = 'categories';
	protected $primaryId = 'id';

	public function store($data){

		// $lastId = $this->getLastId();
		// $id = $lastId + 1;
		$data['alias'] = $this->stripUnicode($data['name']);
		$data['shortDes'] = trim($data['shortDes']);

		$query = "INSERT INTO $this->table(`name`, `alias`, `url_image`, `short_description`, `parent_id`, `show_hide`) 
				VALUES ('$data[name]', '$data[alias]', '$data[urlImage]', '$data[shortDes]', $data[parentId], 0)";

		if($this->execute($query)){

			return mysqli_insert_id($this->conn);
		}
		return false;
		
	}

	public function edit($data){

		// $lastId = $this->getLastId();
		// $id = $lastId + 1;
		$data['alias'] = $this->stripUnicode($data['name']);
		$data['shortDes'] = trim($data['shortDes']);

		$query = "UPDATE $this->table SET `name` = '$data[name]', `alias` = '$data[alias]', `url_image` = '$data[urlImage]', `short_description` = '$data[shortDes]', `parent_id` = $data[parentId], `created_at` = now() WHERE $this->primaryId = $data[id]";

		return $this->execute($query);
	}

	public function listCategory(&$totalRow, $pageNum, $pageSize, $keyword){
		$startRow = ($pageNum-1)*$pageSize;

		if ($keyword != ""){
			$query ="SELECT id, name, url_image, short_description, show_hide FROM $this->table
				WHERE name like '%$keyword%'
				LIMIT $startRow , $pageSize
			";
			$result = $this->result($query);

			$query ="SELECT count(*)
			FROM  $this->table
			WHERE name like '%$keyword%'
			";
		}else{
			$query = "SELECT id, name, url_image, short_description, show_hide FROM $this->table
				LIMIT $startRow , $pageSize
			";
			$result = $this->result($query);

			$query ="SELECT count(*) FROM  $this->table";
		}
		$resultTotal = $this->result($query);
		$totalRow = mysqli_fetch_row($resultTotal)[0];
		
		return $result;
	}

	public function getCateByParent($parentId = 0){

		$query = "SELECT id, name FROM $this->table WHERE parent_id = $parentId";

		return $this->result($query);
	}

	public function getCategoryById($id){

		$query = "SELECT id, name, url_image, short_description, parent_id
				FROM $this->table WHERE $this->primaryId = $id
		";

		return $this->result($query);
	}
	
	public function getAllCategory(){

		$query = "SELECT id, name FROM $this->table";

		return $this->result($query);
	}
}