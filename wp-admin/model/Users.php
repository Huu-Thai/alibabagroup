<?php

class Users extends DB{
	protected $table = 'users';
	protected $primaryId = 'id';


	function store($data){

		if(empty($data['avatar'])){
			$data['avatar'] = '../images/profile.png';
		}
		$query = "INSERT INTO $this->table (`name`, `username`, `password`, `avatar`, `group_id`)
		VALUES ('$data[name]', '$data[username]', '$data[password]', '$data[avatar]', $data[groupId])";

		if($this->execute($query) != false)
			return mysqli_insert_id($this->conn);
		else
			return false;
	}


	public function checkUserExists($username, $password){

		$query = "SELECT * FROM $this->table WHERE username = '$username' AND password = '$password'";

		$result = $this->result($query);

		if($result != false){
			mysqli_data_seek($result, 0);
			return mysqli_fetch_assoc($result);
		}else{

			return false;
		}	
	}

	public function getGroupUser(){

		$query = "SELECT id, task FROM groups";

		return $this->result($query);
	}

	public function showAllUser(){

		$query = "SELECT u.(*), g.task FROM $this->table AS u
				LEFT JOIN groups AS g ON u.group_id = g.id
				ORDER BY group_id ASC
		";

		return $this->result($query);
	}

	public function listUser(&$totalRow, $pageNum, $pageSize, $keyword){
		$startRow = ($pageNum-1)*$pageSize;

		if ($keyword != ""){
			$query ="SELECT u.*, g.task FROM $this->table AS u
				LEFT JOIN groups AS g ON u.group_id = g.id
				WHERE name like '%$keyword%'
				ORDER BY group_id DESC
				LIMIT $startRow , $pageSize
			";
			$result = $this->result($query);

			$query ="SELECT count(*)
			FROM  $this->table
			WHERE name like '%$keyword%'
			";
		}else{
			$query = "SELECT u.*, g.task FROM $this->table AS u
				LEFT JOIN groups AS g ON u.group_id = g.id
				ORDER BY group_id DESC
				LIMIT $startRow , $pageSize
			";
			$result = $this->result($query);

			$query ="SELECT count(*) FROM  $this->table";
		}
		$resultTotal = $this->result($query);
		$totalRow = mysqli_fetch_row($resultTotal)[0];
		
		return $result;
	}
}