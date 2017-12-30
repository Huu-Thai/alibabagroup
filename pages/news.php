
<?php 
	$TieuDeKD = $_GET['TieuDeKD'];
	$loai = $alibaba->getLoaiByTieuDeKD($TieuDeKD);
	if($loai != false){
		$page = mysql_fetch_assoc($loai)['TieuDe'];
	}
 ?>
<?php include "modules/banner.php"; ?>
<div class="clearfix"></div>

<?php include "modules/content-news-page.php"; ?>
<div class="clearfix"></div>
