<?php 

require_once "../lib/class_alibaba.php";

$alibaba = new alibaba();

$id = $_POST['id'];

$result = $alibaba->getRecruitmentById($id);

if($result != false){
	echo json_encode(mysql_fetch_assoc($result));
}else{
	echo '';
}