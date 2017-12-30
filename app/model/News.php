<?php

class News extends DB{
	protected $table = 'news';
	protected $primaryId = 'id';

	public function store($data){
// 		echo "blabla";
// var_dump($data);
		// $lastId = $this->getLastId();
		// $id = $lastId + 1;
		// $data['alias'] = $this->stripUnicode($data['title']).'-'.$id;

		// $query = "INSERT INTO $this->table (`title`, `alias`, `url_image`, `short_description`, `description`, `user_id`, `category_id`, `post_date`) 
		// 		VALUES ('$data[title]', '$data[alias]', '$data[urlImage]', '$data[shortDes]', '$data[description]', $_SESSION['user']['id'], $data['categoryId'], now())";

		// if($this->execute($query)){

		// 	return mysqli_insert_id($this->conn);
		// }
		// return false;
		
	}

	// public function edit($data){

	// 	$query = "UPDATE $this->table SET `title` = '$data[title]', `alias` = '$data[alias]', `url_image` = '$data[url_image]', `short_description` = '$data[short_description]', `description` = '$data[description]', `user_id` = $data['user_id'], `post_date` = now()) WHERE $this->primaryId = $data['id']";

	// 	return $this->execute($query);
	// }

}