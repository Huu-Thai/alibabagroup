<?php

class NewsController extends Controller {

	public function showAddNews(){

		$Category = new Categories;

		$data['category'] = $Category->getCategoryByAlias('tin-tuc');
		$this->view('news-add', $data);
	}

	public function handleAddNews(){
		$News = new News;

		if($News->store($_POST) != false){
			
			header('location:index.php?ctr=NewsController&action=showNews');

		}else{

			$this->getLink();
			header('location:'.$_SESSION['linkOld']);
		}

	}

	public function showNews(){
		$News = new News;

		$pageSize = 10;
		$pageNum = 1;

		if(isset($_GET['pageNum']))
			$pageNum = $_GET['pageNum'];
		
		if($pageNum <= 0)
			$pageNum = 1;

		$keyword = '';
		if(isset($_POST['keyword'])){
			$keyword = $_POST['keyword'];
			$keyword = $News->deleteFormat($keyword);
		}

		$data['news'] = $News->listNews($totalRow, $pageNum, $pageSize, $keyword);
		$data['pageNum'] = $pageNum;
		$data['pageSize'] = $pageSize;
		$data['totalRow'] = $totalRow;

		$this->view('news-show', $data);
	}

	public function showEditNews(){
		$News = new News;
		$Category = new Categories;

		$data['category'] = $Category->getCategoryByAlias('tin-tuc');
		$data['news'] = $News->findId($_GET['id']);

		$this->view('news-edit', $data);
	}

	public function handleEditNews(){
		$News = new News;

		$check = $News->edit($_POST);

		if($check != false){

			header('location:index.php?ctr=NewsController&action=showNews');
		}else{

			$this->getlink();
			header('location:'.$_SESSION['linkOld']);
		}
	}

	public function delete(){
		$News = new News;
		
		$check = $News->deleteRecord($_GET['id']);
		if($check != false){

			header('location:index.php?ctr=NewsController&action=showNews');
		}else{

			$this->getlink();
			header('location:'.$_SESSION['linkOld']);
		}
	}

	public function changeShowHide(){
		$News = new News;

		$id = $_POST['id'];

		echo	$News->changeShowHide($id);

	}
}