<section class="news-detail w88 container-fluid">
	<article class="content col-md-8 col-sm-12 col-xs-12">
		<div class="timeprofile">
			<ul>
				<li class="time"><?=date('d / m / Y', strtotime($row['NgayDang'])) ?></li>
				<li class="profile"><img src="<?=($row['profile'] != '') ? $row['profile'] : 'images/profile.png' ?>"/><?=$row['Name'] ?></li>
			</ul>
			<div class="clearfix"></div>
		</div>
		
		<div class="noidung">
			<h1 class="title"><?=$row['TieuDe'] ?></h1>
			<!-- <div class="img"><img src="urlhinh" alt=""/></div> -->
			<?=$row['NoiDung'] ?>
		</div>
		
		<?php 
		$idCL = $alibaba->findIdCateByTieuDeKD($TieuDeKD)['idCL'];
		$idTT = $alibaba->findIdCateByTieuDeKD($TieuDeKD)['idTT'];
		if($idCL != false){
			$resultRelate = $alibaba->newsRelate($idCL, $idTT);
			$result = $alibaba->newsRelate($idCL, $idTT);
		}
		?>
		<div class="clear20"></div>
		<div class="baivietlienquan">
			<div class="baivietlq owl-carousel owl-theme">
				<?php if($result != false): ?>
					<?php while($row = mysql_fetch_assoc($result)): ?>
						<div class="item">
							<div class="rowlq">
								<div class="img"><a href="chi-tiet/tin-tuc/<?=$row['TieuDeKD']?>.html"><img src="<?=$row['UrlHinh']?>" /></a></div>
								<div class="sanphaminfo">
									<div class="timeprofile">
										<ul>
											<li class="time"><?=date('d / m / Y', strtotime($row['NgayDang'])) ?></li>
											<li class="profile"><img src="<?=($row['profile'] != '') ? $row['profile'] : 'images/profile.png' ?>"/><?=$row['Name']?></li>
										</ul>
										<div class="clearfix"></div>
									</div>
									<p class="titlenew"><a href="chi-tiet/tin-tuc/<?=$row['TieuDeKD']?>.html"><?=$row['TieuDe'] ?></a></p>

								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				
			</div>
		</div>
		
		<div class="clearfix"></div>
	</article>
	<aside class=" col-md-4 col-sm-12 col-xs-12">
		<span id="news-related" class="sanphamlq"><img src="images/arrow-right.png" alt="" />Tin Liên Quan</span>
		<span id="news-hot" class="sanphamlq news-disabled">Tin Nổi Bật</span>
		<div class="clear10"></div>
		
		<div class="content news-related">
			<?php if($resultRelate != false): ?>
				<?php while($row = mysql_fetch_assoc($resultRelate)): ?>
					<div class="rowlq">
						<div class="img"><a href="chi-tiet/tin-tuc/<?=$row['TieuDeKD']?>.html"><img src="<?=$row['UrlHinh'] ?>" /></a></div>
						<div class="sanphaminfo">
							<div class="timeprofile">
								<ul>
									<li class="time"><?=date('d / m / Y', strtotime($row['NgayDang'])) ?></li>
									<li class="profile"><img src="<?=($row['profile'] != '') ? $row['profile'] : 'images/profile.png' ?>"/><?=$row['Name'] ?></li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<p class="titlenew"><a href="chi-tiet/tin-tuc/<?=$row['TieuDeKD']?>.html"><?=$row['TieuDe'] ?></a></p>

						</div>
						<div class="clearfix"></div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="content news-hot" style="display:none">
			<?php $result = $alibaba->listNewsLatest(); ?>
			<?php if($result != false): ?>
				<?php while($row = mysql_fetch_assoc($result)): ?>
					<div class="rowlq">
						<div class="img"><a href="chi-tiet/tin-tuc/<?=$row['TieuDeKD']?>.html"><img src="<?=$row['UrlHinh'] ?>" /></a></div>
						<div class="sanphaminfo">
							<div class="timeprofile">
								<ul>
									<li class="time"><?=date('d / m / Y', strtotime($row['NgayDang'])) ?></li>
									<li class="profile"><img src="<?=($row['profile'] != '') ? $row['profile'] : 'images/profile.png' ?>"/><?=$row['Name'] ?></li>
								</ul>
								<div class="clearfix"></div>
							</div>
							<p class="titlenew"><a href="chi-tiet/tin-tuc/<?=$row['TieuDeKD']?>.html"><?=$row['TieuDe'] ?></a></p>

						</div>
						<div class="clearfix"></div>
					</div>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		
	</aside>

	<div class="clear20"></div>
</section>

<script type="text/javascript">
	$(document).ready(function(){
		$('#news-related').click(function(){
			$(this).removeClass('news-disabled');
			$('#news-hot').addClass('news-disabled');
			
			$('.news-hot').css('display', 'none');
			$('.news-related').css('display', 'block');
			
		});
		$('#news-hot').click(function(){
			$(this).removeClass('news-disabled');
			$('#news-related').addClass('news-disabled');

			$('.news-related').css('display', 'none');
			$('.news-hot').css('display', 'block');
			
		});
	})
</script>