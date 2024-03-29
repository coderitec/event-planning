<!DOCTYPE html>
<?php
include("includes/db.php");


?>
<html>
<head>
	<title>inserting products</title>
	<script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
	<main>
		<form action="insert_product.php" method="post" enctype="multipart/form-data">
			<table align="center" width="750" border="2px" bgcolor="#800080">
				<thead>
					<tr align="center">
						<th colspan="7"><h2>Inserting New Post Here</h2></th>
					</tr>
				</thead>
				<tbody style="color: white; font-weight: bolder;">
					<tr>
						<td align="right">Product Title:</td>
						<td><input type="text" name="product_title" size="60" required></td>
					</tr>
					<tr>
						<td align="right">Product Category:</td>
						<td>
							<select name="product_cat">
								<option>Select Category</option>
								<?php
									 $get_cats = "SELECT * FROM categories";

								    $run_cats = mysqli_query($con, $get_cats);

								    while ($row_cats = mysqli_fetch_array($run_cats)) {
								        $cat_id = $row_cats['cat_id'];
								        $cat_title = $row_cats['cat_title'];

								    echo "<option value='$cat_id'>$cat_title</option>";    

   									 }
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">Product Brand:</td>
						<td>
							<select name="product_brand" required>
								<option>Select Brand</option>
								<?php
									 $get_brands = "select * from brands";

								    $run_brands = mysqli_query($con, $get_brands);

								    while ($row_brands = mysqli_fetch_array($run_brands)) {
								        $brand_id = $row_brands['brand_id'];
								        $brand_title = $row_brands['brand_title'];

								    echo "<option value='$brand_id'>$brand_title</option>";    

								    }
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td align="right">Product Image:</td>
						<td><input type="file" name="product_image"></td>
					</tr>
					<tr>
						<td align="right">Product Price:</td>
						<td><input type="text" name="product_price" required></td>
					</tr>
					<tr>
						<td align="right">Product Description:</td>
						<td>
							<textarea name="product_desc" cols="20" rows="10"></textarea>
						</td>
					</tr>
					<tr>
						<td align="right" >Product Keywords:</td>
						<td><input type="text" name="product_keyword" size="50" required></td>
					</tr>
			
					<tr align="center">
						<td colspan="8"><input type="submit" name="insert_post" value="Insert Product Now"></td>
					</tr>
				</tbody>
			</table>

		</form>
	</main>

</body>
</html>
<?php

	if (isset($_POST['insert_post'])) {

		//getting the text data from the field

		$product_title =$_POST['product_title'];
		$product_cat =$_POST['product_cat'];
		$product_brand =$_POST['product_brand'];
		$product_price =$_POST['product_price'];
		$product_desc =$_POST['product_desc'];
		$product_keyword =$_POST['product_keyword'];

		//getting the image from the field
		$product_image =$_FILES['product_image']['name'];
		$product_image_tmp =$_FILES['product_image']['tmp_name'];

		move_uploaded_file($product_image_tmp, "product_images/$product_image");

		$insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keyword) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keyword')";

		$insert_pro = mysqli_query($con, $insert_product);

		if($insert_pro){

			echo "<script>alert('You just added new product')</script>";
			echo "<script>window.open('insert_product.php', '_self')</script>";
		}
	}


?>