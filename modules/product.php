<?php 
$pageSize = 9; 
$pageNum = 1;

if (isset($_GET['pageNum']) == true) $pageNum = $_GET['pageNum'];

if ($pageNum <= 0) $pageNum = 1; settype($pageNum, "int");

$TieuDe = '';
if(isset($_GET['TieuDe'])){
	$TieuDe = $_GET['TieuDe'];
}
if($alibaba->getLoaiByTieuDeKD($pageParent) != false){
	$idLoai = mysql_fetch_assoc($alibaba->getLoaiByTieuDeKD($pageParent))['idLoai'];
	$result = $alibaba->listNews($totalRow, $pageNum, $pageSize, $TieuDe, $idLoai);
}

?>
<div class="nav-product container">
	<ul class="href-category col-md-8 col-sm-12 col-xs-12">
		<?php 
		
		if($pageParent == 'san-pham')
			$active = 'effect_underline';
		else
			$active = '';
		?>
		<li class="<?=$active?>"><a href="san-pham/">Tất cả</a></li>
		<?php $resultChild = $alibaba->getChildMenu(trim('san-pham')); ?>
		<?php if($resultChild != false): ?>
			<?php while($rowChild = mysql_fetch_assoc($resultChild)): ?>
				<?php 
				$active = '';
				if($pageParent != 'san-pham'){
					
					if($rowChild['TieuDeKD'] == $pageParent)
						$active = 'effect_underline';
				}
				?>
				<li class="<?=$active?>"><a href="<?=$rowChild['TieuDeKD']?>/"><?=$rowChild['TieuDe'] ?></a></li>
			<?php endwhile; ?>
		<?php endif; ?>
		<!-- <li><a href="#">Nhận diện thương hiệu</a></li>
		<li><a href="#">Quảng cáo</a></li>
		<li><a href="#">Website</a></li>
		<li><a href="#">Ứng dụng</a></li> -->
		
	</ul>
</div>
<div class="clearfix"></div>
<section class="gallery w88 container">
	<div class="gallery-list">
		<?php if($result != false): $i = 1;?>
			<?php while($row = mysql_fetch_assoc($result)): ?>

				<?php ob_start(); ?>
				<div class="gallery-img effect-border col-md-4 col-sm-6 col-xs-12">
					<a href="chi-tiet/san-pham/{TieuDeKD}.html"><img  src="{UrlHinh}" alt="{TieuDe}"></a>
				</div>
				<?php if($i == 3 || $i == 6): ?>
					<div class="clear clearfix"></div>
				<?php endif; $i++; ?>
			
				<?php 
				$str = ob_get_clean();
				$str = str_replace("{TieuDeKD}", $row['TieuDeKD'], $str);
				$str = str_replace("{TieuDe}", $row['TieuDe'], $str);

				$UrlHinh = $row['UrlHinh'];
				if(!isset($row['UrlHinh']) || empty($UrlHinh)){
					$UrlHinh = 'images/no-image.gif';
				}
				$str = str_replace("{UrlHinh}", $UrlHinh, $str);
				echo $str;
				?>
			<?php  endwhile; ?>
		<?php endif; ?>
	</div>
	<div class="clearfix"></div>
	<div class="paginate container-fluid">
		<nav aria-label="Page navigation">
			<ul class="pagination"><?php //echo $totalRow; ?>
				<?=$alibaba->pagesListAli($pageParent, $totalRow , $pageNum, $pageSize, 1) ;?>
			</ul>
		</nav>
	</div>
</section>