<script>
  function displayThumbnail(){
    var value = $('#urlImage').val();
    if (value != "") {
      var bien = "<img src='"+value+"' width='150' height='150'>";
      $('#thumbnail').html(bien);
    };
  }
</script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="index.php?ctr=ProductController&action=handleEditProduct" method="post" enctype="multipart/form-data" name="form1" id="form1">
	<input type="hidden" name="id" value="<?=$data['product']['id']?>">
  <table border="1" align="center" cellpadding="4" cellspacing="0">
    <tr> <td colspan="2" align="center">THÊM SỬA SẢN PHẨM</td> </tr>

    <tr>
      <td width="100">Chọn Loại Sản Phẩm</td>
      <td>
        <select name="categoryId" id="categoryId">
          <?php if($data['category'] != false): ?>
            <?php mysqli_data_seek($data['category'], 0); ?>
            <?php $row = mysqli_fetch_assoc($data['category']); ?>
            <option <?=($row['id']==$data['product']['category_id'] ? 'selected' : '') ?> value="<?=$row['id']?>"><?=$row['name']?></option>
            <?=$row['id'] ?>
            <?php $data['cateIdChild'] = $Category->getCateByParent($row['id']); ?>

            <?php if($data['cateIdChild'] != false): ?>
              <?php mysqli_data_seek($data['cateIdChild'], 0); ?>
              <?php while($rowChild = mysqli_fetch_assoc($data['cateIdChild'])): ?>
                <option <?=($rowChild['id']==$data['product']['category_id'] ? 'selected' : '') ?> value="<?=$rowChild['id']?>">--<?=$rowChild['name']?></option>
              <?php endwhile; ?>
            <?php endif; ?>
          <?php endif; ?>
        </select>
      </td>
    </tr>

    <tr>
      <td width="100">Tiêu Đề</td>
      <td><input name="title" type="text" id="title" value="<?=(isset($data['product']['title']) ? $data['product']['title'] : '') ?>" /></td>
    </tr>
    <tr>
     <td>Hình Ảnh</td>
     <td>
       <input name="urlImage" type=text class="txt" id="urlImage" value="<?=(isset($data['product']['url_image']) ? $data['product']['url_image'] : '') ?>" />
       <label>

        <input onclick="BrowseServer('hinhanh:/','urlImage')"  type="button" name="btnChonFile" id="btnChonFile" value="Chọn File" />

      </label>
      <div style="clear: both"></div>
      <div id="thumbnail">

      </div>
    </td>
  </tr>
  <tr>
    <td width="100">Tóm Tắt</td>
    <td>
     <label>
       <textarea name="shortDes" id="shortDes" cols="45" rows="5"><?=isset($data['product']['short_description']) ? $data['product']['short_description'] : '' ?></textarea>
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
  <td width="100">Nội Dung</td>
  <td>
   <label>
     <textarea name="description" id="description" cols="45" rows="15"><?=isset($data['product']['description']) ? $data['product']['description'] : '' ?></textarea>
   </label>
   <script type="text/javascript">
    var editor = CKEDITOR.replace( 'description',{
      filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?Type=Images',
      filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?Type=Flash',
      filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
      filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',
      height: '500px',
      toolbar:[
      { name: 'document', items : [ 'Source','-','Templates' ] },
      { name: 'clipboard', items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ] },
      { name: 'editing', items : [ 'Find','Replace','-','SelectAll','-','SpellChecker', 'Scayt' ] },
      { name: 'forms', items : [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton',
      'HiddenField' ] },
      '/',
      { name: 'basicstyles', items : [ 'Bold','Italic','Underline','Strike','Subscript','Superscript','-','RemoveFormat' ] },
      { name: 'paragraph', items : [ 'NumberedList','BulletedList','-','Outdent','Indent','-','Blockquote','CreateDiv',
      '-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock','-','BidiLtr','BidiRtl' ] },
      { name: 'links', items : [ 'Link','Unlink','Anchor' ] },
      { name: 'insert', items : [ 'Image','MediaEmbed','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak','Iframe' ] },
      '/',
      { name: 'styles', items : [ 'Styles','Format','Font','FontSize' ] },
      { name: 'colors', items : [ 'TextColor','BGColor' ] },
      { name: 'tools', items : [ 'Maximize', 'ShowBlocks','-','About' ] }
      ]
    });
  </script>
</td>
</tr>

<tr>
  <td width="100">Keyword</td>
  <td><input name="keyword" type="text" id="keyword" value="<?=isset($data['product']['keyword']) ? $data['product']['keyword'] : '' ?>" /></td>
</tr>

<tr>
  <td width="100">Khoản Chi Phí</td>
  <td><input name="fee" type="text" id="fee" value="<?=isset($data['product']['fee']) ? $data['product']['fee'] : '' ?>" /></td>
</tr>

<tr>
  <td width="100">Khoản Thời Gian</td>
  <td><input name="periodTime" type="text" id="periodTime" value="<?=isset($data['product']['period_time']) ? $data['product']['period_time'] : '' ?>" /></td>
</tr>

<tr>
  <td width="100">Phạm Vi Công Việc</td>
  <td><input name="scropeWork" type="text" id="scropeWork" value="<?=isset($data['product']['scrope_work']) ? $data['product']['scrope_work'] : '' ?>" /></td>
</tr>

<tr>
  <td colspan="2" align="center">
    <input type="submit" name="btnOK" id="btnOK" value="Sửa" />
  </td>
</tr>
</table>
</form>
