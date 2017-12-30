<?php
session_start();


$root = $_SERVER['DOCUMENT_ROOT'].'/alibabagroup/';
$pathController = $root.'wp-admin/controllers/';
$pathModel = $root.'wp-admin/model/';

require_once $pathController.'Controller.php';
require_once $pathController.'HomeController.php';
require_once $pathController.'UserController.php';
require_once $pathController.'CategoryController.php';
require_once $pathController.'MenuController.php';
require_once $pathController.'NewsController.php';
require_once $pathController.'ProductController.php';
require_once $pathController.'RecruitmentController.php';
require_once $pathController.'ServiceController.php';



require_once $root.'app/model/DB.php';
require_once $pathModel.'Menus.php';
require_once $pathModel.'Categories.php';
require_once $pathModel.'News.php';
require_once $pathModel.'Options.php';
require_once $pathModel.'Products.php';
require_once $pathModel.'Recruitments.php';
require_once $pathModel.'Services.php';
require_once $pathModel.'Users.php';
require_once $pathModel.'Menus.php';


$ctr = 'HomeController';
$action = 'index';

if(isset($_GET['ctr']) && isset($_GET['action'])){
    $ctr = $_GET['ctr'];
    $action = $_GET['action'];
}

$controller = new $ctr;
$controller->$action();