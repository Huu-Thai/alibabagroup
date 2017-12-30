<?php 
header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=SoDienThoaiKhachHang.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);
?>
<?php
	include "../dbcon.php";
	
	if($_POST['tungay'] == '' || $_POST['denngay'] == ''){
		$tungay = date('Y-m-d');
		$denngay = date('Y-m-d');
	}
	else{
		$tungay = date("Y-m-d",strtotime($_POST['tungay']));
		$denngay = date("Y-m-d",strtotime($_POST['denngay']));
	}
?>
<style>
	#dulieu_sodienthoai tr td, #dulieu_sodienthoai tr th{text-align:center;}
</style>
<table id="dulieu_sodienthoai">
	<tr>
		<td colspan="6"><p align="center"><strong style="font-size:20px">Bảng dữ liệu số điện thoại khách hàng từ ngày <?=$tungay?> đến <?=$denngay?></strong></p></td>
	</tr>
	<tr>
		<th>STT</th>
		<th>Số điện thoại</th>
		<th>Link</th>
		<th>Ngày giờ</th>
		<th>IP</th>
		<th>Ghi chú</th> 
	</tr>
	<?php
		$i = 0;
		$kq = listsdt($tungay,$denngay);
		while($row = mysql_fetch_assoc($kq)){ $i++;
			$mang = explode("---",$row['sdt']);
			$sdt = $mang[0];
			$link = $mang[1];	
			//if(strpos($mang[1],"?")>0)	$link = strstr($mang[1],"?",true);
			//else $link = $mang[1];
	?>
	<tr>
		<td><p align="center"><?php echo $i?></p></td>
		<td><p align="center">`<?php echo $sdt?></p></td>
		<td><p align="center"><?php echo $link?></p></td>
		<td><p align="center"><?php echo date("d-m-Y H:i:s",strtotime($row['NgayGioDK']))?></p></td>
		<td><p align="center"><?php echo $row['IP']?></p></td>
		<td><p align="center"><?php echo $row['Ghichu']?></p></td>
	</tr>
	<?php }?>
</table>
