
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
      $.post('index.php?ctr=CategoryController&action=changeShowHide&x='+(new Date()).getTime(), param, function(data) {
        var strRespon = "<img  src=images/ah_"+data+".png>";
        $("#"+id).html(strRespon);
      });
      return false;
    });
  });
  function nhapchuot(){
    var dulieu = $("#keyword").val();
    if (dulieu == "Nhập tiêu đề cần tìm")
      $("#keyword").val("");
  }
</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<form action="index.php?ctr=CategoryController&action=showCategory" method="post" name="form2" id="form2">
  <input type="text" id="keyword" name="keyword" value="Nhập tiêu đề cần tìm" onclick="nhapchuot()" />
  <input type="submit" value="Tìm" id="btnSearch" name="btnSearch" />
</form>
<div style="clear: both; height: 10px"></div>
<table id="dsloaitin" border="1" cellpadding="4" cellspacing="0" width="900" align="center" />

<tr>
  <th width="20">Mã</th>
  <th width="150">Tiêu đề</th>
  <th width="80">Hình</th>
  <th width="400">Tóm Tắt</th>
  <th width="50">Ẩn/Hiện</th>
  <th width="150">Thao Tác</th>
</tr>
<?php if($data['categories'] != false): ?>
  <?php mysqli_data_seek($data['categories'], 0); ?>
  <?php while ($row = mysqli_fetch_assoc($data['categories']) ): ?>
    <?php ob_start(); ?>
    <tr>
      <td class="anhien">{id}</td>
      <td>{name}</td>
      <td><img src="{urlImage}" width="70" height="70"></td>
      <td>{shortDes}</td>
      <td class="anhien"><a class="smallButton anhien" id="ma_{id}"  AnHien="id={id}"  href="#"><img  src="images/ah_{showHide}.png"></a></td>
      <td align="center">
        <a class="smallButton" href="index.php?ctr=CategoryController&action=showEditCategory&id={id}"><img  src="images/pencil.png" title="Sửa Tin"></a>
        <a class="smallButton" href="index.php?ctr=CategoryController&action=delete&id={id}" onclick="return confirm('Bạn có muốn xóa !!! ');"><img src="images/close.png" title="Xóa Tin"></a>
        <a class="smallButton" href="/chi-tiet/san-pham/{TieuDeKD}.html" target="_blank"><img src="images/eye_inv.png" title="Lấy Link"></a>
      </td>
    </tr>
    <?php
    $str = ob_get_clean();
    $str = str_replace("{id}",$row['id'],$str);
    $str = str_replace("{name}",$row['name'],$str);
    $str = str_replace("{urlImage}",$row['url_image'],$str);
    $shortDes = $Category->cutString($row['short_description'], 150, ' ...');
    $str = str_replace("{shortDes}", $shortDes , $str);
    $str = str_replace("{showHide}", $row['show_hide'], $str);
    echo $str;
    ?>
  <?php endwhile; ?>
<?php endif; ?>

<?php if ($data['totalRow'] > $data['pageSize']) { ?>
<tr>
  <td colspan="8" align="left">
   <p id=thanhphantrang>
    <?=$Category->pagesList($data['totalRow'], $data['pageNum'], $data['pageSize']);?>
  </p>
</td>
</tr>
<?php } ?>
</table>
