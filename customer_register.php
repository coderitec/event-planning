<!DOCTYPE html>
<?php
session_start();

include("functions/functions.php");

include("includes/db.php");
?>
<html>
<head>
    <link rel="icon" type="image" href="favicon.png">
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
                		<span style="float: right; font-size: 18px; line-height: 40px; padding: 5px; text-transform: uppercase;">welcome to ourpati!
                		Total Item: <?php total_items() ?>  Total Prices:<?php total_price(); ?>  <a href="cart.php" style="text-decoration: none; color: #800080; ">See Selections</a>
                		</span>
                		
                	</aside>

                	<form action="customer_register.php" method="post" enctype="multipart/form-data">

                        <table align="center" width="750">
                            <thead>
                                <tr align="center">
                                    <th colspan="
                                    6"><h2>Create an Account</h2></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td align="right">Customer Name: </td>
                                    <td><input type="text" name="c_name" required></td>
                                </tr>
                                <tr>
                                    <td align="right">Customer Email:</td>
                                    <td><input type="email" name="c_email" required></td>
                                </tr>
                                <tr>
                                    <td align="right">Customer Password</td>
                                    <td><input type="password" name="c_pass" required></td>
                                </tr>
                                <tr>
                                    <td align="right">Customer Pic:</td>
                                    <td><input type="file" name="c_image"></td>
                                </tr>
                                <tr>
                                    <td align="right">Customer Country: </td>
                                    <td>
                                        <select name="c_country">
                                            <option>Select a Country</option>
                                            <option selected="">Nigeria</option>
                                            <option>Ghana</option>
                                            <option>Kenya</option>
                                            <option>South Africa</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right">Customer City: </td>
                                    <td><input type="text" name="c_city"></td>
                                </tr>
                                <tr>
                                    <td align="right">Customer Contact: </td>
                                    <td><input type="text" name="c_contact" required></td>
                                </tr>
                                <tr>
                                    <td align="right">Customer Address:</td>
                                    <td><textarea cols="10" rows="5" name="c_address"></textarea></td>
                                </tr>

                            </tbody>
                            <tfoot>
                                <tr align="center">
                                    <td colspan="6"><input type="submit" name="register" value="Create Account"></td>
                                </tr>
                            </tfoot>
                        </table>
                           
                    </form>
                </section>
        

        </section>


        <section id="footer">
        	<h2 style="text-align: center; padding-top: 40px;"> &copy; 2019 <a href="https://twitter.com/SincerelyFranc">franc</a></h2>
        </section>

    </main>
     <!--MAINBAR ENDS HERE-->
</body>
</html>
<?php
if (isset($_POST['register'])) {
    

    $ip =getIp();

    $c_name =$_POST['c_name'];
     $c_email =$_POST['c_email'];
      $c_pass =$_POST['c_pass'];
       $c_image =$_FILES['c_image']['name'];
        $c_image_tmp =$_FILES['c_image']['tmp_name'];
        $c_country =$_POST['c_country'];
        $c_city =$_POST['c_city'];
        $c_contact =$_POST['c_contact'];
        $c_address =$_POST['c_address'];


        move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

        $insert_c = "insert into customers(customer_ip, customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_image, customer_address) values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_image','$c_address') ";

        $run_c = mysqli_query($con, $insert_c);

        $sel_cart = "select * from cart where ip_id='$ip'";

        $run_cart = mysqli_query($con, $sel_cart);

        $check_cart = mysqli_num_rows($run_cart);

        if ($check_cart==0) {

            $_SESSION['customer_email'] = $c_email;
            
            echo "<script>alert('account have been created successfully, thanks!')</script>";

            echo "<script>window.open('customer/my_account.php','_self')</script>";
        }
        else{
            $_SESSION['customer_email'] = $c_email;
            
            echo "<script>alert('account have been created successfully, thanks!')</script>";

            echo "<script>window.open('checkout.php','_self')</script>";
        }

}


  


?>