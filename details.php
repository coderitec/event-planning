<!DOCTYPE html>
<?php
include("functions/functions.php");


?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>welcome to OurParti</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/main.css">
    <script src="scripts/main.js"></script>
</head>
<body>
    <!--MAINBAR STARTS HERE-->
    <main class="main_wrapper">
        <!--HEADER starts HERE-->
        <section class="header_wrapper">            
            <section class="menubar">
                    <nav>
                        <ul id="menu">
                            <li><a href="#">home</a></li>
                            <li><a href="#">services</a></li>
                            <li><a href="#">goods</a></li>
                            <li><a href="#">contact us</a></li>
                            <li><a href="#">cart</a></li>
                            <li><a href="#">sign up</a></li>
                        </ul>
                    </nav>
                    <section id="form">
                        <form method="GET" action="result.php" enctype="multipart/form-data">
                            <input type="text" name="input_query" placeholder="search for services">
                            <input type="submit" name="search" value="Search">
                        </form>
                    </section>
            </section>
        </section>
        <!--HEADER ENDS HERE-->
        <section class="content_wrapper">

                <section id="sidebar">
                    <h2 id="sidebar_title">Services</h2>
                    <aside>
                            <ul id="cats">
                            	<?php getCats(); ?>    
                            </ul> 
                            
                            <h2 id="sidebar_title">Products</h2>
                             <ul id="cats">      
                                <?php getBrands(); ?>
                                </ul>
                    </aside>
                </section>
                <section id="content_area">

                	<aside id="shopping_cart">
                		<span style="float: right; font-size: 18px; line-height: 40px; padding: 5px; text-transform: uppercase;">welcome to ourpati!
                		Total Item:  Total Prices:  <a href="cart.php" style="text-decoration: none; color: #800080; ">See Selections</a>
                		</span>
                		
                	</aside>

                	<section id="products_box">

                		<?php

                		if (isset($_GET['pro_id'])){
                			
                			$product_id = $_GET['pro_id'];
                	
                		
                		$get_pro = "select * from products where product_id='$product_id' ";

							$run_pro = mysqli_query($con, $get_pro);

							while ($row_pro = mysqli_fetch_array($run_pro)) {
								
								$pro_id = $row_pro['product_id'];
								$pro_title = $row_pro['product_title'];
								$pro_price = $row_pro['product_price'];
								$pro_image = $row_pro['product_image'];
								$pro_desc = $row_pro['product_desc'];

								echo "
							
	
									<section id='single_product'>
										<h3>$pro_title</h3>


										<img src='admin_area/product_images/$pro_image' width='400' height='300' />

										<p style='font-weight: bolder;'>₦ </span>$pro_price</p>
										
										<h3>$pro_desc</h3>

										<a href='index.php' style='float: left;'>Back To Home</a>
										<a href='index.php?pro_id=$pro_id'><button style='float: right;'>Add to Cart</button></a>

									</section>

							";
						
						}

											  	}	
						?>	
                	</section>

                </section>
        

        </section>


        <section id="footer">
        	<h2 style="text-align: center; padding-top: 40px;"> &copy; 2019 <a href="https://twitter.com/SincerelyFranc">franc</a></h2>
        </section>

    </main>
     <!--MAINBAR ENDS HERE-->
</body>
</html>