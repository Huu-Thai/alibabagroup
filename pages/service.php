<?php 
// if(isset($_GET['TieuDeKD'])) $Tie
// $loai = $alibaba->getLoaiByTieuDeKD($p);
// if($loai != false){
// 	$page = mysql_fetch_assoc($loai)['TieuDe'];
// }
?>

<?php 
$TieuDeKD = $_GET['TieuDeKD'];
if($TieuDeKD == 'dich-vu'){
	$loai = $alibaba->getLoaiByTieuDeKD($TieuDeKD);
	if($loai != false){
		$page = mysql_fetch_assoc($loai)['TieuDe'];
	}
}else{
	$loai = $alibaba->getServiceByTieuDeKD($TieuDeKD);
	if($loai != false){
		$page = mysql_fetch_assoc($loai)['TieuDe'];
	}
}

?>
<?php include "modules/banner.php"; ?>
<div class="clear30"></div>
<?php include "modules/service-content.php"; ?>
<div class="clear50"></div>
