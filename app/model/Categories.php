<?php

class Categories extends DB{
	protected $table = 'categories';
	protected $primaryId = 'id';

	public function store($data){

		$query = "INSERT INTO $this->table (`name`, `alias`, `url_image`, `short_description`, `parent_id`) 
				VALUES ('$data[name]', '$data[alias]', '$data[url_image]', '$data[short_description]', $data['parent_id'])";

		if($this->execute($query)){

			return mysqli_insert_id($this->conn);
		}
		return false;
		
	}

	public function edit($data){

		$query = "UPDATE $this->table SET `name` = '$data[name]', `alias` = '$data[alias]', `url_image` = '$data[url_image]', `short_description` = '$data[short_description]', `parent_id` = $parentId, `created_at` = now()) WHERE $this->primaryId = $data[id]";

		return $this->execute($query);
	}

	

}