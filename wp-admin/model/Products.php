<?php

class Products extends DB{
	protected $table = 'products';
	protected $primaryId = 'id';

	public function store($data){

		$lastId = $this->getLastId();
		$id = $lastId + 1;
		$data['alias'] = $this->stripUnicode($data['title']).'-'.$id;
		$userId = $_SESSION['user']['id'];

		$query = "INSERT INTO $this->table (`title`, `alias`, `url_image`, `short_description`, `description`, `keyword`, `user_id`, `category_id`, `post_date`, `fee`, `period_time`, `scrope_work`, `show_hide`) 
				VALUES ('$data[title]', '$data[alias]', '$data[urlImage]', '$data[shortDes]', '$data[description]', '$data[keyword]', $userId, $data[categoryId], now(), '$data[fee]', '$data[periodTime]', '$data[scropeWork]', 0)";

		if($this->execute($query)){

			return mysqli_insert_id($this->conn);
		}
		return false;
		
	}

	public function edit($data){

		$data['alias'] = $this->stripUnicode($data['title']).'-'.$data['id'];
		$userId = $_SESSION['user']['id'];

		$query = "UPDATE $this->table 
		SET `title` = '$data[title]', `alias` = '$data[alias]', `url_image` = '$data[urlImage]', `short_description` = '$data[shortDes]', `description` = '$data[description]', `keyword` = '$data[keyword]', `user_id` = $userId, `category_id` = $data[categoryId], `post_date` = now(), `fee` = '$data[fee]', `period_time` = '$data[periodTime]', `scrope_work` = '$data[scropeWork]' 
		WHERE $this->primaryId = $data[id]";

		return $this->execute($query);
	}

	public function listProduct(&$totalRow, $pageNum, $pageSize, $keyword){
		$startRow = ($pageNum-1)*$pageSize;

		if ($keyword != ""){
			$query ="SELECT p.id, p.title, p.alias, p.url_image, p.short_description, p.show_hide, c.name as name_cate, u.name as name_user
				FROM $this->table AS p
				LEFT JOIN categories AS c ON p.category_id = c.id
				LEFT JOIN users AS u ON .user_id = u.id
				WHERE title like '%$keyword%'
				LIMIT $startRow , $pageSize
			";
			$result = $this->result($query);

			$query ="SELECT count(*)
			FROM  $this->table
			WHERE title like '%$keyword%'
			";
		}else{
			$query = "SELECT p.id, p.title, p.alias, p.url_image, p.short_description, p.show_hide, c.name as name_cate, u.name as name_user
				FROM $this->table AS p
				LEFT JOIN categories AS c ON p.category_id = c.id
				LEFT JOIN users AS u ON p.user_id = u.id
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