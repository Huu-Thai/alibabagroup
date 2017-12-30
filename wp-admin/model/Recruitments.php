<?php

class Recruitments extends DB{
	protected $table = 'recruitments';
	protected $primaryId = 'id';

	public function store($data){

		$lastId = $this->getLastId();
		$id = $lastId + 1;
		$data['alias'] = $this->stripUnicode($data['title']).'-'.$id;

		$query = "INSERT INTO $this->table (`title`, `alias`, `description`, `gender`, `age`, `deadline`, `work_address`, `salary`, `keyword`, `category_id`, `show_hide`) 
		VALUES ('$data[title]', '$data[alias]', '$data[description]', '$data[gender]', '$data[age]', '$data[deadline]', '$data[workAddress]', '$data[salary]', '$data[keyword]', '$data[categoryId]', 0)";

		if($this->execute($query)){

			return mysqli_insert_id($this->conn);
		}
		return false;
		
	}

	public function edit($data){
		$data['alias'] = $this->stripUnicode($data['title']).'-'.$data['id'];

		$query = "UPDATE $this->table SET 
		`title` = '$data[title]', `alias` = '$data[alias]', 
		`description` = '$data[description]', `gender` = $data[gender], 
		`age` = '$data[age]', `deadline` = '$data[deadline]', 
		`work_address` = '$data[workAddress]', `salary` = '$data[salary]',
		`keyword` = '$data[keyword]', `category_id` = '$data[categoryId]'
		WHERE $this->primaryId = $data[id]";

		return $this->execute($query);
	}

	public function listRecruitment(&$totalRow, $pageNum, $pageSize, $keyword){
		$startRow = ($pageNum-1)*$pageSize;

		if ($keyword != ""){
			$query ="SELECT id, title, alias, description, gender, deadline, work_address, salary, show_hide
				FROM $this->table
				WHERE title like '%$keyword%'
				LIMIT $startRow , $pageSize
			";
			$result = $this->result($query);

			$query ="SELECT count(*)
			FROM  $this->table
			WHERE title like '%$keyword%'
			";

		}else{
			$query = "SELECT id, title, alias, description, gender, deadline, work_address, salary, show_hide
				FROM $this->table
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