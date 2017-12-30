<?php 
$pageSize = 5; 
$pageNum = 1;

if (isset($_GET['pageNum']) == true) $pageNum = $_GET['pageNum'];

if ($pageNum <= 0) $pageNum = 1; settype($pageNum, "int");

$TieuDe = '';
if(isset($_GET['TieuDe'])){
	$TieuDe = $_GET['TieuDe'];
}
?>
<section class="news-detail w88  container">
	<article class="content col-md-8 col-sm-12 col-xs-12">
		<?php $result = $alibaba->listNews($totalRow, $pageNum, $pageSize, $TieuDe); ?>
		<?php if($result != false): ?>
			<?php while($row = mysql_fetch_assoc($result)): ?>
				<?php ob_start(); ?>
				<div class="row-news">
					<div class="img"><a href="chi-tiet/tin-tuc/{TieuDeKD}.html"><img src="{UrlHinh}" title="{TieuDe}" alt="{TieuDe}"/></a></div>
					<div class="timeprofile">
						<ul>
							<li class="time">{NgayDang}</li>
							<li class="profile"><img src="<?=($row['profile'] != '') ? $row['profile'] : 'images/profile.png' ?>" title="{Name}" alt="{Name}" />{Name}</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
					<div class="info">
						<h3><a href="chi-tiet/tin-tuc/{TieuDeKD}.html">{TieuDe}</a></h3>
						<p class="desc">{TomTat}</p>
					</div>
				</div>

				<?php 
				$str = ob_get_clean();
				$str = str_replace("{TieuDeKD}", $row['TieuDeKD'], $str);
				$str = str_replace("{TieuDe}", $row['TieuDe'], $str);
				$str = str_replace("{UrlHinh}", $row['UrlHinh'], $str);
				$str = str_replace("{NgayDang}", date('d / m / Y', strtotime($row['NgayDang'])), $str);
				$str = str_replace("{Name}", $row['Name'], $str);
				$str = str_replace("{TomTat}", strip_tags($alibaba->cutString($row['TomTat'], 300, '...')), $str);
				echo $str;
				?>
			<?php endwhile; ?>
		<?php endif; ?>
		<?php //var_dump($alibaba->pagesList($totalRow , $pageNum, $pageSize)) ?>
		<div class="paginate container-fluid">
			<nav aria-label="Page navigation">
				<ul class="pagination">
					<?=$alibaba->pagesListAli('tin-tuc', $totalRow , $pageNum, $pageSize) ;?>
		
				</ul>
			</nav>
		</div>

</article>
<aside class="col-md-4 col-sm-12 col-xs-12">
	<span class="sanphamlq"><img src="images/arrow-right.png" alt="" />Tin Nổi Bật</span>
	<div class="clear5"></div>
	<div class="clear5"></div>
	<div class="content">
		<?php $result = $alibaba->listNewsLatest(); ?>
		<?php if($result != false): ?>
			<?php while($row = mysql_fetch_assoc($result)): ?>
				<div class="rowlq">
					<div class="img"><a href="chi-tiet/tin-tuc/<?=$row['TieuDeKD']?>.html"><img src="<?=$row['UrlHinh'] ?>" /></a></div>
					<div class="sanphaminfo">
						<div class="timeprofile">
							<ul>
								<li class="time"><?=date('d / m / Y', strtotime($row['NgayDang'])) ?></li>
								<li class="profile"><img src="<?=($row['profile'] != '') ? $row['profile'] : 'images/profile.png' ?>" alt="<?=$row['Name']?>" /><?=$row['Name'] ?></li>
							</ul>
							<div class="clearfix"></div>
						</div>
						<p class="titlenew"><a href="chi-tiet/tin-tuc/<?=$row['TieuDeKD']?>.html"><?=$row['TieuDe'] ?></a></p>

					</div>
					<div class="clear"></div>
				</div>
			<?php endwhile; ?>
		<?php endif; ?>
		<div class="clear5"></div>
		<div class="clear5"></div>
		<div class="clear5"></div>
		<!-- <div class="xemtatca">
			<a href="#">Xem tất cả</a>
		</div> -->
		<!-- <a href="" class="view-more show-news">XEM TẤT CẢ</a> -->
	</div>
</aside>
</section>
