<?php 
$array = $alibaba->getMenuTop(); 
$groupMenu = array_chunk($array, 3, true);

$pageProduct = array('logo', 'nhan-dien-thuong-hieu', 'quang-cao', 'website', 'ung-dung');
$pageService = array('thiet-ke', 'lap-trinh', 'maketing');

if($p == 'tin-tuc' || $p == 'san-pham'){

	$TieuDeKD = $p;
}elseif($p == 'trangloai'){

	$TieuDeKD = $_GET['TieuDeKD'];
	if(in_array($TieuDeKD, $pageProduct)){

		$TieuDeKD = 'san-pham';
	}elseif(in_array($TieuDeKD, $pageService)){

		$TieuDeKD = 'dich-vu';
	}
	
}else{

	$TieuDeKD = '';
}

?>

<header id="header" class="class-inherit">
	<nav class="nav w88">
		<ul class="container-fluid">
			<?php if($groupMenu != false): ?>

				<?php foreach($groupMenu[0] as $value): ?>
					<?php 
					$active = '';
					if($value['TieuDeKD'] == $TieuDeKD)
						$active = 'active-menu';
					?>
					<li><a class="<?=$active?>" href="<?=$value['TieuDeKD']?>/"><?=$value['TieuDe']; ?></a></li>

				<?php endforeach; ?>

				<?php $result = $alibaba->getInfoCompany(); ?>
				<?php if($result != false): ?>
					<?php $row = mysql_fetch_assoc($result); ?>
					<?php $logo = ($row['logo'] != '') ? $row['logo'] : 'images/logo.png'; ?>
				<?php endif; ?>
				<li class="logo"><a href="/"><img src="<?=$logo ?>" title="<?=$row['name']?>"></a></li>
				<?php foreach($groupMenu[1] as $value): ?>
					<?php 
					$active = '';
					if($value['TieuDeKD'] == $TieuDeKD)
						$active = 'active-menu';
					?>
					<li><a class="<?=$active?>" href="<?=($value['TieuDeKD'] != 'lien-he') ? $value['TieuDeKD'].'/' : '#maps' ?>"><?=$value['TieuDe']; ?></a></li>

				<?php endforeach; ?>

				<!-- <li><a href="#maps">Liên hệ</a></li> -->
			<?php endif; ?>
			
		</ul>
	</nav>
</header>
<div class="header-mobile col-md-12 col-sm-12 col-xs-12">
	<div class="mobile-logo col-sm-6 col-xs-6">
		<a href="/"><img src="images/logo.png"></a>
	</div>
	<div class="mobile-menu-btn col-sm-6 col-xs-6">
		<img src="images/menu.png" class="btn-menu"></a>
	</div>
	
	<?php $result = $alibaba->getMenuMobile(); ?>
	<div class="mobile-menu col-md-12 col-sm-12 col-xs-12">
		<ul class="mobile-menu-list">
			<?php if($result != false): ?>
				<?php while($row = mysql_fetch_assoc($result)): ?>
					<li><a href="<?=($row['TieuDeKD'] != 'lien-he') ? $row['TieuDeKD'].'/' : '#maps' ?>"><?=$row['TieuDe']; ?></a></li>
				<?php endwhile; ?>
			<?php endif; ?>
		</ul>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		var i = 0;
		$(".btn-menu").click(function(){
			var width = $(window).width();
			i++;
			if(i==1){
				
				if(width <= 515)
					$('.header-mobile .mobile-menu .mobile-menu-list').attr('style', 'left:-6%;');
				else
					$('.header-mobile .mobile-menu .mobile-menu-list').attr('style', 'left:-3%;');
			}else{
				i = 0;
				// $('.mobile-menu').attr('style', 'display:none');	
				$('.header-mobile .mobile-menu .mobile-menu-list').attr('style', 'left:-130%;');
			}
		});

		$(window).on('load', function(){
			windowScroll();
			if($(window).width() <= 990){
				mobileScroll();
			}
		});
		windowScroll();
		function windowScroll(){
			$(window).scroll(function(){
				var windowHeight = $(window).height();
				var offset = $('#header').offset().top;

				if(offset >= ((windowHeight)/3)){
					$('#header').css('background-color','#fff');
				}else{
					
					$('#header').css('background-color', 'rgba(251, 249, 250, 0.71)');
				}
			});
		}
		$(window).resize(function(){
			if($(window).width() <= 990){
				mobileScroll();
			}
		});
		
		function mobileScroll(){
			
			var array = [];
			$(window).scroll(function(){
				var menuHeight = $('.header-mobile').height();
				if($(window).scrollTop() >= menuHeight){

					$('.header-mobile').css('background-color','#fbf9fa');
				}else{

					$('.header-mobile').css('background-color', 'rgba(251, 249, 250, 0.71)');
				}

				array.push($(window).scrollTop());
				var length = array.length - 1;

				if(array[length] <= array[length - 2] && array[length] != 0){
					$('.header-mobile').attr('style', 'top:0');

				}else if( array[length] != 0){
					$('.header-mobile').attr('style','top:-100px');
					// $('.mobile-menu').css('display','none');
					$('.header-mobile .mobile-menu .mobile-menu-list').attr('style', 'left:-130%;');
					// $('.header-mobile').css('display','block');
				}else if(array[length] == 0){
					$('.header-mobile').attr('style', 'top:0');
				}
				
			});
		}

	});
</script>
