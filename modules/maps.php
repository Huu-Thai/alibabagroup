
<section class="maps" id="maps">
	<div class="maps-location">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7838.986956557829!2d106.677185!3d10.7734657!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f212f1ad18b%3A0xc87e2ad7a1a25e14!2zNDA4IMSQaeG7h24gQmnDqm4gUGjhu6csIHBoxrDhu51uZyA0LCBRdeG6rW4gMTAsIEjhu5MgQ2jDrSBNaW5o!5e0!3m2!1svi!2s!4v1511430114925" onload="this.width=screen.width" height="350" frameborder="0" style="border:0;width:100%" allowfullscreen></iframe>
	</div>
	
	<div class="maps-content">
		<div class="maps-contact col-md-12 col-sm-12 col-xs-12">
			<ul>
				<li>
					<div class="title-contact col-md-6 col-sm-6 col-xs-6">
						<h2>liên hệ</h2>
					</div> 
					<div class="btn-show-contact col-md-6 col-sm-6 col-xs-6">
						<img class="show-contact" src="images/down-arrow.png">
					</div>
				</li>
				<div class="list-contact">
					<li>
						<div class="icon-contact">
							<img src="images/icon-clock.png" alt="">
						</div>

						<div class="footer-contact">
							<h2>8:15H-17:00H</h2>
							<p>từ thứ 2 đến thứ 7</p>
						</div>
					</li>
					<li>
						<div class="icon-contact">
							<img src="images/icon-map.png" alt="">
						</div>

						<div class="footer-contact">
							<h2>408 điện biên phủ</h2>
							<p>Phường 11, quận 10, hồ chí minh</p>
						</div>
					</li>
					<li>
						<div class="icon-contact">
							<img src="images/icon-phone.png" alt="">
						</div>

						<div class="footer-contact">
							<p>điện thoại</p>
							<h2>01433211 - 021365645</h2>
						</div>
					</li>
					<li>
						<div class="icon-contact">
							<img src="images/icon-mail.png" alt="">
						</div>

						<div class="footer-contact">
							<p>email</p>
							<h2>hr.alibabagroupvn@gmail.com</h2>
						</div>
					</li>
				</div>

			</ul>
		</div>
	</div>
	
</section>
<script type="text/javascript">
	$(document).ready(function(){
		var i = 0;
		$(".show-contact").click(function(){
			i++;
			if(i == 1){
				$('.list-contact').slideDown();
				$('.maps-contact').attr('style' ,'height: 100% !important');
				$(this).attr('src', 'images/up-arrow.png');
			}
			else{
				$('.list-contact').slideUp();
				$('.maps-contact').attr('style' ,'height: 20% !important');
				$(this).attr('src', 'images/down-arrow.png');
				i = 0;
			}
		});

		$(window).resize(function(){
			var width = $(window).width();

			if(width > 992){
				$('.list-contact').slideDown();
				$('.maps-contact').attr('style' ,'height: 100% !important');
			}
		})
	});
	
</script>
