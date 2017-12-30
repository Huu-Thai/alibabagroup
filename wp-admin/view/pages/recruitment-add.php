
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<form action="index.php?ctr=RecruitmentController&action=handleAddRecruitment" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table border="1" align="center" cellpadding="4" cellspacing="0">
    <tr> <td colspan="2" align="center">THÊM TIN TỨC BỆNH MỚI</td> </tr>

    <tr>
      <td width="100">Chọn Loại Tin Tuyển Dụng</td>
      <td>
        <select name="categoryId" id="categoryId">
          <?php if($data['category'] != false): ?>
            <?php mysqli_data_seek($data['category'], 0); ?>
            <?php $row = mysqli_fetch_assoc($data['category']); ?>
            <option value="<?=$row['id']?>"><?=$row['name']?></option>
            <?php $data['cateIdChild'] = $Category->getCateByParent($row['id']); ?>
            <?php if($data['cateIdChild'] != false): ?>
              <?php mysqli_data_seek($data['cateIdChild'], 0); ?>
              <?php while($rowChild = mysqli_fetch_assoc($data['cateIdChild'])): ?>
                <option value="<?=$rowChild['id']?>">--<?=$rowChild['name']?></option>
              <?php endwhile; ?>
            <?php endif; ?>
          <?php endif; ?>
        </select>
      </td>
    </tr>

    <tr>
      <td width="100">Vị Trí Tuyển</td>
      <td><input name="title" type="text" id="title" value="<?=(isset($_POST['title']) ? $_POST['title'] : '') ?>" /></td>
    </tr>
    <tr>
      <td width="100">Nội Dung</td>
      <td>
       <label>
         <textarea name="description" id="description" cols="45" rows="15"><?=isset($_POST['description']) ? $_POST['description'] : '' ?></textarea>
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
    <td width="100">Giới Tính</td>
    <td>
      <select name="gender" id="">
        <option value="1">Nam</option>
        <option value="2">Nữ</option>
        <option value="3">Nam / Nữ</option>
      </select>
    </td>
  </tr>
  <tr>
    <td width="100">Độ Tuổi</td>
    <td><input name="age" type="text" id="age" value="<?=isset($_POST['age']) ? $_POST['age'] : '' ?>" /></td>
  </tr>
  <tr>
    <td width="100">Hạn Chót</td>
    <td><input style="width:200px" name="deadline" type="date" id="deadline" value="<?=isset($_POST['deadline']) ? $_POST['deadline'] : '' ?>" /></td>
  </tr>

  <tr>
    <td width="100">Nơi Làm Việc</td>
    <td><input name="workAddress" type="text" id="workAddress" value="<?=isset($_POST['workAddress']) ? $_POST['workAddress'] : '' ?>" /></td>
  </tr>

  <tr>
    <td width="100">Mức Lương</td>
    <td><input name="salary" type="text" id="salary" value="<?=isset($_POST['salary']) ? $_POST['salary'] : '' ?>" /></td>
  </tr>

  <tr>
    <td width="100">Keyword</td>
    <td><input name="keyword" type="text" id="keyword" value="<?=isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>" /></td>
  </tr>

  <tr>
    <td colspan="2" align="center"><input type="submit" name="btnPreView" id="btnPreView" value="Xem thử" />
      <input type="submit" name="btnOK" id="btnOK" value="Thêm" />
      <input type="reset" name="btnxoa" id="btnxoa" value="Làm lại" />
    </td>
  </tr>
</table>
</form>
