<!DOCTYPE html>

<?php
session_start();

include("functions/functions.php");


?>
<html>
<head>
    <link rel="icon" type="image" href="images/logo_r.png">
    <meta charset="utf-8">
    <title>Welcome to OurParti</title>
     <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

      <!-- Libraries CSS Files -->
      <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
      <link href="lib/animate/animate.min.css" rel="stylesheet">
      <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
      <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="styles/style.css?v=<?php echo time(); ?>">
    <script src="scripts/main.js"></script>
   

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <!--MAINBAR STARTS HERE-->
    <main class="main_wrapper">
        <!--HEADER starts HERE-->
        <section class="header_wrapper">            
            <section class="menubar">
                <?php cart(); ?>

                    <aside id="shopping_cart">
                        <span style=" font-size: 0.9em; line-height:4em; padding:1.2em; text-transform: uppercase;">
                            <?php

                            if (isset($_SESSION['customer_email'])) {
                                
                                echo "<b>Welcome:</b>" . $_SESSION['customer_email'] ;
                            }
                            else{
                                echo "<b>Welcome Guest:</b>";
                            }
                            ?>

                        Total Item: <?php total_items() ?>  Total Prices:<?php total_price(); ?>  <button>
                            <a href="cart.php" style="text-decoration: none; color: #3f7d55; padding: 1em 0;">See Selections</a>
                        </button>
                        
                         <?php


                             if (!isset($_SESSION['customer_email'])) {
                            
                            echo "<button><a href='checkout.php' style='text-decoration: none; color: orange; ' >LogIn</a></button>";
                        }
                        else{
                            echo "<button><a href='logout.php' style='text-decoration: none; color: orange;'>Log Out</a></button>";
                        }

                    ?>
                    </span>
                        
                    </aside>
                    <header id="top" >
                <nav class="navbar navbar-inverse navbar-fixed-top cbp-af-header">
                        <div class="container-fluid">
                          <!-- Brand and toggle get grouped for better mobile display -->
                          <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                              <span class="sr-only">Toggle navigation</span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                              <span class="icon-bar"></span>
                            </button>
                            
                          </div>
                      
                          <!-- Collect the nav links, forms, and other content for toggling -->
                          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            
                           
                            <ul class="nav navbar-nav navbar-right">
                              <li><a href="index.php">home</a></li>
                              <li><a href="#">view all</a></li>
                              <li><a href="#">contact us</a></li>
                              <li><a href="cart.php">cart</a></li>
                              <li><a href="#">sign up</a></li>
                              
                            </ul>
                          </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                      </nav>
        </header>

                    
                    
            </section>
        </section>
        <!--HEADER ENDS HERE-->
        <section class="slide">
             <img src="images/logo_r.png" alt="logo">
              
            <section id="form">
                        <form method="get" action="result.php" enctype="multipart/form-data" class="form-wrap mt-4">
                            <input type="text" name="user_query" placeholder="search for services" size="70" >
                            <input type="submit" name="search" value="Search" >
                        </form>
            </section>
        </section>
        <section class="content_wrapper">

                <section id="sidebar">
                    <h2 id="sidebar_title">Services</h2>
                    <aside>
                            <ul id="cats">
                            	<?php getCats(); ?>    
                            </ul> 
                           
                            <h2 id="sidebar_title">Goods</h2>
                             <ul id="cats">      
                                <?php getBrands(); ?>

                                </ul>
                    </aside>
                </section>
                <aside>
                    
                    <section id="content_area"  style="margin-bottom: 20px;">
                        <section id="products_box" style=" padding-bottom: 20px;">
                           <hr> 
                            <?php getPro();?>
                            <?php getCatPro(); ?>
                            <?php getBrandPro(); ?>
                        </section>

                </section>
        
                </aside>
                <aside>
                <hr>
                    <section id="content_area" style="margin-top: 45px; margin-bottom: 20px;">
                        <section id="products_box">
                            <hr>
                            <?php getPro();?>
                            <?php getCatPro(); ?>
                            <?php getBrandPro(); ?>
                        </section>

                    </section>


                </aside>

        </section>

        <section style="text-align: center;"><button>view all</button></section>
        


        <section id="footer" style="margin: auto; width: 100vw;">
        	<footer id="footer" style=" width: 100vw;">
    <div class="footer-top">
      <div class="container-fluid">
        <div class="row" >

          <div class="col-lg-3 col-md-6 footer-info">
            <p>OUR PATI is an e-commerce websiter structured to provide solutions for you in all your activities: parties, occassions etc. </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Home</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Services</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              Lekki Lagos State.<br>
              Nigeria <br>
              <strong>Phone:</strong> +234 706 596 4538 <br>
              <strong>Email:</strong> info@ourpati.com<br>
            </p>

            <div class="social-links">
                <h4>we are on social media</h4>
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <!--===========
            <h4>Our Newsletter</h4>
            <p>EMBTEC KONZULTZ is committed to serving our clients through the provision of high quality professional services that address their business needs </p>
            ==========-->
            <form action="" method="post">
              <input type="email" name="email"><input type="submit"  value="Subscribe">
            </form>
          </div>

        </div>
      </div>
      <div class="copyright">
        &copy; Copyright <strong>ourpati</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        Designed by <a href="https://www.facebook.com/enemuo" target="_blank">Embtec Team</a>
      </div>
    </div>

    
      
   
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>
        </section>

    </main>
     <!--MAINBAR ENDS HERE-->
</body>
</html>