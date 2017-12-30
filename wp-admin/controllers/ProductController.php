<?php

class ProductController extends Controller {

	public function showAddProduct(){

		$Category = new Categories;

		$data['category'] = $Category->getCategoryByAlias('san-pham');
		$this->view('product-add', $data);
	}

	public function handleAddProduct(){
		$Product = new Products;

		if($Product->store($_POST) != false){

			header('location:index.php?ctr=ProductController&action=showProduct');

		}else{

			$this->getLink();
			header('location:'.$_SESSION['linkOld']);
		}

	}

	public function showProduct(){
		$Product = new Products;

		$pageSize = 10;
		$pageNum = 1;

		if(isset($_GET['pageNum']))
			$pageNum = $_GET['pageNum'];
		
		if($pageNum <= 0)
			$pageNum = 1;

		$keyword = '';
		if(isset($_POST['keyword'])){
			$keyword = $_POST['keyword'];
			$keyword = $Product->deleteFormat($keyword);
		}

		$data['product'] = $Product->listProduct($totalRow, $pageNum, $pageSize, $keyword);
		$data['pageNum'] = $pageNum;
		$data['pageSize'] = $pageSize;
		$data['totalRow'] = $totalRow;

		$this->view('product-show', $data);
	}

	public function showEditProduct(){
		$Product = new Products;
		$Category = new Categories;

		$data['category'] = $Category->getCategoryByAlias('san-pham');
		$data['product'] = $Product->findId($_GET['id']);

		$this->view('product-edit', $data);
	}

	public function handleEditProduct(){
		$Product = new Products;

		$check = $Product->edit($_POST);

		if($check != false){

			header('location:index.php?ctr=ProductController&action=showProduct');
		}else{

			$this->getlink();
			header('location:'.$_SESSION['linkOld']);
		}
	}

	public function delete(){
		$Product = new Products;
		
		$check = $Product->deleteRecord($_GET['id']);
		if($check != false){

			header('location:index.php?ctr=ProductController&action=showProduct');
		}else{

			$this->getlink();
			header('location:'.$_SESSION['linkOld']);
		}
	}

	public function changeShowHide(){
		$Product = new Products;

		$id = $_POST['id'];

		echo	$Product->changeShowHide($id);

	}
}