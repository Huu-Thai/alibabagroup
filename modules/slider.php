<?php 
$result = $alibaba->getSlider();
?>
<script type="text/javascript" src="js/slider.js"></script>

<div class="slider owl-carousel owl-theme">
	<?php if($result != false): ?>
		<?php while($row = mysql_fetch_assoc($result)): ?>
			<div class="item animated">
				<img src="<?=$row['url_image'] ?>" title="<?=$row['title']?>">
				<div class="slider-text">
					<h1><?=$row['title'] ?></h1>
					<h2><?=$row['description'] ?></h2>
					<a href="<?=$row['alias'] ?>/" class="view-more">CHI TIẾT</a>
				</div>
			</div>
		<?php endwhile; ?>
	<?php endif; ?>
</div>

