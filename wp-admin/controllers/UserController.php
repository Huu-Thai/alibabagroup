<?php

class UserController extends Controller{

	public function showLogin(){

		require_once "view/login.php";
	}

	public function handleLogin(){
		$User = new Users;
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$check = $User->checkUserExists($username, $password);
		if($check != false){
			// $_SESSION['user'] = [];
			foreach($check as $key => $value){
				$_SESSION['user'][$key] = $value;
			}
			header('location:./');
		}else{

			$_SESSION['error'] = 'Mật khẩu hoặc tài khoản không chính xác';
			header('location:index.php?ctr=UserController&action=showLogin');
		}
	}

	public function showAdd(){

		$this->view('user-add');
	}

	public function store(){

		$User = new Users;

		$_POST['avatar'] = $User->deleteFormat($_POST['avatar']);
		$_POST['password'] = md5($_POST['password']);

		if($User->store($_POST) != false){

			header('location:index.php?ctr=UserController&action=showUser');
		}else{
			$this->getLink();
			$_SESSION['error'] = 'Thông tin không đúng quy định';
			header('location:'.$_SESSION['linkOld']);
		}	
	}

	public function showUser(){
		$User = new Users;

		$pageSize = 10; 
		$pageNum = 1;

		if(isset($_GET['pageNum']))
			$pageNum = $_GET['pageNum'];
		
		if($pageNum <= 0)
			$pageNum = 1;

		$keyword = '';
		if(isset($_GET['keyword'])){
			$keyword = $_GET['keyword'];
			$keyword = $User->deleteFormat($keyword);
		}
		
		$data['users'] = $User->listUser($totalRow, $pageNum, $pageSize, $keyword);

		$this->view('user-show', $data);
	}

	
}