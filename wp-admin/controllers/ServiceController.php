<?php

class ServiceController extends Controller {

	public function showAddService(){

		$Category = new Categories;

		$data['category'] = $Category->getCategoryByAlias('dich-vu');
		$this->view('Service-add', $data);
	}

	public function handleAddService(){
		$Service = new Services;

		if($Service->store($_POST) != false){

			header('location:index.php?ctr=ServiceController&action=showService');

		}else{

			$this->getLink();
			header('location:'.$_SESSION['linkOld']);
		}

	}

	public function showService(){
		$Service = new Services;

		$pageSize = 10;
		$pageNum = 1;

		if(isset($_GET['pageNum']))
			$pageNum = $_GET['pageNum'];
		
		if($pageNum <= 0)
			$pageNum = 1;

		$keyword = '';
		if(isset($_POST['keyword'])){
			$keyword = $_POST['keyword'];
			$keyword = $Service->deleteFormat($keyword);
		}

		$data['service'] = $Service->listService($totalRow, $pageNum, $pageSize, $keyword);
		$data['pageNum'] = $pageNum;
		$data['pageSize'] = $pageSize;
		$data['totalRow'] = $totalRow;

		$this->view('service-show', $data);
	}

	public function showEditService(){
		$Service = new Services;
		$Category = new Categories;

		$data['category'] = $Category->getCategoryByAlias('dich-vu');
		$data['service'] = $Service->findId($_GET['id']);

		$this->view('service-edit', $data);
	}

	public function handleEditService(){
		$Service = new Services;

		$check = $Service->edit($_POST);

		if($check != false){

			header('location:index.php?ctr=ServiceController&action=showService');
		}else{

			$this->getlink();
			header('location:'.$_SESSION['linkOld']);
		}
	}

	public function delete(){
		$Service = new Services;
		
		$check = $Service->deleteRecord($_GET['id']);
		if($check != false){

			header('location:index.php?ctr=ServiceController&action=showService');
		}else{

			$this->getlink();
			header('location:'.$_SESSION['linkOld']);
		}
	}

	public function changeShowHide(){
		$Service = new Services;

		$id = $_POST['id'];

		echo	$Service->changeShowHide($id);

	}
}