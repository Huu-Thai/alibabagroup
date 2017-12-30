<?php

class RecruitmentController extends Controller {

	public function showAddRecruitment(){

		$Category = new Categories;

		$data['category'] = $Category->getCategoryByAlias('tuyen-dung');
		$this->view('recruitment-add', $data);
	}

	public function handleAddRecruitment(){
		$Recruitment = new Recruitments;

		if($Recruitment->store($_POST) != false){

			header('location:index.php?ctr=RecruitmentController&action=showRecruitment');

		}else{

			$this->getLink();
			header('location:'.$_SESSION['linkOld']);
		}

	}

	public function showRecruitment(){
		$Recruitment = new Recruitments;

		$pageSize = 10;
		$pageNum = 1;

		if(isset($_GET['pageNum']))
			$pageNum = $_GET['pageNum'];
		
		if($pageNum <= 0)
			$pageNum = 1;

		$keyword = '';
		if(isset($_POST['keyword'])){
			$keyword = $_POST['keyword'];
			$keyword = $Recruitment->deleteFormat($keyword);
		}

		$data['recruitment'] = $Recruitment->listRecruitment($totalRow, $pageNum, $pageSize, $keyword);
		$data['pageNum'] = $pageNum;
		$data['pageSize'] = $pageSize;
		$data['totalRow'] = $totalRow;

		$this->view('recruitment-show', $data);
	}

	public function showEditRecruitment(){
		$Recruitment = new Recruitments;
		$Category = new Categories;

		$data['category'] = $Category->getCategoryByAlias('tuyen-dung');
		$data['recruitment'] = $Recruitment->findId($_GET['id']);

		$this->view('recruitment-edit', $data);
	}

	public function handleEditRecruitment(){
		$Recruitment = new Recruitments;

		$check = $Recruitment->edit($_POST);

		if($check != false){

			header('location:index.php?ctr=RecruitmentController&action=showRecruitment');
		}else{

			$this->getlink();
			header('location:'.$_SESSION['linkOld']);
		}
	}

	public function delete(){
		$Recruitment = new Recruitments;
		
		$check = $Recruitment->deleteRecord($_GET['id']);
		if($check != false){

			header('location:index.php?ctr=RecruitmentController&action=showRecruitment');
		}else{

			$this->getlink();
			header('location:'.$_SESSION['linkOld']);
		}
	}

	public function changeShowHide(){
		$Recruitment = new Recruitments;

		$id = $_POST['id'];

		echo	$Recruitment->changeShowHide($id);

	}
}