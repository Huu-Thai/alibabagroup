<?php 
$TieuDeKD = $_GET['TieuDeKD'];

$result = $alibaba->getNewsDetail($TieuDeKD);
$row = mysql_fetch_assoc($result);
$loai = $alibaba->getLoaiByTieuDeKD($p);
if($loai != false){
	$page = mysql_fetch_assoc($loai)['TieuDe'];
}

?>
<?php include "modules/banner.php"; ?>

<div class="clearfix"></div>
<?php include "modules/product-detail.php" ?>
<div class="clearfix"></div>
