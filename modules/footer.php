<footer id="footer" class="container-fluid">
	<div class="w88 container-fluid">
		<div class="footer-left col-md-8 col-sm-12 col-xs-12">
			<div class="footer-lft-top row">
				<?php $result = $alibaba->getInfoCompany(); ?>
				<?php if($result != false): ?>
					<?php $row = mysql_fetch_assoc($result); ?>
					<?php $logoFooter = ($row['logo_footer'] != '') ? $row['logo_footer'] : 'images/footer-logo.png'; ?>
				<?php endif; ?>
				<div class="footer-logo col-md-5 col-sm-5 col-xs-12">
					<a href="/">
						<img src="<?=$logoFooter ?>" title="<?=$row['name']?>" alt="">
					</a>
				</div>
				<div class="footer-social col-md-7 col-sm-7 col-xs-12">
					<?php $fanpage = json_decode($row['fanpage'], true); ?>
					<ul>
						<li class="icon-fb"><a href="<?=$fanpage['facebook'] ?>" target="_blank" ></a></li>
						<li class="icon-gg"><a href="<?=$fanpage['google'] ?>" target="_blank" ></a></li>
						<li class="icon-ytb"><a href="<?=$fanpage['youtube'] ?>" target="_blank" ></a></li>
					</ul>
				</div>
			</div>
			<div class="clearfix"></div>
			<?php $array = $alibaba->getMenuFooter(); ?>
			<div class="footer-lft-mid">
				<?php $arrayGroup = array_chunk($array, 2, true); ?>
				<?php foreach($arrayGroup as $key => $value): ?>
					<ul class="footer-menu col-md-4 col-sm-4 col-xs-12">
						<?php foreach($value as $valueChild): ?>
							<li><a href="<?=($valueChild['TieuDeKD'] != 'lien-he') ? $valueChild['TieuDeKD'].'/' : '#maps' ?>"><?=$valueChild['TieuDe'] ?></a></li>
						<?php endforeach; ?>
					</ul>
				<?php endforeach; ?>
				
			</div>
			<div class="clearfix"></div>
			<div class="footer-copyright">
				<h1>bản quyền thuộc công ty tnhh quảng cáo alibaba</h1>
				<p>copyright &copy alibabagroupvn</p>
			</div>
		</div>
		<div class="footer-right col-md-4 col-sm-12 col-xs-12">

			<div class="fb-page" data-href="https://www.facebook.com/Alibaba-Group-VN-114340802593519/" data-width="500" data-height="300" data-tabs="timeline"  data-small-header="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Alibaba-Group-VN-114340802593519/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Alibaba-Group-VN-114340802593519/">Alibaba Group VN</a></blockquote></div>

		</div>

		
	</div>
	
</footer>
