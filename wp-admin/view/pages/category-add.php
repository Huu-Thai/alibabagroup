
<script>
	function displayThumbnail(){
		var value = $('#urlImage').val();
		if (value != "") {
			var bien = "<img src='"+value+"' width='150' height='150'>";
			$('#thumbnail').html(bien);
		};
	}

	$(document).ready(function() {

		// $("#form1").submit(function(){
		// 	if($("#parentId").val()==0){alert('Chưa chọn thể loại!'); return false;}
		// });
	});
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="index.php?ctr=CategoryController&action=handleAdd" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<table border="1" align="center" cellpadding="4" cellspacing="0">
		<tr> <td colspan="2" align="center">THÊM DANH MỤC</td> </tr>

		<tr>
			<td width="100">Chọn Danh Mục Cha</td>
			<td>
				<select id="parentId" loai="" name="parentId">

					<option value="0">------------</option>
					<?php if($data['cateId'] != false): ?>
						<?php mysqli_data_seek($data['cateId'], 0); ?>
						<?php while($rowCate = mysqli_fetch_assoc($data['cateId'])): ?>
							<option value="<?=$rowCate['id']?>"><?=$rowCate['name']?></option>

							<?php $data['cateIdChild'] = $Category->getCateByParent($rowCate['id']); ?>
							<?php if($data['cateIdChild'] != false): ?>
								<?php mysqli_data_seek($data['cateIdChild'], 0); ?>
								<?php while($rowCateChild = mysqli_fetch_assoc($data['cateIdChild'])): ?>
									<option value="<?=$rowCateChild['id']?>">--<?=$rowCateChild['name']?></option>
								<?php endwhile; ?>
							<?php endif; ?>
						<?php endwhile; ?>
					<?php endif; ?>
				</select>
			</td>
		</tr>

		<tr><td width="100">Tiêu Đề</td>
			<td><input name="name" type="text" id="name" /></td>
		</tr>
		<tr><td>Hình Ảnh</td>
			<td>
				<input name="urlImage" type=text class="txt" id="urlImage" />
				<label>

					<input onclick="BrowseServer('hinhanh:/','urlImage')"  type="button" name="btnChonFile" id="btnChonFile" value="Chọn File" />

				</label>
				<div style="clear: both"></div>
				<div id="thumbnail">

				</div>
			</td>
		</tr>
		<tr><td width="100">Tóm Tắt</td>
			<td>
			<label>
				<textarea name="shortDes" id="shortDes" cols="45" rows="5"></textarea>
			</label>
			<script type="text/javascript">
				var editor = CKEDITOR.replace( 'shortDes',{
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
	</tr>

	<tr>
		<td colspan="2" align="center">
			<input type="submit" name="btnOk" value="Thêm">
			<!-- <input type="reset" name="btnDelete" id="btnDelete" value="Làm lại" /> -->
		</td>
	</tr>
</table>
</form>
