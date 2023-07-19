<!DOCTYPE>
<?php
include("function/function.php");
?>
<html>
<head>
<title>My one line Shop</title>
<link rel="stylesheet" href="style/style.css" media="all">
<style type="text/css">
#apDiv1 {
	position: absolute;
	left: 700px;
	top: 164px;
	width: 304px;
	height: 36px;
	z-index: 1;
}
#apDiv2 {
	position: absolute;
	left: 672px;
	top: 160px;
	width: 328px;
	height: 28px;
	z-index: 1;
}
</style>
</head>
<body>
<!----Main Contener Stard Here-->
<div class="main_wrapper">
  
  <!--Main head Stard here-->
  <div class="header_wrapper">
<a href="index.php"><img src="image/logooooo.jpg" width="334" height="100" id="logo"/></a>
<img  src="image/shop_banner1.jpg" width="666" height="100" id="banner"/>
<div>    <marquee onMouseOver="this.stop()"onMouseOut="this.start()"
    scrolldelay="10" scrollamount="3" direction="left" class="bodytext_news">
      <b> <font color="black"> Shop For All:: Rrgstation Now:</font>
      <a href="#"> <font color="#CCCCCC"> Online Shopping just Click</font></a>
      </b>
      </marquee><br/>
      <br/>
      </div>
      <div id="form">
      
      <form action="results.php" method="get" enctype="multipart/form-data">
      <input type="text" name="user_query" placeholder="Search a product"/>
      <input type="submit" name="search" value="Search" />
      
      
      
      </form>
      
      
      </div>
      
      
</div>

<!--Main head Ends here-->


<!--navagation ber start here-->
<div class="menuber">
<div id='cssmenu' align="center">
<ul>
   <li ><a href='index.php'><span>Home</span></a></li>
   <li><a href='all_products.php'><span>All Products</span></a></li>
   <li><a href='Customer/my_account.php'><span>My Account</span></a></li>
   <li><a href='cart.php'><span>Shopping Cart </span></a></li>
   <li ><a href='information.php'>Contact Us</a></li>
   <li ><a href='#'><span>registration</span></a></li>
  </ul>
  
</div>
<!--navagation ber Ends here--><div class="content_wrapper">

<div id="sideber">
<div id="sideber_titel">Catagorys</div>
<ul id="cats" >
   <?php getCats();
   ?>
</ul>


<div id="sideber_titel1">Brand</div>
<ul id="cats" >

     <?php
getBrands();
   ?>

   
</ul>
</div>



<div id="content_area">
<?php cart();?>



<div id="shopping_cart">
<span style="float:right; font-size:20px; padding:10px; line-height:50px;">Welcome To Online Shopping!<b style="color:#CF3;">Shopping Cart -</b> Total Item:<?php total_items(); ?> Total Price:<?php total_price(); ?> <a href="cart.php" style="color:#CC0;">Go To Cart</a>






</span>
</div>



<div id="products_box">

<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="800" bgcolor="white">
<tr align="center">
<th> Remove</th>
<th>Product(s)</th>
<th>Quantity</th>
<th> Total Price</th>
</tr>

<?php

	$total=0;
	global $con;
	$ip=getIp();
	$sel_price="SELECT * FROM cart where ip_add='$ip'";
	$run_price=mysqli_query($con,$sel_price);
	while($p_price=mysqli_fetch_array($run_price)){
		
		$pro_id=$p_price['p_id'];
		$pro_price="SELECT * FROM products1 where product_id='$pro_id'";
		$run_pro_price=mysqli_query($con,$pro_price);
		while ($pp_price=mysqli_fetch_array($run_pro_price)){
			
			
			$product_price = array($pp_price['product_price']);
			$product_title= $pp_price['product_title'];
			$product_image= $pp_price['product_image'];
			$single_price= $pp_price['product_price'];
			$values = array_sum($product_price);
			$total+= $values;


 ?>
 
 <tr align="center">
 
 <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/> </td>
 <td><?php echo $product_title; ?> <br>
<img src="admin_area/product_images/<?php echo $product_image; ?>" width="60" height="60"/> </td>
 <td> <input type="text" size="5" name="qty"/> </td>
 <td><?php echo $single_price ."/="; ?></td>
 </tr>
 
 <?php } } ?>
 <tr align="right">
 <td colspan="4">Sub Total:</td>
 <td ><?php echo $total."/=";?> </td>
 </tr>
<tr align="center">
<td><input type="submit" name="remove_pro" value="Remove Product"/></td>
<td><input type="submit" name="Continue" value="Continue Shopping"/></td>
<td align="right"> <button><a href="#" style="text-decoration:none; color:black">Chackout</a></button> </td>
</tr>
 
</table>
</form>
<?php 
$ip = getIp();
global $con;
if(isset($_POST['remove_pro'])){
	
	foreach($_POST['remove'] as $remove_id){
		$delele_product = "DELETE FROM cart where p_id='$remove_id' AND  ip_add='$ip'"; 
		$run_delete=mysqli_query($con,$delele_product);
		if($run_delete){
			echo"<script>window.open('cart.php','_self')</script>";
			}
		
		
		}
	
	
	}




?>


</div>


</div>

</div>
<div id="footer">
<h2 style="text-align:center; color:#9FF; padding:30px;">&copy; 2015 By www.Online Traning.com</h2>
</div>


</div>
</div>
<!----Main Contener Ends Here-->














</body>
</html>