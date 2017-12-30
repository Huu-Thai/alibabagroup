
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
<form action="index.php?ctr=MenuController&action=handleAddMenu" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<table border="1" align="center" cellpadding="4" cellspacing="0">
		<tr>
			<td colspan="2" align="center">THÊM MENU</td>
		</tr>
		<tr>
			<td width="100">Tên Menu</td>
			<td>
				<input type="text" name="name">
			</td>
		</tr>
		<tr>
			<td width="100">Chọn Phần Tử</td>
			<td>
				<?php if($data['result'] != false): ?>
					<?php mysqli_data_seek($data['result'], 0); ?>

					<?php while($row = mysqli_fetch_assoc($data['result'])): ?>
						<input type="checkbox" name="listItem[]" value="<?=$row['id']?>"><?=$row['name']?><br>
					<?php endwhile; ?>
				<?php endif; ?>
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
