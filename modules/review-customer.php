
<section class="review-customer container-fluid">
	<div class="section-top review-top">
		<h1>ý kiến khách hàng</h1>
		<img src="images/brace-top.png" alt="">
	</div>
	<div class="review-form">
		<form action="" method="post" id="form-review">
			<div class="info-customer col-md-6 col-sm-6 col-xs-12">
				<input type="text" name="name" placeholder="Họ tên" required>
				<br>
				<input type="text" name="phone" placeholder="Số điện thoại" required>
				<br>
				<input type="email" name="email" placeholder="Email" required>
			</div>
			<div class="cnt-customer col-md-6 col-sm-6 col-xs-12">
				<textarea name="content" id="" placeholder="Nội dung" required></textarea>
				<input type="submit" name="btnSend" value="Gửi">
			</div>
		</form>
	</div>
</section>
<script>
	$(document).ready(function(){
		
		$(window).scroll(function(){
			var scrollTop = $(window).scrollTop();
			var offsetTop = $('.review-customer').offset().top;
				// alert(scrollTop+"-"+offsetTop);
				if(scrollTop > offsetTop){
					var scrolled = (scrollTop - offsetTop)/30;
					// $('.review-customer').css('background-position', '0 '+scrolled+'px');
				}else{
					var scrolled = (offsetTop - scrollTop)/30;
					// $('.review-customer').css('background-position', '0 -'+scrolled+'px');
				}

			});
		$('#form-review').submit(function(event){
			event.preventDefault();
			var formData = new FormData(this);

			$.ajax({
				url: '../handle/ajax-gopy.php',
				type: 'post',
				dataType: 'text',
				cache:false,
				contentType:false,
				processData:false,
				data: formData,
				success: function(data){
					if(data != true){

						alert(data);
					}else{
						
						alert('cảm ơn bạn đã đóng góp ý kiến');
						$('#form-review').each(function(){
							this.reset();
						});
					}
				}
			});
		});
	});
</script>