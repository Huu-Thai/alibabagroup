
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
  $(document).ready(function() {
    $(".anhien").click(function() {
      var param = $(this).attr('AnHien');
      var id = $(this).attr('id');
      $.post('index.php?ctr=NewsController&action=changeShowHide&x='+(new Date()).getTime(), param, function(data) {
        var strRespon = "<img  src=images/ah_"+data+".png>";
        $("#"+id).html(strRespon);
      });
      return false;
    });
  });
  function nhapchuot(){
    var dulieu = $("#TieuDe").val();
    if (dulieu == "Nhập tiêu đề cần tìm")
      $("#TieuDe").val("");
  }
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<form action="" method="get" name="form2" id="form2">
  <input type="hidden" name="p" id="p" value="tt_xem" />
  <input type="text" id="TieuDe" name="TieuDe" value="Nhập tiêu đề cần tìm" onclick="nhapchuot()" />
  <input type="submit" value="Tìm" id="btnLocMa" name="btnLocMa" />
</form>
<div style="clear: both; height: 10px"></div>
<table id="dsloaitin" border="1" cellpadding="4" cellspacing="0" width="900" align="center" />

<tr>
  <th width="20">Mã</th>
  <th width="100">Loại Tin Tức</th>
  <th width="150">Tiêu đề</th>
  <th width="80">Hình</th>
  <th width="400">Tóm Tắt</th>
  <th width="200">Người Đăng</th>
  <th width="50">Ẩn/Hiện</th>
  <th width="200">Thao Tác</th>
</tr>
<?php if($data['news'] != false): ?>
  <?php mysqli_data_seek($data['news'], 0); ?>
  <?php while ($row = mysqli_fetch_assoc($data['news']) ) : ?>
    <?php ob_start(); ?>
    <tr>
      <td class="anhien">{id}</td>
      <td style="text-align: center;text-transform: capitalize;">
        <?php //$News->findCateById($row['id']); ?>
        {nameCate}
      </td>
      <td>{title}</td>
      <td><img src="{urlImage}" width="70" height="70"></td>
      <td>{shortDes}</td>
      <td>{nameUser}</td>
      <td class="anhien"><a class="smallButton anhien" id="ma_{id}"  AnHien="id={id}"  href="#"><img  src="images/ah_{showHide}.png"></a></td>
      <td align="center">
        <a class="smallButton" href="index.php?ctr=NewsController&action=showEditNews&id={id}"><img  src="images/pencil.png" title="Sửa Tin"></a>
        <a class="smallButton" href="index.php?ctr=NewsController&action=delete&id={id}" onclick="return confirm('Bạn có muốn xóa !!! ');"><img src="images/close.png" title="Xóa Tin"></a>
        <a class="smallButton" href="/chi-tiet/san-pham/{alias}.html" target="_blank"><img src="images/eye_inv.png" title="Lấy Link"></a>
      </td>
    </tr>
    <?php
    $str = ob_get_clean();
    $str = str_replace("{id}",$row['id'],$str);
    $str = str_replace("{nameCate}",$row['name_cate'],$str);
    $str = str_replace("{title}",$row['title'],$str);
    $str = str_replace("{alias}",$row['alias'],$str);
    $str = str_replace("{urlImage}",$row['url_image'],$str);
    $shortDes = $News->deleteFormat($row['short_description']);
    $shortDes = $News->cutString($shortDes, 200, ' ...');
    $str = str_replace("{shortDes}", $shortDes ,$str);
    $str = str_replace("{nameUser}", $row['name_user'] ,$str);
    $str = str_replace("{showHide}",$row['show_hide'],$str);
    echo $str;
    ?>
  <?php endwhile; ?>
<?php endif; ?>

<?php if ($data['totalRow'] > $data['pageSize']) { ?>
<tr>
  <td colspan="8" align="left">
   <p id=thanhphantrang>
   <?=$NewsController->pagesList($data['totalRow'], $data['pageNum'], $data['pageSize']);?>
  </p>
</td>
</tr>
<?php } ?>
</table>
