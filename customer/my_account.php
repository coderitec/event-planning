<!DOCTYPE html>

<?php
session_start();

include("functions/functions.php");


?>
<html>
<head>
    <link rel="icon" type="image" href="favicon.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Welcome to OurParti</title>
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
                            <li><a href="../index.php">home</a></li>
                            <li><a href="all_products.php">services</a></li>
                            <li><a href="all_products.php">goods</a></li>
                            <li><a href="#">contact us</a></li>
                            <li><a href="cart.php">cart</a></li>
                            <li><a href="#">sign up</a></li>
                        </ul>
                    </nav>
                    <section id="form">
                        <form method="get" action="result.php" enctype="multipart/form-data">
                            <input type="text" name="user_query" placeholder="search for services">
                            <input type="submit" name="search" value="Search">
                        </form>
                    </section>
            </section>
        </section>
        <!--HEADER ENDS HERE-->
        <section class="content_wrapper">

                <section id="sidebar">
                    <h2 id="sidebar_title">My Account</h2>
                    <aside>
                            <ul id="cats">
                            	<li><a href="my_account.php?my_orders">My Orders</a></li>
                                <li><a href="my_account.php?edit_account">Edit Account</a></li>
                                <li><a href="my_account.php?change_pass">Change Password</a></li>
                                <li><a href="my_account.php?delete_account">Delete Account</a></li>   
                            </ul> 
                            
                            
                    </aside>
                </section>
                <section id="content_area">

                    <?php cart(); ?>

                	<aside id="shopping_cart">
                		<span style="float: right; font-size: 0.9em; line-height: 40px; padding: 5px; text-transform: uppercase;">
                            <?php

                            if (isset($_SESSION['customer_email'])) {
                                
                                echo "<b>Welcome:</b>" . $_SESSION['customer_email'] ;
                            }
                           
                            ?>

                		
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