<?php 


if($pageParent == 'dich-vu'){
	$TieuDeKD = 'thiet-ke';
}

?>
<div class="service-content w88">
	<div class="service-cnt-right col-md-4 col-sm-12 col-xs-12">
		<div class="service-dropdown col-md-12 col-sm-12 col-xs-12">
			<?php $result = $alibaba->getServiceContent($TieuDeKD); ?>
			<?php if($result != false): ?>
				<?php $row = mysql_fetch_assoc($result); ?>
				<div class="service-main svc-active col-md-10 col-sm-10 col-xs-10">
					<img src="images/icon-design.png" alt="<?=$row['TieuDe']?>">
					<div class="service-main-text">
						<h2><?=$row['TieuDe']?></h2>
						<p><?=$row['Des']?></p>
					</div>
				</div>
				<div class="svc-btn-dropdown col-md-2 col-sm-2 col-xs-2">
					<img src="images/down-arrow.png" alt="">
				</div>
			<?php endif; ?>
			
		</div>
		<div class="service-list">

			<?php $result = $alibaba->getService(); ?>
			<?php if($result != false): ?>
				<?php while($rowList = mysql_fetch_assoc($result)): ?>
					<?php 
					$active = '';
					if($rowList['TieuDeKD'] == $TieuDeKD)
						$active = 'svc-active';
					?>
					
					<div class="svc-slider-design <?=$active; ?> col-md-12 col-sm-12 col-xs-12">
						<a style="display:block" href="<?=$rowList['TieuDeKD']; ?>/">
							<img src="<?=$rowList['UrlHinh']?>" alt="<?=$rowList['TieuDe']?>" title="<?=$rowList['TieuDe']?>">
							<div class="service-main-text">
								<h2><?=$rowList['TieuDe'];?></h2>
								<p><?=$rowList['Des'] ?></p>
							</div>
						</a>
					</div>

				<?php endwhile; ?>
			<?php endif; ?>
		</div>

		<div class="service-list-mobile">

			<?php $result = $alibaba->getService(); ?>
			<?php if($result != false): ?>
				<?php while($rowList = mysql_fetch_assoc($result)): ?>
					<?php 
					$active = '';
					if($rowList['TieuDeKD'] == $TieuDeKD)
						$active = 'svc-active';
					?>

					<?php if($rowList['TieuDeKD'] != $TieuDeKD): ?>
						<div class="svc-slider-design <?=$active; ?> col-md-12 col-sm-12 col-xs-12">
							<a style="display:block" href="<?=$rowList['TieuDeKD']; ?>/">
								<img src="<?=$rowList['UrlHinh']?>" alt="<?=$rowList['TieuDe']?>" title="<?=$rowList['TieuDe']?>">
								<div class="service-main-text">
									<h2><?=$rowList['TieuDe'];?></h2>
									<p><?=$rowList['Des'] ?></p>
								</div>
							</a>
						</div>
					<?php endif; ?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>	

	</div>
	<div class="service-cnt-left col-md-8 col-sm-12 col-xs-12">
		<?php $result = $alibaba->getServiceContent($TieuDeKD); ?>
		<?php if($result != false): ?>
			<?php $row = mysql_fetch_assoc($result); ?>
		<?php endif; ?>
		<h1 class="service-title"><?=$row['Title'] ?></h1>
		<div class="clear20"></div>
		<div class="service-cnt-main">
			<?=$row['NoiDung']; ?>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('.svc-slider-design').each(function(){
			$(this).click(function(){
				var bg = $(this).css('background-color');
				$('.svc-slider-design').removeClass('svc-active');
				$('.svc-active::before').css('border-right-color', bg);
				$(this).addClass('svc-active');
			});
		});

		$(window).resize(function(){
			if($(window).width() < 992){
				$('.svc-slider-design').removeClass('svc-active');
				$('.svc-slider-design').each(function(){
					$(this).click(function(){
						$('.svc-slider-design').removeClass('svc-active');
					});
				});
			}
		});
		$(window).on('load', function(){
			if($(window).width() < 992){
				$('.svc-slider-design').removeClass('svc-active');
				$('.svc-slider-design').each(function(){
					$(this).click(function(){
						$('.svc-slider-design').removeClass('svc-active');
					});
				});
			}
		});
		
		var i = 0;
		$('.svc-btn-dropdown img').click(function(){
			i++;
			if(i==1){
				$(".service-list-mobile").slideDown(300);
				$(this).attr('src', 'images/up-arrow.png');
			}
			else{
				$(".service-list-mobile").slideUp(300);
				$(this).attr('src', 'images/down-arrow.png');
				i = 0;
			}
		});
	});


	$(document).ready(function(){

		$(window).scroll(function(){
			var width = $(window).width();
			if(width > 992){

				adjTop(scroll);
			}else{
				$('.about-us-right').css('height', 'auto');
			}
		});
	});

	$(window).resize(function(){

		var width = $(window).width();
		if(width > 992){
			adjTop(scroll);
		}else{
			$('.about-us-right').css('height', 'auto');
		}
	});
	
	$(window).on('load', function(){

		var width = $(window).width();
		if(width > 992){
			adjTop();

		}else{
			$('.about-us-right').css('height', 'auto');
		}
	});

	function adjTop(){
		var menuHeight = $('#header').height();
		var scrollTop = $(window).scrollTop();
		var mapOffset = $(".maps").offset().top;
		var mapHeight = $(".maps").height();
		var offsetLeft = $('.service-cnt-left').offset().top;
		var heightSvcList = $('.service-list').height();
		
		
		if((scrollTop + heightSvcList) >= (mapOffset-30)){
			// $('.about-us-cnt-right').slideUp();
			var heightLeft = $('.service-cnt-left').height();
			$('.service-cnt-right').css('height', heightLeft);
			$('.service-cnt-right').css('position', 'relative');
			$('.service-list').attr('style', 
				'position:absolute !important; bottom:0;right:initial;top:initial;height:auto !important;width:100% !important;z-index:0');
		}else{
			// var btServiceList = $('.service-list').css('bottom');
			$('.service-cnt-right').css('position', 'initial');
			$('.service-list').attr('style', 
				'position:fixed !important; bottom:initial;right:6%;top:initial;height:auto !important;width:28% !important;z-index:0');
			
			if(offsetLeft < scrollTop){
				
				var top = menuHeight - 100;
				$('.service-list').css('top',top+'px');

			}else{
				
				$('.service-list').css('top', (offsetLeft - scrollTop)+'px');

			}
		}

		
		// var btServiceList = $('.service-list').css('bottom');

		// btServiceList = btServiceList.replace('px','')
		// console.log(btServiceList);
		// console.log(scrollTop);
		// console.log('heightlist '+ heightSvcList);
		// console.log('offsetleft '+ offsetLeft);
		// console.log('heightleft '+ heightLeft);
		// console.log('offsetlis '+ offsetList);
	}
</script>