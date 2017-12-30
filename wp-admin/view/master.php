<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>ProAdmin</title>

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-ui.js"></script>
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="ckfinder/ckfinder.js"></script>
	<script type='text/javascript' src='js/jquery.cookie.js'></script>
	<link rel="stylesheet" href="css/accordionmenu.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/jquery-ui.css" type="text/css" media="screen" />
	<link href="css/styles.css" rel="stylesheet" type="text/css" />

	<script>
		$(document).ready(function() {	
			setTimeout(hieuchinh,500);		
		});

		function hieuchinh()
		{
			var h1 = $("#leftcolumn").height();
			var h2 = $("#content").height();
			var m = h1;
			if (h2 > h1) m = h2;
			$("#leftcolumn").height(m+41);
			$("#content").height(m);

		}
	</script>
	<script>
		$(document).ready(function(){
			displayThumbnail();
		});
		function BrowseServer( startupPath, functionData ){
			var finder = new CKFinder();
			finder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
			finder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
			finder.selectActionFunction = SetFileField; // hàm sẽ được gọi khi 1 file được chọn
			finder.selectActionData = functionData; //id của text field cần hiện địa chỉ hình
			finder.selectThumbnailActionFunction = ShowThumbnails; //hàm sẽ được gọi khi 1 file thumnail được chọn
			finder.popup(); // Bật cửa sổ CKFinder
		} //BrowseServer

		function SetFileField( fileUrl, data ){
			document.getElementById( data["selectActionData"] ).value = fileUrl;
			displayThumbnail();
		}
		function ShowThumbnails( fileUrl, data ){
			var sFileName = this.getSelectedFile().name; // this = CKFinderAPI
			document.getElementById( 'thumbnails' ).innerHTML +=
			'<div class="thumb">' +
			'<img src="' + fileUrl + '" />' +
			'<div class="caption">' +
			'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
			'</div>' +
			'</div>';
			document.getElementById( 'preview' ).style.display = "";
			return false; // nếu là true thì ckfinder sẽ tự đóng lại khi 1 file thumnail được chọn

		}

		function displayThumbnail(){
			var value = $('#urlImage').val();
			if (value != "") {
				var bien = "<img src='"+value+"' width='150' height='150'>";
				$('#thumbnail').html(bien);
			};
		}

	</script>
</head>
<body>

	<div class="bodytext" id="submenu"> 
		<marquee style="color:#FFF">Chào mừng bạn đến với trang quản trị. Chúc bạn có ngày làm việc vui vẻ</marquee>
	</div>


	<div id="logo">
		<div align="center"><br />
			<img src="images/logo.png" alt="logo" width="116" height="34" /><br />
		</div>
	</div>

	<div id="arrows"></div>

	<div class="bodytext" id="hello">Chào bạn: <a href="#"><?=(isset($_SESSION['user']['name']) ? $_SESSION['user']['name']: '')?></a>, 
		<img src="images/icons/user.png" alt="user_icon" width="22" height="25" border="0" /><br />
		<a style="margin: 0 0 0 60px;" href="thoat.php">Thoát</a>

	</div>

	<div style="display: none;" class="bodytext" id="dropdown">

		<div class="clear"> </div>
	</div>

	<div id="leftcolumn">
		<div id="navigation"><img src="images/title_bg.png" alt="titlebg" width="180" height="49" />
			<div class="toplinks style1" id="navigationtitle"><strong>Mục Lục</strong><br /> <!--// Title -->
				<br />
				<?php  include "module/menu.php"; ?>
				<br />
			</div>
		</div>
	</div>

	<div id="content"> 

		<?php if(isset($page)): ?>
			<?php include "pages/".$page.'.php'; ?>
		<?php endif; ?>

	</div>
	
</body>
</html>

