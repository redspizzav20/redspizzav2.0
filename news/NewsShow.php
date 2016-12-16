<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<?php
	$row["Title"]="";
	$row["Image"]="";
	$row["Description"]="";
	if (isset($_POST["sm"]) && isset($_FILES) && isset($_POST))
	{
		$n= $news->saveAddNew();
		if ($n) echo "Đã thêm $n tin nhắn";
		else echo "Lỗi thêm ";
	}
		$sql="SELECT * FROM news";
		$stm = $db->Selectquery($sql);
// da sua loi	
?>
<body>
	<div class="content-wrapper">
    <form action="index.php?mod=news" method="POST" enctype="multipart/form-data">
	<fieldset>
    	<table cellspacing="3">
        	<tr>
            	<td>Tiêu đề</td>
                <td><input type="text" name="title" value="<?php echo $row["Title"]?>"></td>
            </tr>
             <tr>
                <td>Hình hiển thị</td>
                <td><input type="file" name="img" value="<?php echo $row["Image"]?>" multiple></td>
            </tr>
            <tr>
                <td>Mô tả</td>
              	<td>
            	   	<textarea id="ck" name="desc" value="<?php echo $row["Description"] ?>"></textarea>
                    </td>
            </tr>
            <tr>
                <td colspan="2">
                   <input type="submit" name="sm" value="Thêm">
                </td>
            </tr>
        </table>   	        	
    </fieldset>
	</form>
    </div>
	<div id="tab">										
        <table border="1px" width="100%">
            <thead>
                <tr height="50px" bgcolor="#CCCCCC">
                    <th>Mã tin tức</th>
                    <th>Tiêu đề</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                    <?php 
                    $data = $news->listNews();
                    foreach($data as $row)
                    {?>
                        <tr>
                            <td><?php echo $row["NewsID"];?></td>
                            <td><?php echo $row["Title"];?> VND</td>
                            <td width="135px"><img src="<?php echo $row["Image"];?>" /></a></td>
                            <td><?php echo $row["Description"];?></td>
                            <td>
                                <a href="index.php?mod=news&ac=edit&news_id=<?php echo $row["NewsID"];?>" title="Edit">Sửa</a>&nbsp;&nbsp;
                                <a href="index.php?mod=news&ac=delete&news_id=<?php echo $row["NewsID"];?>" title="Delete">Xóa</a> 
                            </td>
                        </tr>
                    <?php
                    }$v = isset($_GET["value"])?$_GET["value"]:"";
                    ?>
            </tbody>
        </table>
	</div>
</body>
</html>