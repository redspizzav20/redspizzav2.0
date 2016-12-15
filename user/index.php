<?php
$mod = Utils::getIndex("mod");
if($mod=="user")
{
	$user = new User();
	$ac = Utils::getIndex("ac");
	if($ac =="register")
	{
		include ROOT."/module/user/register.php";
	}
	else if($ac =="login")
	{
		include ROOT."/module/user/login.php";
	}
	else if($ac =="logout")
	{
		include ROOT."/module/user/logout.php";
	}
}
?>
<body>
</body>
</html>