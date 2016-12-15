<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
$mod = Utils::getIndex("mod");
if($mod=="product")
{
	$product = new Product();
	$detail =getIndex("detail");
	if($detail=="classic")
	{
		include ROOT."/module/product/ProShowClassic.php";
	}
	else if($detail=="speciality")
	{
		include ROOT."/module/product/ProShowSpeciality.php";
	}
	else if($detail=="hot")
	{
		include ROOT."/module/product/ProShowHot.php";
	}
}
else
	include ROOT."module/product/ProShow.php";
?>
<body>
</body>
</html>