<?php
	if (isset($_POST["sm"]) && isset($_FILES) && isset($_POST))
	{
		$n= $user->saveAddNew();
		?>
        <script language="javascript">
            alert("Bạn đã đăng ký trở thành thành viên Red's Pizza!!");
            window.location="index.php";
        </script>
		<?php
	}
		$sql="SELECT * FROM users";
		$stm = $db->Selectquery($sql);
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Dang Ky thanh vien</title>
  <link rel="stylesheet" type="text/css" media="all" href="../../css/style.css">
</head>
<body>
<div id="w">
	<form id="contactform" name="contact" method="post" action="index.php?mod=user&ac=register">
  		<h1><p class="note"><span class="req">*</span>Các thông tin cần điền.</p></h1>
  		<div class="row-cont">
    		<label for="name">Tên truy cập<span class="req">*</span></label>
    		<input type="text" name="user_name" id="name" class="txt" tabindex="1" placeholder="Your Name" required>
		</div>
   		<div class="row-cont">
    		<label for="name">Mật khẩu<span class="req">*</span></label>
    		<input type="password" name="user_password" id="name" class="txt" tabindex="1" placeholder="Your Password" required>
		</div>
        <div class="row-cont">
                <label for="email">Địa chỉ E-mail<span class="req">*</span></label>
                <input type="email" name="user_email" id="email" class="txt" tabindex="2" placeholder="address@gmail.com" required>
        </div>
        <div class="center">
            <input type="submit" id="submitbtn" name="sm" tabindex="5" value="Đăng Ký">
        </div>
	</form>
</div>
</body>
</html>