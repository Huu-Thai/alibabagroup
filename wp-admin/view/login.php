<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>ProAdmin - Login</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <link href="css/login.css" rel="stylesheet" type="text/css" />

</head>
<body>

  <div id="logo">
   <img src="images/logo.png" alt="logopng" width="116" height="34" />
 </div>

 <div class="box">
   <div class="welcome" id="welcometitle">Chào bạn, mời bạn đăng nhập : 
   </div>


   <div id="fields">
    <form id="form1" name="form1" method="post" action="index.php?ctr=UserController&action=handleLogin">
     <div align="center" id="error" style="width:400px; color:#F00; ">
      <?=(isset($_SESSION['error']) ? $_SESSION['error'] : '');?>
    </div>   
    <div style="clear:both"></div>
    <table width="333">
      <tr>
        <td width="100" height="35"><span class="login">Tên đăng nhập: </span></td>
        <td width="244" height="35"><label>
          <input name="username" type="text" class="fields" id="username" size="30" />
        </label></td>
      </tr>
      
      <tr>
        <td height="35"><span class="login">Mật khẩu: </span></td>
        <td height="35"><input name="password" type="password" class="fields" id="password" size="30" />
        </td> 
      </tr>
      
      <tr>
        <td height="65">&nbsp;</td>
        <td height="65" valign="middle"><label>
          <input name="btnLog" type="submit" class="button" id="btnLog" value="Đăng nhập" />

        </label></td>
      </tr>
    </table>
  </form>
</div>

<div class="login" id="lostpassword"><a href="#">Lost Password?</a></div>
</body>

</html>