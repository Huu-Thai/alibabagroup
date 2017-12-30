 <script>
 	$(document).ready(function() {
 		$("#form1").submit(function(event) {
 			// event.preventDefault();

 			$(":input").not('#urlImage').each(function(){
 				var value = $(this).val().length;

 				if(value == '' || value == ' '){
 					alert('Thiếu thông tin nhập vào');
 				}
 			})
 			// var user = $("#User").val();
 			// if(user.indexOf(' ') > 0){
 			// 	alert ('Tài khoản không được có khoản trống');
 			// 	return false;
 			// }
 			// else
 			// 	return true;
 		});

 		// $("#urlImage").live('change', function(){

 		// 	var pathFile = $(this).val();
 		// 	var img = "<img src='"+pathFile+"' width='150' height='150'>";
			// $('#thumbnail').html(img);
 		// });
 	});


 </script>
 <div class="error alert"><?=isset($_SESSION['error']) ? $_SESSION['error'] : '' ?><?php unset($_SESSION['error']); ?></div>
 <form action="index.php?ctr=UserController&action=store" method="post" enctype="multipart/form-data" name="form1" id="form1">
 	<table border="1" align="center" cellpadding="4" cellspacing="0">
 		<tr> <td colspan="2" align="center">THÊM TÀI KHOẢN</td> </tr>
 		<tr><td width="100">Nhóm</td>
 			<td>
 				<?php $result = $User->getGroupUser(); ?>
 				<select  id="idGroup" name="groupId">
 					<?php if($result != false): ?>
 						<?php mysqli_data_seek($result, 0); ?>
 						<?php while($row = mysqli_fetch_assoc($result)): ?>
 							<option value="<?=$row['id']?>"><?=$row['task']?></option>
 						<?php endwhile; ?>
 					<?php endif; ?>
 				</select>
 			</td>
 		</tr>
 		<tr>
 			<td width="100">Tên Người Dùng</td>
 			<td><input type="text" name="name" id="name" /></td>
 		</tr>
 		<tr><td>Hình Ảnh</td>
 			<td>
 				<input name="avatar" type=text class="txt" id="urlImage" value="" />
 				<label>

 					<input onclick="BrowseServer('hinhanh:/','urlImage')"  type="button" name="btnChonFile" id="btnChonFile" value="Chọn File" />

 				</label>
 				<div style="clear: both"></div>
 				<div id="thumbnail">

 				</div>
 			</td>
 		</tr>
 		<tr>
 			<td width="100">Tài Khoản</td>
 			<td><input type="text" name="username" id="User" /></td>
 		</tr>
 		<tr><td width="100">Mật Khẩu</td>
 			<td><input type="password" name="password" id="Pass" /></td>
 		</tr>
 		<!-- <tr>
 			<td>Mô Tả</td>
 			<td>
 				<textarea name="" id="description"  rows="10" style="width:100%"></textarea>
 				<script>
 					CKEDITOR.replace('description', {
 						filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
 						filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
 						filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
 						filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
 						height: '150px',
 						toolbar:[
 						{ name: 'basicstyles', items : [ 'Bold','Italic','Underline' , 'Image', 'Format'] },
 						]
 					});

 				</script>

 			</td>
 		</tr> -->
 		<tr><td colspan="2" align="center"><input type="submit" name="btnOK" id="btnOK" value="Thêm" />
 			<input type="reset" name="btnxoa" id="btnxoa" value="Làm lại" /></td>
 		</tr>
 	</table>
 </form>