<section class="news-detail w88 container">
	<article class="content col-md-8 col-sm-12 col-xs-12">
		<h1><?=ucfirst($row['TieuDe']); ?></h1>
		<div class="clearfix"></div>
		<div class="timeprofile">
			<ul>
				<li class="time"><?=date('d / m / Y', strtotime($row['NgayDang'])) ?></li>
				<li class="profile"><img src="<?=($row['profile'] != '') ? $row['profile'] : 'images/profile.png' ?>"/><?=$row['Name'] ?></li>
			</ul>
			<div class="clearfix"></div>
		</div>
		<div class="infomation">
			<ul>
				<li><img src="images/icon/time.png" /><?=$row['Timeline'] ?></li>
				<li><img src="images/icon/money.png" />  Chi phí : <?=$row['Sale']?></li>
				<li><img src="images/icon/phamvi.png" /> <p>Phạm vi công việc: <?=$row['Work'] ?></p></li>
			</ul>
		</div>

		<div class="content-main">
			<?=$row['NoiDung'];  ?>
		</div>

	</article>

	<?php 
		$idCL = $alibaba->findIdCateByTieuDeKD($TieuDeKD)['idCL'];
		$idTT = $alibaba->findIdCateByTieuDeKD($TieuDeKD)['idTT'];
		if($idCL != false){
			$result = $alibaba->newsRelate($idCL, $idTT);
		}
	 ?>
	<aside class="col-md-4 col-sm-12 col-xs-12">
		<span class="sanphamlq"><img src="images/arrow-right.png" alt="" />Sản Phẩm liên quan</span>
		<div class="clear10"></div>
		<div class="content">
		<?php if($result != false): ?>
			<?php while($row = mysql_fetch_assoc($result)): ?>
			<div class="rowlq">
				<div class="img"><a href="chi-tiet/san-pham/<?=$row['TieuDeKD']?>.html"><img src="<?=$row['UrlHinh'] ?>" /></a></div>
				<div class="sanphaminfo">
					<div class="timeprofile">
						<ul>
							<li class="time"><?=date('d / m / Y', strtotime($row['NgayDang']))  ?></li>
							<li class="profile"><img src="<?=($row['profile'] != '') ? $row['profile'] : 'images/profile.png' ?>"/><?=$row['Name'] ?></li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<p class="title"><a href="chi-tiet/san-pham/<?=$row['TieuDeKD']?>.html"><?=$row['TieuDe']?></a></p>
					<p class="time"> <img src="images/icon/time.png" /><?=$row['Timeline']?></p>
				</div>
				<div class="clear"></div>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
			</div>
			<div class="clear5"></div>
			<div class="clear5"></div>
			<div class="clear5"></div>
			<!-- <div class="xemtatca">
				<a href="#">Xem tất cả</a>
			</div> -->
		</div>
	</aside>
</section>