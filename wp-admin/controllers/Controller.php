<?php

class Controller{
	public $pathCtr = 'wp-admin/controllers/';
	public $pathModel = 'wp-admin/model/';


	function __construct(){


	}

	function view($page, $data = []){
		$_SESSION['linkCurrent'] = (isset($_SERVER['https']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		$NewsController = new NewsController;
		$ProductController = new ProductController;
		$RecruitmentController = new RecruitmentController;
		$ServiceController = new RecruitmentController;
		
		$User = new Users;
		$Category = new Categories;
		$News = new News;
		if(!isset($_SESSION['user']['id'])){

			require_once 'view/login.php';
		}else{

			require_once "view/master.php";
		}
	}

	function getLink(){
		if(isset($_SESSION['linkCurrent']))
			$_SESSION['linkOld'] = $_SESSION['linkCurrent'];
		$_SESSION['linkCurrent'] = (isset($_SERVER['HTTPS']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	}

	function pagesList($totalRow , $pageNum = 1, $pageSize = 5, $offset = 5){
		$str="";
		$baseURL = $_SERVER['PHP_SELF'];
		parse_str($_SERVER['QUERY_STRING'],$arr);
		unset($arr['pageNum']);
		foreach($arr as $k=> $v) $str.= "&{$k}={$v}";
		$baseURL .="?".$str;

		if ($totalRow <=0) return "";
		$totalPages = ceil($totalRow / $pageSize);
		if ($totalPages <= 1) return "";

		$firstLink="";  $prevLink="";  $lastLink="";  $nextLink="";

		if ($pageNum > 1) {
			$firstLink = "<a href='$baseURL'><img src='img/phantrang_first.png' width=16px height=16px /></a>";
			$prevPage = $pageNum - 1;
			$prevLink = "<a href='$baseURL&pageNum=$prevPage'><img src='img/phantrang_previous.png' width=16px height=16px /></a>";
		}

		$from = $pageNum - $offset;
		$to = $pageNum + $offset;
		if ($from <=0) { $from = 1;   $to = $offset*2; }
		if ($to > $totalPages) { $to = $totalPages; }

		$links = "";
		for($j = $from; $j <= $to; $j++) {
			
			if ($j==$pageNum)
				$links= $links . "<span class='phan_trang'>$j</span>";
			else
				$links= $links . "<a class='trang' href = '$baseURL&pageNum=$j'>$j</a>";
			
		}
		if ($pageNum < $totalPages) {
			$lastLink = "<a href='$baseURL&pageNum=$totalPages'><img src='img/phantrang_last.png' width=16px height=16px /></a>";
			$nextPage = $pageNum + 1;
			$nextLink = "<a href='$baseURL&pageNum=$nextPage'><img src='img/phantrang_next.png' width=16px height=16px /></a>";
		}

		return $firstLink.$prevLink.$links.$nextLink.$lastLink;
	}
}