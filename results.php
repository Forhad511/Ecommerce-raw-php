<!DOCTYPE>
<?php
include("function/function.php");
?>
<html>
<head>
<title>My one line Shop</title>
<link rel="stylesheet" href="style/style.css" media="all">
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
   <li ><a href='#'><span>Contact Us</span></a></li>
   <li ><a href='#'><span>registration</span></a></li>
  </ul>
</div>


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

<div id="shopping_cart">
<span style="float:right; font-size:20px; padding:10px; line-height:50px;">Welcome To Online Shopping!<b style="color:#CF3;">Shopping Cart -</b> Total Item: Total Price: <a href="cart.php" style="color:#CC0;">Go To Cart</a>






</span>
</div>



<div id="products_box">

<?php 
if(isset($_GET['search'])){
	$search_query=$_GET['user_query'];

$get_pro="SELECT * FROM products1 where product_title like'%$search_query%'";
	$run_pro=mysqli_query($con,$get_pro);
	while($row_pro=mysqli_fetch_array($run_pro))
	{
		
$pro_id=$row_pro['product_id'];	
$pro_cat=$row_pro['product_cats'];
$pro_brand=$row_pro['product_brand'];
$pro_title=$row_pro['product_title'];
$pro_price=$row_pro['product_price'];
$pro_image=$row_pro['product_image'];


echo
"<div id='single_product'>
<h3> $pro_title </h3>
<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
<p><b>Price:$pro_price/=</b></p>
<a href='Details.php?pro_id=$pro_id' style='float:left'>Details</a>
<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add to Cats</button></a>
</div>


";
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