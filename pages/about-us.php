
<?php 
	$TieuDeKD = $_GET['TieuDeKD'];
	$loai = $alibaba->getLoaiByTieuDeKD($TieuDeKD);
	if($loai != false){
		$page = mysql_fetch_assoc($loai)['TieuDe'];
	}
 ?>
<?php include "modules/banner.php"; ?>
<div class="clear30"></div>
<?php include "modules/about-us-content.php"; ?>
<div class="clear50"></div>
