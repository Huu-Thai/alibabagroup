<section class="news w88">
	<!-- <div class=""> -->
	<div class="section-top news-top">
		<div class="news-title">
			<a href="tin-tuc/"><h1>Tin tức</h1></a>
			<img src="images/brace-top.png" alt="">
		</div>
		<div class="view-all">
			<a href="tin-tuc/">xem tất cả <img src="images/arrow-right.png" alt=""></a>
		</div>
	</div>
	<?php $result = $alibaba->listNewsLatest(); ?>
	<div class="news-all">
		<?php if($result != false): $i = 1;?>
			<?php while($row = mysql_fetch_assoc($result)): ?>
				<div class="news-sub col-md-4 col-sm-6 col-xs-12">
					<a href="chi-tiet/tin-tuc/<?=$row['TieuDeKD']?>.html"><img src="<?=$row['UrlHinh']?>" title="<?=$row['TieuDe']?>" alt="<?=$row['TieuDe']?>"></a>
					<div class="news-note">
						<time><?=date('d / m / Y', strtotime($row['NgayDang'])) ?></time>
						<span class="author">
							<img src="<?=($row['profile'] != '') ? $row['profile'] : 'images/profile.png' ?>" title="<?=$row['Name'] ?>" alt="<?=$row['Name'] ?>">
							<?=$row['Name'] ?>
						</span>
						<a href="chi-tiet/tin-tuc/<?=$row['TieuDeKD']?>.html"><h1 class='news-title-sub'><?=$alibaba->cutString($row['TieuDe'], 80, ' ...')?></h1></a>

						<?php $TomTat = strip_tags($alibaba->cutString($row['TomTat'], 250, ' ...')); ?>
						<p><?=$TomTat ?></p>
					</div>
				</div>
				<?php if($i==3): ?>
				<div class="clear clearfix"></div>
			<?php endif; $i++;?>
		<?php endwhile; ?>
	<?php endif; ?>
		
	</div>
	<!-- </div> -->
</section>
<script>
	var width = $(window).width();
	if(width <= 1024){

		$('.news-all .clearfix').removeClass('clearfix');
	}
	$(window).resize(function(){
		var width = $(window).width();
		if(width <= 1024){
			$('.news-all .clearfix').removeClass('clearfix');
		}else{
			if($('.clear').attr('class') != 'clearfix'){
				$('.clear').addClass('clearfix');
			}

		}
	});
</script>