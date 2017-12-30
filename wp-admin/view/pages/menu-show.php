
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
      $.post('index.php?ctr=MenuController&action=changeShowHide&x='+(new Date()).getTime(), param, function(data) {
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
  <th width="150">Tên Menu</th>
  <th width="400">Thành Phần Menu</th>
  <th width="50">Thứ Tự</th>
  <th width="50">Ẩn/Hiện</th>
  <th width="150">Thao Tác</th>
</tr>
<?php if($data['menu'] != false): ?>
  <?php mysqli_data_seek($data['menu'], 0); ?>
  <?php while ($row = mysqli_fetch_assoc($data['menu']) ): ?>
    <?php ob_start(); ?>
    <tr>
      <td class="anhien">{id}</td>
      <td>{menuName}</td>
      <td>{cateName}</td>
      <td>
      <input style="width:100%;text-align:center;padding:5px 0;" type="text" variable="{id}" name="ordinal" id="ordinal_{ordinal}" class="ordinal" value="{ordinal}">
      </td>
      <td class="anhien"><a class="smallButton anhien" id="ma_{id}"  AnHien="id={id}"  href="#"><img  src="images/ah_{showHide}.png"></a></td>
      <td align="center">
        <a class="smallButton" href="index.php?ctr=MenuController&action=showEditMenu&cateMenuId={cateMenuId}"><img  src="images/pencil.png" title="Sửa Tin"></a>
        <a class="smallButton" href="index.php?ctr=CategoryController&action=delete&id={id}" onclick="return confirm('Bạn có muốn xóa !!! ');"><img src="images/close.png" title="Xóa Tin"></a>
        <a class="smallButton" href="/chi-tiet/san-pham/{TieuDeKD}.html" target="_blank"><img src="images/eye_inv.png" title="Lấy Link"></a>
      </td>
    </tr>
    <?php
    $str = ob_get_clean();
    $str = str_replace("{id}",$row['id'],$str);
    $str = str_replace("{cateMenuId}", $row['cate_menu_id'], $str);
    $str = str_replace("{menuName}", $row['menu_name'], $str);
    $str = str_replace("{cateName}", $row['cate_name'], $str);
    $str = str_replace("{ordinal}", $row['ordinal'] , $str);
    $str = str_replace("{showHide}", $row['show_hide'], $str);
    echo $str;
    ?>
  <?php endwhile; ?>
<?php endif; ?>

</table>

<script type="text/javascript">
  $(document).ready(function(){
    $('.ordinal').live('change', function(){
      var ordinal = $(this).val();
      var id = $(this).attr('variable');

      $.ajax({
        url: 'index.php?ctr=MenuController&action=changeOrdinal',
        type: 'post',
        dataType: 'text',
        data:{ordinal:ordinal, id},
        success: function(data){
          // console.log(data);
        }
      });
    });
  });
</script>