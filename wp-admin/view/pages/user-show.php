
<style>
	#thanhphantrang a {text-decoration:none; padding-left:5px; padding-right:5px; margin-left:5px; margin-right:5px;}
	#thanhphantrang span {
		padding-left:5px;
		padding-right:5px;
		margin-left:5px;
		margin-right:5px;
		color:#F00;
		font-size: 24px;
		font-weight: bolder;
	}
	.smallButton{
		border: 1px solid #cdcdcd;
		padding: 5px 5px;
		display: inline-block;
		background: #f6f6f6;
		margin:0 10px 0 0;
	}
</style>


<script type="text/javascript">
	function nhapchuot(){
		var dulieu = $("#keyword").val();
		if (dulieu == "Nhập tiêu đề cần tìm")
			$("#keyword").val("");
	}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<form action="" method="get" name="form2" id="form2">
	<input type="hidden" name="p" id="p" value="tk_xem" />
	<input type="text" id="keyword" name="keyword" value="Nhập tiêu đề cần tìm" onclick="nhapchuot()" />
	<input type="submit" value="Tìm" id="btnLocMa" name="btnLocMa" />
</form>
<div style="clear: both; height: 10px"></div>
<table id="dsloaitin" border="1" cellpadding="4" cellspacing="0" width="450" align="center" />

<tr>
	<th width="20">STT</th>
	<th width="200">Username</th>
	<th width="200">Tên</th>
	<th width="200">Ảnh Đại Diện</th>
	<th width="80">Chức Vụ</th>
	<th width="200">Thao Tác</th>
</tr>
<?php if($data['users'] != false): ?>
	<?php mysqli_data_seek($data['users'], 0); ?>

	<?php while($row = mysqli_fetch_array($data['users'])) : ?>
	
		<?php ob_start(); ?>
		<tr>  	
			<td>{id}</td>
			<td>{username}</td>
			<td>{name}</td>
			<td><img src="{avatar}" style="max-width:150px;height:auto;"></td>
			<td>{task}</td>
			<td width="200" align="center">
				<a class="smallButton" href="main.php?p=tk_mk&id={STT}"><img  src="images/pencil.png" title="Đổi Mật Khẩu"></a>
				<a class="smallButton" href="main.php?p=tk_cv&id={STT}"><img  src="images/pencil.png" title="Thay Đổi Quyền"></a>
				<a class="smallButton" href="tk_xoa.php?id={STT}" onclick="return confirm('Bạn có muốn xóa !!! ');"><img src="images/close.png" title="Xóa Tài Khoản"></a>
			</td>
		</tr>


		<?php 	
		$str = ob_get_clean(); 
		$str = str_replace("{id}", $row['id'], $str);
		$str = str_replace("{username}", $row['username'], $str);
		$str = str_replace("{name}", $row['name'], $str);
		$str = str_replace("{avatar}", $row['avatar'], $str);
		$str = str_replace("{task}", $row['task'] ,$str);
		echo $str;
		?>
	
	<?php endwhile; ?>
<?php endif; ?>

</table>
