<?php 

	// $loai = $alibaba->getLoaiByTieuDeKD($p);
	// if($loai != false){
	// 	$page = mysql_fetch_assoc($loai)['TieuDe'];
	// }
 ?>

<?php 
	$TieuDeKD = $_GET['TieuDeKD'];
	$loai = $alibaba->getLoaiByTieuDeKD($TieuDeKD);
	if($loai != false){
		$page = mysql_fetch_assoc($loai)['TieuDe'];
	}
	
 ?>
<?php include "modules/banner.php"; ?>
<div class="clearfix"></div>
<?php include "modules/product.php"; ?>
<div class="clearfix"></div>
<script>
	var width = $(window).width();
	if(width <= 1024){
		$('.gallery-img').removeClass('effect-border');
		$('.gallery-list .clearfix').removeClass('clearfix');
	}
	$(window).resize(function(){
		var width = $(window).width();
		if(width <= 1024){
			$('.gallery-img').removeClass('effect-border');
			$('.gallery-list .clearfix').removeClass('clearfix');
		}else{
			if($('.clear').attr('class') != 'clearfix'){
				$('.clear').addClass('clearfix');
			}
			$('.gallery-img').addClass('effect-border');
		}
	});
</script>