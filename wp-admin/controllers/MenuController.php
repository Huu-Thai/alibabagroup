<?php

class MenuController extends Controller{

	public function addMenu(){
		$Category = new Categories;

		$data['result'] = $Category->getAllCategory();
		$this->view('menu-add', $data);
	}

	public function handleAddMenu(){
		$Menu = new Menus;

		if($Menu->store($_POST) != false){

			header('location:index.php?ctr=MenuController&action=showMenu');
		}else{

			$this->getLink();
			header('location:'.$_SESSION['linkOld']);
		}
	}

	public function showMenu(){
		$Menu = new Menus;

		$data['menu'] = $Menu->showMenu();

		$this->view('menu-show', $data);

	}

	public function changeOrdinal(){
		$Menu = new Menus;

		$id = (int)$_POST['id'];
		$ordinal = (int)$_POST['ordinal'];
		echo $Menu->changeOrdinal($ordinal, $id);
	}

	public function changeShowHide(){
		$Menu = new Menus;

		$id = (int)$_POST['id'];

		echo	$Menu->changeShowHide($id);
	}

	public function showEditMenu(){
		$Menu = new Menus;
		$Category = new Categories;

		$result = $Menu->getCateIdByCateMenu($_GET['cateMenuId']);
	
		if($result != false){
			mysqli_data_seek($result, 0);
			while($row = mysqli_fetch_assoc($result)){
				$data['listItemMenu'][] = $row['category_id'];
			}
		}
		
		$result = $Menu->getNameMenu($_GET['cateMenuId']);
		mysqli_data_seek($result, 0);
		$data['nameMenu'] = mysqli_fetch_assoc($result);

		$data['cateNameMenu'] = $Category->getAllCategory();
		$this->view('menu-edit', $data);
	}

	public function handleEditMenu(){
		$Menu = new Menus;
// var_dump($_POST);
		if($Menu->edit($_POST)){

			// header('location:index.php?ctr=MenuController&action=showMenu');
		}else{
			$this->getLink();
			// header('location:'.$_SESSION['linkOld']);
		}



	}
}