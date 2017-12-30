<?php

class CategoryController extends Controller{

	public function showCategory(){
		$Category = new Categories;

		$pageSize = 20; 
		$pageNum = 1;

		if(isset($_GET['pageNum']))
			$pageNum = $_GET['pageNum'];
		
		if($pageNum <= 0)
			$pageNum = 1;

		$keyword = '';
		if(isset($_POST['keyword'])){
			$keyword = $_POST['keyword'];
			$keyword = $Category->deleteFormat($keyword);
		}
		
		$data['categories'] = $Category->listCategory($totalRow, $pageNum, $pageSize, $keyword);
		$data['totalRow'] = $totalRow;
		$data['pageSize'] = $pageSize;
		$data['pageNum'] = $pageNum;
		$this->view('category-show', $data);
	}

	public function addCategory(){
		$Category = new Categories;

		$data['cateId'] = $Category->getCateByParent();
		$this->view('category-add', $data);
	}

	public function handleAdd(){
		$Category = new Categories;

		$check = $Category->store($_POST);
		if($check != false){

			header('location:index.php?ctr=CategoryController&action=showCategory');
		}else{

			$this->getlink();
			header('location:'.$_SESSION['linkOld']);
		}
	}

	public function showEditCategory(){
		$Category = new Categories;

		$data['cateId'] = $Category->getCateByParent();
		$data['result'] = $Category->getCategoryById($_GET['id']);

		$this->view('category-edit', $data);
	}

	public function handleEdit(){
		$Category = new Categories;

		$check = $Category->edit($_POST);

		if($check != false){

			header('location:index.php?ctr=CategoryController&action=showCategory');
		}else{

			$this->getlink();
			header('location:'.$_SESSION['linkOld']);
		}
	}

	public function delete(){
		$Category = new Categories;
		
		$check = $Category->deleteRecord($_GET['id']);
		if($check != false){

			header('location:index.php?ctr=CategoryController&action=showCategory');
		}else{

			$this->getlink();
			header('location:'.$_SESSION['linkOld']);
		}
	}

	public function changeShowHide(){
		$Category = new Categories;

		$id = $_POST['id'];

		echo	$Category->changeShowHide($id);

	}
}