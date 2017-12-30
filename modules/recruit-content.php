<?php 
$pageSize = 10; 
$pageNum = 1;

if (isset($_GET['pageNum']) == true) $pageNum = $_GET['pageNum'];

if ($pageNum <= 0) $pageNum = 1; settype($pageNum, "int");

$TieuDe = '';
if(isset($_GET['TieuDe'])){
	$TieuDe = $_GET['TieuDe'];
}
$result = $alibaba->getRecruitment($totalRow, $pageNum, $pageSize, $TieuDe);
	// var_dump($result);
?>
<section class="recruitment w88">
	<div class="recruit-left col-md-8 col-sm-12 col-xs-12">
		<div class="recruit-title container-fluid">
			<h1>thông báo tuyển dụng (<?=$totalRow?>)</h1>
			<div class="recruit-close" style="display:none">
				<span>X</span>
			</div>
			
		</div>
		<div class="clear20"></div>
		<div class="recruit-list-news container-fluid">
			<?php if($result != false): ?>
				<?php while($row = mysql_fetch_assoc($result)): ?>
					<?php ob_start(); ?>
					<div class="recruit-news container-fluid">
						<div class="recruit-news-top">
							<h2 id="{id}">{title}</h2>
						</div>
						<div class="recruit-news-bottom">
							<div class="recruit-news-bt-left col-md-6 col-sm-6 col-xs-12">
								<span>{gender}: {age}</span>
								<p>nơi làm việc: <span>{address}</span></p>
							</div>
							<div class="recruit-news-bt-right col-md-6 col-sm-6 col-xs-12">
								<span>Hạn nộp hồ sơ: <time>{deadline}</time></span>
								<p>mức lương: {salary}</p>
							</div>
						</div>
					</div>
					
					<!-- 	<input type="hidden" id="recruit_{id}" value="{id}"> -->
					<?php 
					$str = ob_get_clean();
					$str = str_replace("{title}", $row['title'], $str);
					$gender = $row['gender'];
					switch ($gender) {
						case 0:
							$gender = 'Nam';
							break;
						case 1:
							$gender = 'Nữ';
							break;
						case 2:
							$gender = 'Nam / Nữ';
							break;
						default:
						$gender = $gender;
						break;
					}
					$str = str_replace("{gender}", $gender, $str);
					$str = str_replace("{age}", $row['age'], $str);
					$str = str_replace("{address}", $row['address'], $str);
					$str = str_replace("{deadline}", date('d-m-Y', strtotime($row['deadline'])), $str);
					$str = str_replace("{salary}", $row['salary'], $str);
					$str = str_replace("{id}", $row['id'], $str);
					echo $str;
					?>
				<?php endwhile; ?>
			<?php endif; ?>
		</div>
		<div class="paginate container-fluid">
			<nav aria-label="Page navigation">
				<ul class="pagination">
					<?=$alibaba->pagesListAli('tuyen-dung',$totalRow , $pageNum, $pageSize) ;?>
				</ul>
			</nav>
		</div>	
	</div>
	<div class="recruit-right col-md-4 col-sm-12 col-xs-12">
		<div class="recruit-rgt-top col-12">
			<div class="recruit-rgt-title">
				<img src="images/arrow-right.png" alt="">
				<h1>cơ chế phúc lợi</h1>
			</div>
			<div class="clear10"></div>
			<div class="recruit-offer">
				<ul>
					<li>- <span>Lương thưởng cạnh tranh hấp dẫn</span></li>
					<li>- <span>Được trải nghiệm trong môi trường chuyên nghiệp</span></li>
					<li>- <span>Tham gia các chính sách ưu đãi cho nhân viên công ty</span></li>
					<li>- <span>Bảo hiểm theo quy định</span></li>
					<li>- <span>Hỗ trợ cơm trưa</span></li>
					<li>- <span>Xét duyệt lương 6 tháng một lần</span></li>
					<li>- <span>Thưởng chỉ tiêu, thưởng nhóm</span></li>
					<li>- <span>Lương tháng 13</span></li>
					<li>- <span>Tiệc liên hoan hàng tháng</span></li>
				</ul>
			</div>
		</div>
		<div clas="20px"></div>
		<div class="recruit-step col-12">
			<div class="recruit-step-title recruit-rgt-title">
				<img src="images/arrow-right.png" alt="">
				<h1>cơ chế phúc lợi</h1>
			</div>
			<div class="clear10"></div>
			<div class="recruit-step-list">
				<ul>
					<li>Bước 1: Gửi hồ sơ của bạn cho chúng tôi <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendMail" data-whatever="@mdo">Gửi hồ sơ</button></li>
					<li>Bước 2: Làm bài test(Tùy vị trí)</li>
					<li>Bước 3: Gặp gỡ Team Tuyển dụng và trưởng bộ phận</li>
					<li>Bước 4: Gặp gỡ Giám đốc điều hành hoặc CEO (Tùy vị trí)</li>
					<li>Bước 5: Thông báo nhận việc qua điện thoại và e-mail cho những ứng viên phù hợp</li>
				</ul>
			</div>
		</div>
	</div>
