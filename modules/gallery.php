<section class="gallery w88">
	<div class="section-top gallery-top">
		<div class="gallery-title">
			<a href="san-pham/"><h1>sản phẩm</h1></a>
			<img src="images/brace-top.png" alt="">
		</div>
		<div class="view-all">
			<a href="san-pham/" class="view-all">xem tất cả <img src="images/arrow-right.png" alt=""></a>
		</div>
	</div>
	<div class="clearfix"></div>
	<?php $result = $alibaba->listNewsLatest(206) ?>
	<div class="gallery-list">
		<?php if($result != false): $i = 1;?>
			<?php while($row = mysql_fetch_assoc($result)): ?>
				<div class="gallery-img effect-border col-md-4 col-sm-6 col-xs-12">
					<a href="chi-tiet/san-pham/<?=$row['TieuDeKD']?>.html"><img  src="<?=$row['UrlHinh']?>" title="<?=$row['TieuDe']?>" alt="<?=$row['TieuDe']?>"></a>
				</div>
				<?php if($i == 3): ?>
					<div class="clear clearfix"></div>
				<?php endif; $i++; ?>
			<?php  endwhile; ?>
		<?php endif; ?>
	</div>
</section>
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