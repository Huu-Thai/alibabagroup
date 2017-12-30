<?php 

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root."/lib/class_alibaba.php";

$alibaba = new alibaba;

$name = $_POST['name'];
$phone = trim($_POST['phone']);
if(strlen($phone) < 10 && substr($phone, 0, 1) != 0){

	echo 'số điện thoại không đúng';
}else{

	$email = $_POST['email'];
	$content = $_POST['content'];
	$ipClient = $alibaba->getClientIP();

	$sql = "INSERT INTO `gopy`(`SDT`, `Ngay`, `IP`, `NoiDung`, `HoTen`, `email`) VALUES ('$phone', now(), '$ipClient', '$content', '$name', '$email')";

	if(mysql_query($sql)){

		echo true;

	}else{

		echo "xãy ra xự cố";
	}
}


?>