
<section class="slider-bottom w88">
	<div class="slider-design col-md-4 col-sm-4 col-xs-12">
		<a href="thiet-ke/">
			<div class="effect-up"></div>
			<div class="slider-icon"></div>
			<a href="thiet-ke/"><h2>thiết kế</h2></a>
			<p>thương hiệu, quảng cáo, website</p>
		</a>
	</div>
	<div class="slider-design col-md-4 col-sm-4 col-xs-12">
		<a href="lap-trinh/">
			<div class="effect-up"></div>
			<div class="slider-icon"></div>
			<!-- <img src="images/icon-html.png" alt=""> -->
			<a href="lap-trinh/"><h2>lập trình</h2></a>
			<p>website, ứng dụng (app)</p>
		</a>
	</div>
	<div class="slider-design col-md-4 col-sm-4 col-xs-12">
		<a href="maketing/">
			<div class="effect-up"></div>
			<div class="slider-icon"></div>
			<!-- <img src="images/icon-share.png" alt=""> -->
			<a href="maketing/"><h2>maketing</h2></a>
			<p>google adwords, facebook ads</p>
		</a>
	</div>
</section>
<section class="slider-bottom-mobile">
	<div class="slider-design-mobile col-xs-12">
		<a href="thiet-ke/">
			<img src="images/icon-design.png" alt="thiết kế">
			<div class="slider-bt-text">
				<a href="thiet-ke/"><h2>thiết kế</h2></a>
				<p>thương hiệu, quảng cáo, website</p>
			</div>
		</a>

	</div>
	<div class="slider-design-mobile col-xs-12">
		<a href="lap-trinh/">
			<img src="images/icon-html.png" alt="thiết kế">
			<div class="slider-bt-text">
				<a href="lap-trinh/"><h2>lập trình</h2></a>
				<p>website, ứng dụng (app)</p>
			</div>
		</a>

	</div>
	<div class="slider-design-mobile col-xs-12">
		<a href="maketing/">
			<img src="images/icon-share.png" alt="thiết kế">
			<div class="slider-bt-text">
				<a href="maketing"><h2>maketing</h2></a>
				<p>google adwords, facebook ads</p>
			</div>
		</a>

	</div>
</section>
<div class="clearfix"></div>

<script>
	$(document).ready(function(){

		$(window).resize(function(){
			var width_html = $("html").width();

			var width = $('.slider-icon').width();
			$(".slider-icon").css('height', width);
			
			if(width_html  <= 768){
				$('.slider-design').each(function(){
					$(this).click(function(){
						$('.slider-design').css('z-index','0');
						$(this).css('z-index','999');
					})
				})
			}

		});
		$(window).on('load', function(){
			var width = $('.slider-icon').width();
			$(".slider-icon").css('height', width);
		});
		var width_html = $("html").width();
		if(width_html  <= 768){
			$('.slider-design').each(function(){
				$(this).click(function(){
					$('.slider-design').css('z-index','0');
					$(this).css('z-index','999');
				});
			});
		}
	});
</script>