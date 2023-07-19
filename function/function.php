<?php
$con=mysqli_connect("localhost","root","","ecommarce");


function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;

}



function cart(){
	if(isset($_GET['add_cart'])){
		global $con;
		$ip= getIp();
		$pro_id=$_GET['add_cart'];
		$check_pro="SELECT * FROM cart where ip_add='$ip' AND p_id='$pro_id'";
		$run_chack=mysqli_query($con,$check_pro);
		if(mysqli_num_rows($run_chack)>0){
			
			echo"";
			
			}
			else{
				
				
				$insert_pro =" INSERT INTO cart(p_id,ip_add) values('$pro_id','$ip')";
				
			$run_pro =mysqli_query($con,$insert_pro);	
				echo"<script> window.open('index.php','_self')</script>";
				
}
}
}

//geting The total adds items

function total_items(){
	
	if (isset($_GET['add_cats'])){
		
		global $con;
		$ip=getIp();
		$get_items="SELECT * FROM cart where ip_add='$ip'";
		$run_items= mysqli_query($con,$get_items);
		$count_items=mysqli_num_rows($run_items);
	}
		
		
   else
{
			
		global $con;
		$ip=getIp();
		$get_items="SELECT * FROM cart where ip_add='$ip'";
		$run_items= mysqli_query($con,$get_items);
		$count_items=mysqli_num_rows($run_items);
		
		
}
	
	echo $count_items;
	}



//Geating total price of cart 


function total_price(){
	
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
			$values = array_sum($product_price);
			$total+= $values;
			}
		
		
		
		
		}
	
	
	echo $total."/=";
	
	}



//Geting The Categories

function getCats(){
global $con;


$get_cats="SELECT * FROM categories";
$run_cats= mysqli_query($con,$get_cats);
while($row_cats = mysqli_fetch_array($run_cats))

{
	$cat_id=$row_cats['cat_id'];
	$cat_titel=$row_cats['cat_titel'];
	echo"<li> <a href='index.php?cat=$cat_id'>$cat_titel</a></li>";
}

}


//Geting The Brands

function getBrands(){
	
	global $con;
$get_brand = "SELECT * FROM branad1";
$run_brand = mysqli_query($con,$get_brand);
while($row_brand = mysqli_fetch_array($run_brand))

{
	
$brand_id =$row_brand['brand1_id'];
$brand_titel = $row_brand['brand1_titel'];
echo"<li><a href ='index.php?brand=$brand_id'>$brand_titel</a></li>";
	
}

}

function getpro(){
	if(!isset($_GET['cat'])){
		if(!isset($_GET['brand'])){
	
	global $con;
	$get_pro="SELECT * FROM products1";
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
<p><b>Price:$pro_price /= </b></p>
<a href='Details.php?pro_id=$pro_id' style='float:left'>Details</a>
<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cats</button></a>
</div>


";

	
		
		}
	
	}
	}
	
	}


function getcatpro(){
	if(isset($_GET['cat'])){
		$cat_id=$_GET['cat'];
			
	global $con;
	$get_cat_pro="SELECT * FROM products1 where product_cats= '$cat_id'";
	$run_cat_pro=mysqli_query($con,$get_cat_pro);
	$count_cat=mysqli_num_rows($run_cat_pro);
	if($count_cat==0){
		echo"<h2 style='padding:20px;'> This is on Product in the Category!</h2>";
		
		}
	while($row_cat_pro=mysqli_fetch_array($run_cat_pro))
	{
		
$pro_id=$row_cat_pro['product_id'];	
$pro_cat=$row_cat_pro['product_cats'];
$pro_brand=$row_cat_pro['product_brand'];
$pro_title=$row_cat_pro['product_title'];
$pro_price=$row_cat_pro['product_price'];
$pro_image=$row_cat_pro['product_image'];


echo
"<div id='single_product'>
<h3> $pro_title </h3>
<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
<p><b>$pro_price /= </b></p>
<a href='Details.php?pro_id=$pro_id' style='float:left'>Details</a>
<a href='index.php?add_cart=$pro_id'><button style='float:right'>Add to Cats</button></a>
</div>


";

	
		
		}
	
	}
	}
	
	function getbrandpro(){
	if(isset($_GET['brand'])){
		$cat_id=$_GET['brand'];
			
	global $con;
	$get_brand_pro= "SELECT * FROM products1 where product_brand='$brand_id'";
	$run_brand_pro = mysqli_query($con,$get_brand_pro);
	$counts_brand = mysqli_num_rows($run_brand_pro);
	if($counts_brand ==0){
		echo"<h2 style='padding:20px;'> No brand!</h2>";
		
		}
	while($row_brand_pro = mysqli_fetch_array($run_brand_pro))
	{
		
$pro_id=$row_brand_pro['product_id'];	
$pro_cat=$row_brand_pro['product_cats'];
$pro_brand=$row_brand_pro['product_brand'];
$pro_title=$row_brand_pro['product_title'];
$pro_price=$row_brand_pro['product_price'];
$pro_image=$row_brand_pro['product_image'];

echo
"<div id='single_product'>
<h3> $pro_title </h3>
<img src='admin_area/product_images/$pro_image' width='180' height='180'/>
<p><b>$pro_price /= </b></p>
<a href='Details.php?pro_id=$pro_id' style='float:left'>Details</a>
<a href='index.php?add_cart=$pro_id'>< button style='float:right'>Add to Cats</button></a>
</div>


";

	
		
	}
	
	}
	}
	
	


?>