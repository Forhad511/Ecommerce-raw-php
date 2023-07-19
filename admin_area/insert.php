<?php

$con=mysqli_connect("localhost","root","","ecommarce");





if(isset($_POST['insert_post'])){


  	$product_cats=$_POST['product_cats'];
  $product_brand=$_POST['product_brand'];
  $product_title=$_POST['product_title'];
  $product_price=$_POST['product_price'];
    $product_info=$_POST['product_info'];
      $product_key=$_POST['product_key'];
	
	$product_image=$_FILES['product_image']['name'];
	$product_image_tmp=$_FILES['product_image']['tmp_name'];

move_uploaded_file($product_image_tmp,"product_images/$product_image");


$insert_product="INSERT INTO products1 (product_cats,product_brand,product_title,product_price,product_info,product_image,product_key) values('$product_cats','$product_brand','$product_title','$product_price','$product_info','$product_image','$product_key')";



echo $insert_pro= mysqli_query($con,$insert_product);
if($insert_pro)
{

echo"<script>alert('Product has been Insarted')</script>";echo"<script>window.open('insert_product.php','_self')</script>";
	
	
}



}




?>