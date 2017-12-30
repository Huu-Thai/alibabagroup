<?php include "slider-album.php"; ?>
<section class="about-us w88">
	<div class="about-us-top section-top conatiner-fluid">
		<a href="ve-chung-toi/"><h1>VỀ chúng tôi</h1></a>
		<img src="images/brace-top.jpg" alt="">
	</div>
	<?php $result = $alibaba->getInfoCompany(); ?>
	<?php if($result != false) ?>
		<?php $row = mysql_fetch_assoc($result); ?>
	<div class="about-us-bottom container-fluid">

		<div class="about-us-bt-left col-md-6 col-sm-12 col-xs-12">
			<h1 class="about-us-title">quá trình hình thành và phát triển của công ty tnhh quảng cáo alibaba</h1>
			<?=$row['short_description']; ?>
			<div class="btn-view-more">
				<a href="ve-chung-toi/" class="view-more">xem thêm</a>
			</div>
		</div>
		<div class="about-us-bt-right about-us-album col-md-6 col-sm-12 col-xs-12">
			<?php $result = $alibaba->getImageCompanyFirst(); ?>
			<?php $row = mysql_fetch_assoc($result); ?>

			<img class="about-us-img-lg" src="<?=$row['url_image']?>" title="<?=$row['title']?>" alt="<?=$row['title']?>">
			<div class="clear5"></div>
			<?php $resultImage = $alibaba->getImageCompany(); ?>
			<?php $countImage = mysql_num_rows($resultImage); ?>

			<?php $result = $alibaba->getImageCompanyFour(); ?>
			<?php $i = 1; ?>
			<div class="about-us-thmb container-fluid">
				<?php while($row = mysql_fetch_assoc($result)): ?>
					<div class="img-thmb col-md-3 col-sm-3 col-xs-3">
						<img src="<?=$row['url_image']?>" title="<?=$row['title']?>" alt="<?=$row['title']?>">
						<?php if($i > 4): ?>
							<div class="thmb-overlay">+<?=($countImage - 5)?></div>
						<?php endif; ?>
					</div>
					<?php $i++; ?>
				<?php endwhile; ?>
			</div>
			<!-- <img class="about-us-img-lg" src="images/banner-about-us.png" alt="">
			<div class="clear5"></div>
			<div class="about-us-thmb container-fluid">
				<div class="img-thmb col-md-3 col-sm-3 col-xs-3">
					<img src="images/thumb-about-us1.png" alt="">
				</div>
				<div class="img-thmb col-md-3 col-sm-3 col-xs-3">
					<img  src="images/thumb-about-us2.png" alt="">
				</div>
				<div class="img-thmb col-md-3 col-sm-3 col-xs-3">
					<img  src="images/thumb-about-us3.png" alt="">
				</div>
				<div class="img-thmb col-md-3 col-sm-3 col-xs-3">
					<img  src="images/thumb-about-us4.png" alt="">
					<div class="thmb-overlay">+4</div>
				</div> -->
		</div>

	</div>	
</section>
<div class="col-md-12 col-sm-12 col-xs-12 about-us-img-scale"></div>
<script type="text/javascript" src="js/about-us-slider.js"></script>
<script>
	$(document).ready(function(){
		$('.about-us-img').click(function(){
			var src = $(this).attr('src');
			$('.about-us-img-scale').css('display','block');
			$('.about-us-img-scale').append("<img src="+src+">");
			
		});
		$('.about-us-img-scale').click(function(){
			$(this).empty();
			$(this).css('display','none');
		});

		$(window).on('load', function(){
				changeHeight();
			});
			$(window).resize(function(){
				changeHeight();
			});

			function changeHeight(){
				var width = $(window).width();
				if(width > 992){
					var height_right = $('.about-us-bt-right').height();
					$('.about-us-bt-left').height(height_right+'px');
				}
			}
	});
</script>