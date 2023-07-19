<!DOCTYPE>

<?php
include("include/db.php");
?>

<html>
<head>
<title>Insert Product</title>

<script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
<script>tinymce.init({selector:'textarea'});</script>



</head>
<body bgcolor="green">



<form action="insert.php" method="post" enctype="multipart/form-data">
<table align="center" width="700" border="2" bgcolor="pink">


<tr align="center" >
<td colspan="8"><h3>Insert New Post Here</h3></td>

</tr>
<tr>
<td align="right"><b>Product Title:</b></td>
<td><input type="text" name="product_title" size="50" ></td>
</tr>
<tr>
<td align="right"><b>Product Category:</b></td>
<td>
<select name="product_cats">
<option >Select a category</option>
<?php




$get_cats="SELECT * FROM categories";

$run_cats= mysqli_query($con,$get_cats);

while ($row_cats = mysqli_fetch_array($run_cats)) {
	$cat_id=$row_cats['cat_id'];
	$cat_titel=$row_cats['cat_titel'];
	echo"<option value='$cat_id'>". $cat_titel."</option>";
}



?>
</select></td></tr>


<tr>
<td align="right"><b>Product Brand:</b></td>
<td >
<select name="product_brand">
<option >Select a Brand</option>
<?php


$get_brand = "SELECT * FROM branad1";
$run_brand = mysqli_query($con,$get_brand);
while($row_brand = mysqli_fetch_array($run_brand))

{
	
$brand_id=$row_brand['brand1_id'];
$brand_titel= $row_brand['brand1_titel'];
echo "<option value='$brand_id'>$brand_titel</option>" ;
	
}

?>

</select>
</td>
</tr>
<tr>
<td align="right"><b>Product Image:</b></td>
<td><input type="file"name="product_image"/></td>
</tr>
<tr>
<td align="right"><b>Product Price:</b></td>
<td><input type="text" name="product_price"/></td>
</tr>
<tr>
<td align="right"><b>Product Discription:</b></td>
<td><textarea name="product_info" cols="20" rows="10"></textarea></td>
</tr>

<tr>
<td align="right"><b>Product Keyword:</b></td>
<td><input type="text" name="product_key"></td>
</tr>
<tr align="center">
<td colspan="8"><input type="submit" name="insert_post"value="Insert Product Now">
</td>
</tr>
</table>
</form>

</body>
</html>
