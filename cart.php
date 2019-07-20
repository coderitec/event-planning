<!DOCTYPE html>
<?php

session_start();


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
                            <li><a href="index.php">home</a></li>
                            <li><a href="all_products.php">services</a></li>
                            <li><a href="all_products.php">goods</a></li>
                            <li><a href="#">contact us</a></li>
                            <li><a href="cart.php">cart</a></li>
                            <li><a href="#">sign up</a></li>
                        </ul>
                    </nav>
                   
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

                    <?php cart(); ?>

                	<aside id="shopping_cart">
                		<span style="float: right; font-size: 0.9em; line-height: 8em; padding: 1em; text-transform: uppercase;">

                            <?php

                            if (isset($_SESSION['customer_email'])) {
                                
                                echo "<b>Welcome:</b>" . $_SESSION['customer_email'] ;
                            }
                            else{
                                echo "<b>Welcome Guest:</b>";
                            }
                            ?>
                		Total Item: <?php total_items() ?>  Total Prices:<?php total_price(); ?>  <a href="index.php" style="text-decoration: none;background: white; color: #800080; ">Back to Home</a>
                         <?php


                             if (!isset($_SESSION['customer_email'])) {
                            
                            echo "<a href='checkout.php' style='text-decoration: none; color: orange; ' >LogIn</a>";
                        }
                        else{
                            echo "<a href='logout.php' style='text-decoration: none; color: orange;'>Log Out</a>";
                        }

                    ?>

                		</span>
                		
                	</aside>

                	<section id="products_box">

                        <form action="" method="post" enctype="multipart/form-data">
                            
                            <table align="center" width="700" bgcolor="purple" >
                                <thead>
                                    <tr>
                                        <th><img src="images/logo2.png"></th>
                                        <th  colspan="3"><h2>update your cart and check out</h2></th>
                                    </tr>
                                    <tr align="center">
                                        <th>Remove</th>
                                        <th>Product(s)</th>
                                       <th>Quantity</th> 
                                        <th>Total Price</th>
                                    </tr>

                                    <?php
                                        $total = 0;

                                        global $con;

                                        $ip = getIp();

                                        $sel_price = "select * from cart where ip_id='$ip'";

                                        $run_price = mysqli_query($con, $sel_price);

                                        while ($p_price = mysqli_fetch_array($run_price)) {

                                            $pro_id = $p_price['p_id'];

                                            $pro_price = "select * from products where product_id='$pro_id'";

                                            $run_pro_price = mysqli_query($con, $pro_price);

                                            while ($pp_price = mysqli_fetch_array($run_pro_price)) {

                                                $product_price = array($pp_price['product_price']);

                                                $product_title = $pp_price['product_title'];

                                                $product_image = $pp_price['product_image'];

                                                $single_price = $pp_price['product_price'];

                                                $values = array_sum($product_price);

                                                $total += $values;
                                    ?>
                                </thead>
                                <tbody>
                                    <tr align="center">
                                        <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"></td>
                                        <td><?php echo $product_title; ?>
                                            <br>
                                            <img src="admin_area/product_images/<?php echo $product_image;?> " width="60" height="60">
                                        </td>
                                     <td><input type="text" name="qty" size="4" value="<?php echo $_SESSION['qty'] ?>"/></td>

                                        <?php

                                         global $con;

                                        $ip = getIp();

                                        if (isset($_POST['update_cart'])) {
                                            
                                            $qty = $_POST['qty'];

                                            $update_qty = "update cart set qty='$qty'";

                                            $run_qty = mysqli_query($con, $update_qty);

                                            $_SESSION['qty'] = $qty;

                                            $total = $total * $qty;
                                        }





                                        ?>

                                        <td><?php echo "₦ " . $single_price; ?></td>
                                    </tr>
                                </tbody>

                                <?php } } ?>

                                <tfoot>
                                    <tr align="right">
                                        <td colspan="4"><b>Sub Total: </b></td>
                                        <td colspan="4"><?php echo "₦" .  $total;?></td>
                                    </tr>

                                    <tr align="center">
                                        <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"></td>

                                        <td><input type="submit" name="continue" value="Continue Shopping"></td>

                                        <td><button><a href="checkout.php" style="text-decoration: none;">checkout</a></button></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </form>

                        <?php

                       function updatecart(){   

                        global $con;

                        $ip = getIp();

                            if (isset($_POST['update_cart'])) {
                                
                                foreach ($_POST['remove'] as $remove_id) {
                                    
                                    $delete_product = "delete from cart where p_id='$remove_id'AND ip_id='$ip'";

                                    $run_delete = mysqli_query($con, $delete_product);

                                if ($run_delete) {
                                        
                                        echo "<script>window.open('cart.php','_self')</script>";
                                    }    
                                }
                            }

                            echo @$up_cart = updatecart();

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