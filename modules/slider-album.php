<?php $result = $alibaba->getImageCompany(); ?>
<div class="about-us-slider-bg container-fluid">
	<a class="btn-close">X</a>
	<div class="about-us-slider owl-carousel owl-theme">
		<?php while($row = mysql_fetch_assoc($result)): ?>
			<div class="item">
				<img src="<?=$row['url_image']?>" title="<?=$row['title']?>" alt="<?=$row['title']?>">
			</div>
		<?php endwhile; ?>
		<!-- <div class="item">
			<img src="images/thumb-about-us1.png" alt="">
		</div>
		<div class="item">
			<img src="images/thumb-about-us2.png" alt="">
		</div>
		<div class="item">
			<img src="images/thumb-about-us3.png" alt="">
		</div>
		<div class="item">
			<img src="images/thumb-about-us4.png" alt="">
		</div> -->
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$(window).on('load', function(){
			var width = $(window).width();
			if(width <= 768){

				$('.about-us-slider-bg .owl-nav').hide();
			}
		});

		$(window).resize(function(){
			var width = $(window).width();
			if(width <= 768){

				$('.about-us-slider-bg .owl-nav').hide();
			}
		});
		
		$('.about-us-slider-bg').click(function(event){
			// event.preventDefault();
			// $(this).hide();
		});
	});

	$(document).ready(function(){

		$('.about-us-img-lg').click(function(){
			var src = $(this).attr('src');
			showSlider(src);

		});

		$(".img-thmb img").each(function(){
			$(this).click(function(){

				var src = $(this).attr('src');
				showSlider(src);
			});
		});
		$(".thmb-overlay").click(function(){
			var src = $(".img-thmb:last-child img").attr('src');
			showSlider(src);
		});

		function showSlider(src){
			$('html').css('overflow', 'hidden');
			$('.about-us-slider-bg').css('display','block');
			$('.about-us-slider-bg .item img').each(function(i){
				var src_slider = $(this).attr('src');

				if(src == src_slider){
					$(".about-us-slider").trigger("to.owl.carousel", [i, 1, true]);
				}
			});
		}
		$('.btn-close').click(function(){
			$('html').css('overflow', 'visible');
			$('.about-us-slider-bg').css('display','none');
		});
	})
</script>