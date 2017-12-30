<?php include "slider-album.php"; ?>
<div class="about-us-content w88">	
	<?php $result = $alibaba->getInfoCompany(); ?>
	<?php if($result != false) ?>
	<?php $row = mysql_fetch_assoc($result); ?>
	<div class="about-us-cnt-left col-md-8 col-sm-12 col-xs-12">
		<div class="about-us-cnt-text container-fluid">
			<h1 class="about-us-title">quá trình hình thành và phát triển của Công Ty TNHH Quảng Cáo Alibaba</h1>
			<div class="clear20"></div>
			<?=$row['description']; ?>
		</div>
		<div class="clear20"></div>

		<?php $result = $alibaba->getImageCompanyFirst(); ?>
		<?php $row = mysql_fetch_assoc($result); ?>
		<div class="about-us-album container-fluid">
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
		</div>

	</div>
	<div class="about-us-right col-md-4 col-sm-12 col-xs-12">
		<div class="about-us-cnt-right">
			<video loop muted autoplay poster="images/video-small.png">
				<source src="video/big_buck_bunny.webm" type="video/webm"/>
				<source src="video/big_buck_bunny.mp4" type="video/mp4"/>
				<source src="video/big_buck_bunny.ogv" type="video/ogg"/>
			</video>
			<div class="video-play">
				<img src="images/play-img.png" alt="">
				<h1>video</h1>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="js/about-us-slider.js"></script>
<script>
	$(document).ready(function(){
		$(window).scroll(function(){
			var width = $(window).width();
			if(width > 992){
				adjTop();
			}else{
				$('.about-us-right').css('height', 'auto');
			}
		});
	});

	$(window).resize(function(){
		var width = $(window).width();
		if(width > 992){
			adjTop();
		}else{
			$('.about-us-right').css('height', 'auto');
		}
	});
	
	$(window).on('load', function(){
		var width = $(window).width();
		if(width > 992){
			adjTop();

		}else{
			$('.about-us-right').css('height', 'auto');
		}
	});

	function adjTop(){
		var menuHeight = $('#header').height();
		var scrollTop = $(window).scrollTop();
		var mapOffset = $(".maps").offset().top;
		var mapHeight = $(".maps").height();
		var offsetLeft = $('.about-us-cnt-text').offset().top;

		if((scrollTop + mapHeight) >= mapOffset){
			
			var heightLeft = $('.about-us-cnt-left').height();
			$('.about-us-right').css('height', heightLeft);
			$('.about-us-right').css('position', 'relative');
			$('.about-us-cnt-right').attr('style', 
				'position:absolute !important; bottom:-5px;right:initial;top:initial;height:auto !important;width:100% !important;z-index:0');
		}else{
			
			$('.about-us-right').css('position', 'initial');
			$('.about-us-cnt-right').attr('style', 
				'position:fixed !important; bottom:initial;right:6%;top:initial;height:auto !important;width:28% !important;z-index:10');
	
			if((offsetLeft) < scrollTop){
				
				var top = menuHeight + 20;
				$('.about-us-cnt-right').css('top',top+'px');

			}else{

				$('.about-us-cnt-right').css('top', (offsetLeft - scrollTop)+'px');

			}
		}
	}
</script>