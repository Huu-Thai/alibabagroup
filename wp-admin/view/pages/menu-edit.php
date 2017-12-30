
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="index.php?ctr=MenuController&action=handleEditMenu" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<table border="1" align="center" cellpadding="4" cellspacing="0">
		<tr>
			<td colspan="2" align="center">SỬA MENU</td>
		</tr>
		<tr>
			<td width="100">Tên Menu</td>
			<td>
				<input type="text" name="name" value="<?=$data['nameMenu']['menu_name']?>" readonly>
				<input type="hidden" name="cateMenuId" value="<?=$data['nameMenu']['cate_menu_id']?>">
			</td>
		</tr>
		<tr>
			<td width="100">Chọn Phần Tử</td>
			<td>
				<?php if($data['cateNameMenu'] != false): ?>
					<?php mysqli_data_seek($data['cateNameMenu'], 0); ?>

					<?php while($row = mysqli_fetch_assoc($data['cateNameMenu'])): ?>
						<input <?=(in_array($row['id'], $data['listItemMenu']) ? 'checked' : '') ?> type="checkbox" name="listItem[]" value="<?=$row['id']?>"><?=$row['name']?><br>
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
