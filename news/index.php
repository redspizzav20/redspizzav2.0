<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ADMINS | Red's Pizza</title>
</head>
<?php
$mod = Utils::getIndex("mod");
if($mod=="news")
{
	$news = new News();
	$ac = Utils::getIndex("ac");
	if($ac=="!=delete")
	{
		include ROOT."/admin/module/news/UpNews.php";
	}
	else if($ac=="delete")
	{
		$n = $news->Delete(Utils::getIndex("news_id"));
		?>
			<script language="javascript">
				alert("Đã xóa <?php echo $n;?> tin tức!");
				window.location="index.php?mod=news";
			</script>
		<?php
	}
	else if($ac=="edit")
	{
		include ROOT."/admin/module/news/UpNews.php";
	}
	else
	{
		include ROOT."/admin/module/news/NewsShow.php";
	}
}
?>
<body>
<body>
</body>
</html>