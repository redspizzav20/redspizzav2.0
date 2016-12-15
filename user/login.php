<?php
if (!isset($_SESSION)) session_start();

$u = isset($_POST["username"])?$_POST["username"]:"";
$p = isset($_POST["password"])?$_POST["password"]:"";
if ($u !="" && $p !="")
{
	$db = new Db();
	$sql = "SELECT * FROM users WHERE UserName=:u AND UserPassword= :p ";
	$arr = array(":u"=>$u, ":p"=> md5($p) );
	
	$rows = $db->Selectquery($sql, $arr);
	$n = Count($rows);
	if ($n >0)
	{
		$_SESSION["users"]= $rows[0];
	}
	else
	{
		echo "Nhập sai thông tin!";	
	}
	?>

	<script language="javascript">
		window.location="index.php";
	</script>
   	<?php 
}
?>
<!doctype html>
<html lang="en-US">
<head>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
  <title>Đăng Nhập</title>
  <link rel="stylesheet" type="text/css" media="all" href="../../css/style.css">
</head>

<body>
<div id="w">
	<h1>Truy cập !!</h1>
	<form id="contactform" name="contact" method="post" action="index.php?mod=user&ac=login">
  		<p class="note">
        	<span class="req">*</span>Các thông tin cần điền.
        </p>
  		<div class="row-cont">
    		<label for="username">Tên truy cập<span class="req">*</span></label>
    		<input type="text" name="username" class="txt" tabindex="1" placeholder="username" required>
		</div>
        <div class="row-cont">
                <label for="subject">Mật khẩu<span class="req">*</span></label>
                <input type="password" name="password" class="txt" tabindex="3" placeholder="password" required>
        </div>
        <div class="center">
            <input type="submit" id="submitbtn" name="submitbtn" tabindex="5" value="Truy cập">
        </div>
	</form>
</div>
</body>
</html>