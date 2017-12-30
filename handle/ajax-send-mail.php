<?php 

// Report all PHP errors (see changelog)
error_reporting(E_ALL);
require_once "../lib/class_alibaba.php";

$alibaba = new alibaba();

if(isset($_FILES['file'])){
	$root = $_SERVER['DOCUMENT_ROOT'].'/upload/';
	extract($_POST);
	
	$extension = array("pdf","docx","doc");

	$email = $_POST['email'];
	$position = $_POST['position'];
	$name = $_POST['name'];

	$result = $alibaba->getRecruitmentById($position);
	$title = mysql_fetch_assoc($result)['title'];

	$file_tmp = $_FILES['file']['tmp_name'];
	$filename = $_FILES['file']['name'];
	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	
	if(in_array($ext, $extension)){

		if(!is_dir($root.'cv')){
			mkdir($root.'cv');
			
		}
		if(!file_exists($root.'cv/'.$filename)){

			move_uploaded_file($file_tmp, $root.'cv/'.$filename);
			$file_path = $root.'cv/'.$filename;
			
		}else{

			$filename = basename($filename, $ext);
			$filename = $filename.time().'.'.$ext;
			move_uploaded_file($file_tmp, $root.'cv/'.$filename);
			$file_path = $root.'cv/'.$filename;
			
		}

		$sql = "INSERT INTO candidate (name, email, recruitment_id, AnHien) 
		VALUES('$name', '$email', $position, 0)";

		if(mysql_query($sql)){

			$content = "from: ".$email."\n".$title;
			ob_start();
			$check = $alibaba->Mailer($email, $name, $title, $content, $file_path);
			ob_get_clean();
			
			if($check){

				echo "Gởi mail thành công";

			}else{

				echo "gởi mail thất bại, làm ơn hãy gửi mail đến chúng tôi từ google mail của bạn";
			}
		}else{

			echo "gởi mail thất bại, làm ơn hãy gửi mail đến chúng tôi từ google mail của bạn";
		}
		

	}else{

		echo "định dạng file không cho phép";
	}

}
?>