</section>

<script>
	$(document).ready(function(){
		$('#myModal').modal('hide');
		$('.recruit-news-top h2').each(function(){
			$(this).click(function(){
				var id = $(this).attr('id');
				$.ajax({
					url: 'handle/ajax-recruit.php',
					type: 'post',
					dataType: 'json',
					data:{
						id:id
					},
					success: function(data){
						
						$(".recruit-modal .modal-title").html(data.title);
						$(".recruit-modal .modal-body").html(data.description);
						$('#myModal').modal('show');
					}
				});
				
			});
		});
	});


</script>

<div class="recruit-modal modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">vị trí tuyển</h4>
			</div>
			<div class="modal-body">
				

			</div>
			<div class="modal-footer">
				<p>
				gửi hồ sơ của bạn cho chúng tôi: 
				<!-- <span> hr.alibabagroupvn@gmail.com </span> <span>(ghi rõ vị trí tuyển dụng)</span> -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sendMail" data-whatever="@mdo">Gửi hồ sơ</button>
				</p>
				<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button> -->
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="sendMail" tabindex="-1" role="dialog" aria-labelledby="sendMailLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> -->
				<h4 class="modal-title" id="sendMailLabel">Ứng tuyển</h4>
			</div>
			<div class="modal-body">
				<form action="" method="post" id="form-send" enctype="multipart/form-data">
					<div class="form-group">
						<label for="name" class="control-label">Họ và tên:</label>
						<input type="text" class="form-control" id="name">
					</div>
					<div class="form-group">
						<label for="email-name" class="control-label">Email của bạn:</label>
						<input type="email" class="form-control" id="email-name">
					</div>
					<div class="form-group">
						<label for="position" class="control-label">Vị trí ứng tuyển:</label>
						<!-- <textarea class="form-control" id="title-text"></textarea> -->
						<?php $resultJob = $alibaba->getRecruitmentAll(); ?>
						<select name="" id="position" style="max-height:">
							<option value="0">Tất cả</option>
							<?php if($resultJob != false): ?>
								<?php while($row = mysql_fetch_assoc($resultJob)): ?>
									<option value="<?=$row['id']?>"><?=$row['name']?></option>
								<?php endwhile; ?>
							<?php endif; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="file-text" class="control-label">File CV: <i>pdf, doc, docx</i></label>
						<input type="file" class="form-control" id="file-text">
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
				<button type="button" class="btn-send btn btn-primary" for="form-send">Gửi</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){

		$('.btn-send').click(function(event){
			event.preventDefault();
			var form_data = new FormData();
			var file_data = $('#file-text').prop('files')[0]; 
			var email = $('#email-name').val();
			var position = $('#position').val();  
			var name = $('#name').val();
			
			var flag = 0;

			if(name != '' && email != '' && position != 0 && file_data != undefined){
				form_data.append('file', file_data);
				form_data.append('email', email);
				form_data.append('position', position);
				form_data.append('name', name);

				if(flag == 0){
					$('body').append('<div class="load-cv" style="width:100%;height:100%;display:block; position:fixed;z-index:10000;top:0;bottom:0;left:0;right:0;text-align:center;background-color:#fff;padding-top: 20%;"><img src="images/ajax-loader.gif" ></div>');
				}

				$.ajax({
					url: 'handle/ajax-send-mail.php',
					type: 'post',
					dataType: 'text',
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,
					success: function(data){

						if(data.length > 0){
							flag = 1;
							$('.load-cv').css('display', 'none');
							alert(data);
						}
					}
				});
			}else{

				alert('Nhập thiếu thông tin !')
			}
		});

		$('.recruit-news .recruit-news-top h2').each(function(){
			$(this).click(function(){

				var title_id = $(this).attr('id');
				$('#position option').each(function(){
					var value_op = $(this).val();

					if(value_op == title_id){
						$(this).prop('selected', true);
					}
				});
			});
		});
	});
</script>