<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
$sum 	=0;
?>
<form method="post" action="">
	<table border="2px" width="100%" height="100px">
            <thead>
                <tr height="50px" bgcolor="#CCCCCC">
                    <th>Tên SP</th>
                    <th>Hình ảnh</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <?php
			if(isset ($_SESSION['cart']))
			{ 
				foreach($_SESSION['cart'] as $pro_id=>$quantity)
				{
					$sql="SELECT * FROM products where ProductID = '$pro_id' ";
					$data = $db->Selectquery($sql);
					?>
				<tbody>
					 <tr>
						<td><?php echo $data[0]["ProductName"];?></td>
                        <td width="135px"><img src="images/products/<?php echo $data[0]["Image"];?>" /></td>
						<td><?php $dongia=$data[0]["PriceS"]; echo number_format($data[0]["PriceS"]);?> VND</td>
						<td><?php echo $quantity;?></td>
						<td><?php echo number_format($sumdetail=($data[0]["PriceS"]*$quantity));?> VND</td>
						<td>
							<a href="index.php?mod=cart&ac=cong&pro_id=<?php echo $pro_id?>">+</a>
							<a href="index.php?mod=cart&ac=tru&pro_id=<?php echo $pro_id?>">-</a>
                            <a href="index.php?mod=cart&ac=xoa&pro_id=<?php echo $pro_id?>">Xóa</a>
						</td>
					 </tr>
                     <?php $sum +=$sumdetail;?>
				</tbody>
				<?php
				//$datasp[$data[0]['ProductID']]= array("soluong"=>$quantity,"dongia"=>$dongia,":thanhtien"=>$sumdetail);
				$proid=$data[0]["ProductID"];
				$datasp[]= array("product_id"=>$proid,"soluong"=>$quantity,"dongia"=>$dongia,"thanhtien"=>$sumdetail);
				 }
			}
			?>
            		<tr>
            			<td>Tổng tiền mua được</td>
                		<td colspan="5" name ="amount"><?php echo number_format($sum)?> VND</td>
            		</tr> 
        </table>
        <div class="center">
            <input type="submit" id="submitbtn" name="sbm" tabindex="5" value="Đặt hàng">
        </div>
        <div><?php //echo "<pre>",print_r($datasp),"</pre>"; ?></div>
 </form>
 <?php
 
 if(isset($_POST) && isset($_POST['sbm']))
	{
		$userid=$_SESSION['users']['UserID'];
		$dataorder= array(":user_ID"=>$userid,":amount"=>$sum);
		$s = new db();		
		$action = $cart->addOrder($dataorder);
		$lastid= $cart->lastInsertedId();
		echo "last id = $lastid ";
		if($action)
		{
			//$cart->saveAddNew($datasp);
			$datasp[$data[0]['ProductID']]= array("soluong"=>$quantity,"dongia"=>$dongia,"thanhtien"=>$sumdetail);
			echo "datasp: ";
			echo "<pre>",print_r($datasp),"</pre>";
			echo "/datasp: ";
			
			foreach($datasp as $key=>$value)
			{
				$pro_id= (isset($value['product_id']))?$value['product_id']:'';
				$soluong= $value['soluong'];
				$thanhtien= $value['thanhtien'];
				if($pro_id =="" || $pro_id==NULL )
				{
					continue;
				}
				else{
				$datachitiet= array(":product_id"=>$pro_id,":orderid"=>$lastid,":soluong"=>$soluong,":thanhtien"=>$thanhtien);
				$cart->saveAddNew($datachitiet);
				}
			}
		}
	}
?>
</body>
</html>