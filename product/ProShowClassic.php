<?php
	$product 	= new Product();
	$data		= $product->getAllDetail("112");
?>
<div class="product-menu">
	<div class="product-title">
    	<h1>Pizza truyền thống</h1>
    </div>
	<?php 
		foreach($data as $row)	
		{
			?>
            <div class="owl-wrapper-out">
            	<div class="owl-wrapper">
                	<div class="owl-item">
                    	<div class="product-item">
                        	<div class="item-inner">
                          		<div class="images-container">
                                	<img src="images/products/<?php echo $row['Image'];?>" alt="Đây là ảnh về Pizza truyền thống tại Red's Pizza"/>
                                     	<div class="box-hover">
                                        	<ul class="add-to-links">
                                            	<li><a class="link-quickview" href="#">Đặt Mua</a></li>
                                                	<li><a class="link-quickview" href="#">Thông Tin</a></li>
                                            	</ul>
                                        </div>
                                </div>
                                <div class="des-container">
                                	<h2 class="product-name"><a href="#" title="Pizza hai san"><?php echo $row['ProductName'];?></a></h2>
                                    <div class="price-box">
                                    	<p class="prices">
                                        	<span class="price-label">Giá S: </span>
                                            <span class="price"><?php echo $row['PriceS'];?></span>
                                        </p>
                                        <p class="prices">
                                             <span class="price-label">Giá L : </span>
                                             <span class="price"><?php echo $row['PriceL'];?></span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
            	</div>              
            </div>
            <?php
		}
	?>
</div>
<div class="clear"></div>

