<section class="banner container-fluid">

	<ol class="breadcrumb">
		<li><a href="./">Home</a></li>
		<li><a href="<?=$pageParent?>/"><?=$page ?></a></li>
		<?php if(isset($_GET['TieuDeKD']) && $p != 'trangloai'): ?>
			<li class="active"><?=$row['Title']?></li>
		<?php endif; ?>
	</ol>
</section>
<style>
	.breadcrumb>li+li:before{
		content: '.';
		color: #ec1d23;
		font-size: 50px;
		font-weight: 700;	

	}
	.banner .breadcrumb li a{
		text-transform: capitalize;
	}
	.banner{
		background-image: url('images/background/bg-news1.jpg');
	}
</style>

<?php 
	if($pageParent == 'san-pham'){
		echo "<style>.banner{background-image: url('images/background/bg-product.png') !important;}</style>";
	}elseif($pageParent == 'dich-vu'){
		echo "<style>.banner{background-image: url('images/background/bg-service.jpg') !important;}</style>";
	}elseif($pageParent == 've-chung-toi'){
		echo "<style>.banner{background-image: url('images/background/bg-about-us.png') !important;}</style>";
	}
 ?>