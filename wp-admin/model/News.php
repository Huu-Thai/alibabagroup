<?php

class News extends DB{
	protected $table = 'news';
	protected $primaryId = 'id';

	public function store($data){

		$lastId = $this->getLastId();
		$id = $lastId + 1;
		$data['alias'] = $this->stripUnicode($data['title']).'-'.$id;
		$userId = $_SESSION['user']['id'];

		$query = "INSERT INTO $this->table (`title`, `alias`, `url_image`, `short_description`, `description`, `keyword`, `user_id`, `category_id`, `post_date`, `show_hide`) 
				VALUES ('$data[title]', '$data[alias]', '$data[urlImage]', '$data[shortDes]', '$data[description]', '$data[keyword]', $userId, $data[categoryId], now(), 0)";

		if($this->execute($query)){

			return mysqli_insert_id($this->conn);
		}
		return false;
		
	}

	public function edit($data){

		$data['alias'] = $this->stripUnicode($data['title']).'-'.$data['id'];
		$userId = $_SESSION['user']['id'];

		$query = "UPDATE $this->table SET `title` = '$data[title]', `alias` = '$data[alias]', `url_image` = '$data[urlImage]', `short_description` = '$data[shortDes]', `description` = '$data[description]', `keyword` = '$data[keyword]', `user_id` = $userId, `category_id` = $data[categoryId], `post_date` = now() WHERE $this->primaryId = $data[id]";

		return $this->execute($query);
	}

	public function listNews(&$totalRow, $pageNum, $pageSize, $keyword){
		$startRow = ($pageNum-1)*$pageSize;

		if ($keyword != ""){
			$query ="SELECT n.id, n.title, n.alias, n.url_image, n.short_description, n.show_hide, c.name as name_cate, u.name as name_user
				FROM $this->table AS n
				LEFT JOIN categories AS c ON n.category_id = c.id
				LEFT JOIN users AS u ON n.user_id = u.id
				WHERE title like '%$keyword%'
				LIMIT $startRow , $pageSize
			";
			$result = $this->result($query);

			$query ="SELECT count(*)
			FROM  $this->table
			WHERE title like '%$keyword%'
			";
		}else{
			$query = "SELECT n.id, n.title, n.alias, n.url_image, n.short_description, n.show_hide, c.name as name_cate, u.name as name_user
				FROM $this->table AS n
				LEFT JOIN categories AS c ON n.category_id = c.id
				LEFT JOIN users AS u ON n.user_id = u.id
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
			FROM $this->table AS n
			LEFT JOIN categories AS c ON n.category_id = c.id
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