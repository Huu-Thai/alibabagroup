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
<?php include "modules/news-detail.php"; ?>
<div class="clearfix"></div>

<script>
	$(document).ready(function(){
		$('.baivietlq').owlCarousel({
			rtl:true,
			margin:10,
			nav:true,
			responsive:{
				0:{
					items:1
				},
				990:{
					items:2
				}
			}
		})
		$('.baivietlq .owl-dots').hide();
		$(".baivietlq .owl-prev").html('<img src="images/phantrang/tinlq.png" />');
		$('.baivietlq .owl-next').html('<img src="images/phantrang/tinsau.png" />');

	});
</script>