<?php
	include "config/config.php";
	include ROOT."/include/function.php";
	spl_autoload_register('loadclass');
	if (!isset($_SESSION)) session_start();
	$db= new Db();
	$cart = new Cart();
	$contact =new Contact();
	$sum =0;
	
	$mod= getIndex("mod");
	if ($mod=="cart")
	{
		$ac		= getIndex("ac");
		$pro_id = getIndex("pro_id");
		
		if ($ac=="add")
		{
			$quantity = getIndex("quantity", 1);
			$cart->addCart($pro_id, $quantity);
		}
		if($ac =="cong" && isset ($_GET["pro_id"]) && isset($_SESSION))
		{
			$cart->addCart(getIndex("pro_id"), 1);
		}
		if($ac =="tru" && isset ($_GET["pro_id"]) && isset($_SESSION))
		{
			$cart->deleCart(getIndex("pro_id"),1);
		}
		if($ac =="xoa" && isset ($_GET["pro_id"]) && isset($_SESSION))
		{
			unset ($_SESSION['cart'][$_GET['pro_id']]);
		}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Red's Pizza | Đặt hàng trực tuyến | Giao bánh tận nơi</title>
<meta name="description" content="Red's Pizza cung cấp đủ loại bánh cho việc mua Pizza trực tuyến. Chế biến hợp vệ sinh, đặt bánh trực tuyến, giao bánh tận nơi. Chương trình khuyến mãi lớn. Có các loại bánh như bánh pizza hải sản, pizza bò, pizza phomai,pizza gà và các loại combo được ưa chuộng." />
<meta name="keywords" content="Red, Reds, Red's, Red's Pizza, Pizza TP.HoChiMinh, Pizza Online, mua Pizza trực tuyến." />
<link href="images/icons/IconRedsPizza.png" rel="icon"/>
<link href="css/style.css" rel="stylesheet" />
</head>

<body>
	<div id="index">
        <!--Begin "header"-->
        <header>
            <div class="topbar">
                <div class="container">
                	<div class="topbar-left">
                    	Chào mừng các bạn <b><?php if(isset($_SESSION["users"])){ echo $_SESSION["users"]["UserName"];}?><b> đến với Red's Pizza !!
                    </div>
                    <div class="topbar-right">
                    	<ul class="topbar-nav">
                        <?php
							if(isset($_SESSION["users"]["UserName"]))
							{
                        		echo "<li><a href='index.php?mod=user&ac=logout'>Thoát</a></li>
									  <li><a href='index.php?mod=user&ac=change'>Đổi thông tin</a></li>
								";
							}else {
								echo "<li><a href='index.php?mod=user&ac=login'>Đăng nhập</a></li>
									  <li><a href='index.php?mod=user&ac=register'>Tạo tài khoản</a></li>
								";
								unset ($_SESSION['cart']);
							}
						?>
                            
                        </ul>
                    </div>
                </div>
            </div><!--end "topbar"-->
            <div class="container">
            	<div class="fleft">
                	<div id="logo" class="logo">
                    	<a href="index.php"><img class="img-responstive" src="images/logo/LogoRedsPizza.png" /></a>
                    </div>
                </div>
                <div class="fright">
                	<div class="top-row">
                    	<div class="fleft">
                        	<address class="telephone">
                            	(0120)745-46-13
                                (0121)342-32-37
                            </address>
                            <address class="circular">
                            	7 ngày trong tuần <br />Từ 9:00 đến 21h00.
                            </address>
                        </div>
                        <div class="fright">
                        	<div id="box-cart">
    							<div class="top-cart-title">
                                	<div id="icon-cart">
                                    	<img src="images/icons/cart.png" />
                                    </div>
                                    <div class="infor-cart">
                                    	<a class="dropdown-toggle">
                							Giỏ hàng
            								<span class="price"><?php echo $sum;?> VND</span>
            							</a>
                                    </div>
                                </div>
                                <div class="shopping-cart">
                					<div class="shopping-cart-header">
                                        <span class="badge"><?php echo $count= $cart->getNumItem();?> Sản Phẩm</span>
                                    </div>
                					<ul class="shopping-cart-items">
                                    <!--sp-->
                                  <?php 
									if(isset ($_SESSION['cart']))
									{
										foreach($_SESSION['cart'] as $pro_id=>$quantity)
										{
											$sql="SELECT * FROM products where ProductID = '$pro_id' ";
											$data = $db->Selectquery($sql);
										?>
                  						<li class="clearfix">
                                    		 <img src="images/products/<?php echo $data[0]["Image"];?>" />
                                    		 <span class="item-name"><?php echo $data[0]["ProductName"];?></span>
                                   			 <span class="item-price">Giá: <?php echo number_format($sumdetail=($data[0]["PriceS"]*$quantity));?> VND</span>
                                    		 <span class="item-quantity">Số lượng: <?php echo $quantity;?></span>
                  						</li>
                                        <?php $sum +=$sumdetail;?>
                                      <?php 
										}
									}
									?>
                					</ul>
                					<a href="index.php?mod=cart" class="button">Kiểm tra</a>
									<script src='js/jquery-3.1.1.min.js'></script>
                                    <script src="js/box-cart.js"></script>
							</div>
                        </div>	
                    </div>
                    <div class="clear"></div>
                    <div class="menu-top">
                    	<div class="fleft">
                        	<div id="tm-menu" class="nav-primary">
                            	<ul class="menu">
                                	<li><a href="index.php?mod=home">Trang chủ</a></li>
                                    <li><a href="index.php?mod=intro">Giới thiệu</a></li>
                                    <li><a href="index.php?mod=request">Phản hồi</a></li>
                                    <li><a href="index.php?mod=conduct">Hướng dẫn</a></li>
                                    <li><a href="index.php?mod=news">Tin tức</a></li>
                                </ul>
                                <div class="clear"></div>
                            </div>
                        </div>
                        <div class="fright">
                        	<div id="search" class="search">
                            <form action="index.php" method="post">
                            	<input type="text" name="search" value="" placeholder="Tìm kiếm ..."/>
                                <button type="button" class="button-search" name="bnsearch"></button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--end "container"-->
        </header><!--End "header"-->
        <!--Begin "main"-->
        <div id="main">
        	<div id="slider">
        		<img src="images/slider/RedsPizzaSlider.png"/>
        	</div>
            <div class="clear"></div>
            <div class="row">
            	<div class="col-left">
                	<div class="menu-mini">
                    	<div class="menu-mini-title">
                        	<h1>Thực đơn</h1>
                        </div>
                        <div class="menu-mini-category">
                        	<ul class="nav-menu-mini">
                            	<li>
                                	<a href="index.php?mod=product&detail=all">Pizza</a>
                                    <ul>
                                    	<li><a href="index.php?mod=product&detail=classic">Loại Truyền Thống</a></li>
                                        <li><a href="index.php?mod=product&detail=speciality">Loại Đặt Biệt</a></li>
                                        <li><a href="index.php?mod=product&detail=hot">Pizza Bán Chạy Nhất</a></li>
                                    </ul>
                               	</li>
                                <li>
                                	<a href="#">Cơm và Mì</a>
                                </li>
                                <li>
                                	<a href="#">Khai vị</a>
                               	</li>
                                <li>
                                	<a href="#">Tráng miệng</a>
                               	</li>
                                <li>
                                	<a href="#">Salad</a>
                               	</li>
                                <li>
                                	<a href="#">Nước uống</a>
                                    <ul>
                                    	<li><a href="#">Soft Drink</a></li>
                                        <li><a href="#">Moctail</a></li>
                                    </ul>
                               	</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-right">
                	<?php include "mod.php";?>
                </div>
            </div>
        </div><!--End "main"-->
         <div class="clear"></div>
        <!--Begin "footer"-->
        <footer>
            <div class="footer-bottom">
            	<div class="container">
                	<div class="owl-footer-col">
                    	<ul class="footer-col">
                        	<h4>Red's Pizza</h4>
                            <li><a href="#">Trang Chủ</a></li>
                            <li><a href="#">Giới Thiệu</a></li>
                            <li><a href="#">Hướng Dẫn</a></li>
                            <li><a href="#">Tin Tức</a></li>
                        </ul>
                    </div>
                </div>
                <div class="container">
                	<div class="owl-footer-col">
                    	<ul class="footer-col">
                        	<h4>Thông Tin Liên Hệ</h4>
                            <li>180 Cao Lỗ, Quận 8, TP.HCM</li>
                            <li>RedsPizza.hol.es</li>
                            <li><b>(012)07-454-613</b></li>
                            <li><b>(012)13-423-237</b></li>
                        </ul>
                    </div>
                </div>
                <div class="container">
                	<div class="owl-footer-col">
                    	<ul class="footer-col">
                        	<h4>Thông Tin Liên Hệ Khác</h4>
                            <li>huuloctran959@gmail.com</li>
                            <li>haotruong2901@gmai.com</li>
                        </ul>
                    </div>
                </div>
                <div id="logo-footer">
            		<a href="index.html"><img src="images/logo/LogoRedsPizza.png"/></a>
            	</div>
            </div>
            <div class="clear"></div>
            <div id="copyright">
            	<b>RedsPizza.hol.es</b>
                <br />
                <b>Đặt món: (0120) 745.46.13 - (0121) 342.32.37</b>
            </div>
        </footer><!--End "footer"--> 
	</div>		
</body>
</html>
