<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
   
<head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="Askbootstrap">
      <meta name="author" content="Askbootstrap">
      <title>Contact Us</title>
      <!-- Favicon Icon -->
      <link rel="icon" type="image/png" href="img/favicon.png">
      <!-- Bootstrap core CSS -->
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Material Design Icons -->
      <link href="vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
      <!-- Select2 CSS -->
      <link href="vendor/select2/css/select2-bootstrap.css" />
      <link href="vendor/select2/css/select2.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="css/osahan.css" rel="stylesheet">
      <!-- Owl Carousel -->
      <link rel="stylesheet" href="vendor/owl-carousel/owl.carousel.css">
      <link rel="stylesheet" href="vendor/owl-carousel/owl.theme.css">
   </head>
   <body>
      
    <!-- header start -->
    <?php
       include 'header.php';
       ?>
       <!-- header end -->

      <!-- Inner Header -->
      <section class="section-padding bg-dark inner-header">
         <div class="container">
            <div class="row">
               <div class="col-md-12 text-center">
                  <h1 class="mt-0 mb-3 text-white">Contact Us</h1>
                  <div class="breadcrumbs">
                     <p class="mb-0 text-white"><a class="text-white" href="#">Home</a>  /  <span class="text-success">Contact Us</span></p>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Inner Header -->
      <!-- Contact Us -->
      <section class="section-padding">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-md-4">
                  <h3 class="mt-1 mb-5">Get In Touch</h3>
                  <h6 class="text-dark"><i class="mdi mdi-home-map-marker"></i> Address :</h6>
                  <p>86 Petersham town, New South wales Waedll Steet, Australia PA 6550</p>
                  <h6 class="text-dark"><i class="mdi mdi-phone"></i> Phone :</h6>
                  <p>+91 12345-67890, (+91) 123 456 7890</p>
                  <h6 class="text-dark"><i class="mdi mdi-deskphone"></i> Mobile :</h6>
                  <p>(+20) 220 145 6589, +91 12345-67890</p>
                  <h6 class="text-dark"><i class="mdi mdi-email"></i> Email :</h6>
                  <p><a href="https://askbootstrap.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="b2dbd3dfddc1d3dad3dcf2d5dfd3dbde9cd1dddf">[email&#160;protected]</a>, <a href="https://askbootstrap.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c7aea9a1a887a0aaa6aeabe9a4a8aa">[email&#160;protected]</a></p>
                  <h6 class="text-dark"><i class="mdi mdi-link"></i> Website :</h6>
                  <p>www.askbootstrap.com</p>
                  <div class="footer-social"><span>Follow : </span>
                     <a href="#"><i class="mdi mdi-facebook"></i></a>
                     <a href="#"><i class="mdi mdi-twitter"></i></a>
                     <a href="#"><i class="mdi mdi-instagram"></i></a>
                     <a href="#"><i class="mdi mdi-google"></i></a>
                  </div>
               </div>
               <div class="col-lg-8 col-md-8">
                  <div class="card">
                     <div class="card-body">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d109552.19658195564!2d75.78663251672796!3d30.900473637371658!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391a837462345a7d%3A0x681102348ec60610!2sLudhiana%2C+Punjab!5e0!3m2!1sen!2sin!4v1530462134939" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Contact Us -->
      <!-- Contact Me -->
      <section class="section-padding  bg-white">
         <div class="container">
            <div class="row">
               <div class="col-lg-12 col-md-12 section-title text-left mb-4">
                  <h2>Contact Us</h2>
               </div>
               <form class="col-lg-12 col-md-12" name="sentMessage" id="contactForm" novalidate>
                  <div class="control-group form-group">
                     <div class="controls">
                        <label>Full Name <span class="text-danger">*</span></label>
                        <input type="text" placeholder="Full Name" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                        <p class="help-block"></p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="control-group form-group col-md-6">
                        <label>Phone Number <span class="text-danger">*</span></label>
                        <div class="controls">
                           <input type="tel" placeholder="Phone Number" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
                        </div>
                     </div>
                     <div class="control-group form-group col-md-6">
                        <div class="controls">
                           <label>Email Address <span class="text-danger">*</span></label>
                           <input type="email" placeholder="Email Address"  class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
                        </div>
                     </div>
                  </div>
                  <div class="control-group form-group">
                     <div class="controls">
                        <label>Message <span class="text-danger">*</span></label>
                        <textarea rows="4" cols="100" placeholder="Message"  class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
                     </div>
                  </div>
                  <div id="success"></div>
                  <!-- For success/fail messages -->
                  <button type="submit" class="btn btn-success">Send Message</button>
               </form>
            </div>
         </div>
      </section>
      <!-- End Contact Me -->
      <!-- Footer -->
      <section class="section-padding footer bg-white border-top">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3">
                  <h4 class="mb-5 mt-0"><a class="logo" href="index.html"><img src="img/logo-footer.png" alt="Groci"></a></h4>
                  <p class="mb-0"><a class="text-dark" href="#"><i class="mdi mdi-phone"></i> +61 525 240 310</a></p>
                  <p class="mb-0"><a class="text-dark" href="#"><i class="mdi mdi-cellphone-iphone"></i> 12345 67890, 56847-98562</a></p>
                  <p class="mb-0"><a class="text-success" href="#"><i class="mdi mdi-email"></i> <span class="__cf_email__" data-cfemail="a1c8c0ccced2c0c9c0cfe1c6ccc0c8cd8fc2cecc">[email&#160;protected]</span></a></p>
                  <p class="mb-0"><a class="text-primary" href="#"><i class="mdi mdi-web"></i> www.askbootstrap.com</a></p>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h6 class="mb-4">TOP CITIES </h6>
                  <ul>
                  <li><a href="#">New Delhi</a></li>
                  <li><a href="#">Bengaluru</a></li>
                  <li><a href="#">Hyderabad</a></li>
                  <li><a href="#">Kolkata</a></li>
                  <li><a href="#">Gurugram</a></li>
                  <ul>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h6 class="mb-4">CATEGORIES</h6>
                  <ul>
                  <li><a href="#">Vegetables</a></li>
                  <li><a href="#">Grocery & Staples</a></li>
                  <li><a href="#">Breakfast & Dairy</a></li>
                  <li><a href="#">Soft Drinks</a></li>
                  <li><a href="#">Biscuits & Cookies</a></li>
                  <ul>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h6 class="mb-4">ABOUT US</h6>
                  <ul>
                  <li><a href="#">Company Information</a></li>
                  <li><a href="#">Careers</a></li>
                  <li><a href="#">Store Location</a></li>
                  <li><a href="#">Affillate Program</a></li>
                  <li><a href="#">Copyright</a></li>
                  <ul>
               </div>
               <div class="col-lg-3 col-md-3">
                  <h6 class="mb-4">Download App</h6>
                  <div class="app">
                     <a href="#"><img src="img/google.png" alt=""></a>
                     <a href="#"><img src="img/apple.png" alt=""></a>
                  </div>
                  <h6 class="mb-3 mt-4">GET IN TOUCH</h6>
                  <div class="footer-social">
                     <a class="btn-facebook" href="#"><i class="mdi mdi-facebook"></i></a>
                     <a class="btn-twitter" href="#"><i class="mdi mdi-twitter"></i></a>
                     <a class="btn-instagram" href="#"><i class="mdi mdi-instagram"></i></a>
                     <a class="btn-whatsapp" href="#"><i class="mdi mdi-whatsapp"></i></a>
                     <a class="btn-messenger" href="#"><i class="mdi mdi-facebook-messenger"></i></a>
                     <a class="btn-google" href="#"><i class="mdi mdi-google"></i></a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- End Footer -->
      <!-- Copyright -->
      <section class="pt-4 pb-4 footer-bottom">
         <div class="container">
            <div class="row no-gutters">
               <div class="col-lg-6 col-sm-6">
                  <p class="mt-1 mb-0">&copy; Copyright 2020 <strong class="text-dark">Groci</strong>. All Rights Reserved<br>
				  <small class="mt-0 mb-0">Made with <i class="mdi mdi-heart text-danger"></i> by <a href="https://askbootstrap.com/" target="_blank" class="text-primary">Ask Bootstrap</a>
                  </small>
				  </p>
               </div>
               <div class="col-lg-6 col-sm-6 text-right">
                  <img alt="osahan logo" src="img/payment_methods.png">
               </div>
            </div>
         </div>
      </section>
      <!-- End Copyright -->
      <div class="cart-sidebar">
         <div class="cart-sidebar-header">
            <h5>
               My Cart <span class="text-success">(5 item)</span> <a data-toggle="offcanvas" class="float-right" href="#"><i class="mdi mdi-close"></i>
               </a>
            </h5>
         </div>
         <div class="cart-sidebar-body">
            <div class="cart-list-product">
               <a class="float-right remove-cart" href="#"><i class="mdi mdi-close"></i></a>
               <img class="img-fluid" src="img/item/11.jpg" alt="">
               <span class="badge badge-success">50% OFF</span>
               <h5><a href="#">Product Title Here</a></h5>
               <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
               <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i> <span class="regular-price">$800.99</span></p>
            </div>
            <div class="cart-list-product">
               <a class="float-right remove-cart" href="#"><i class="mdi mdi-close"></i></a>
               <img class="img-fluid" src="img/item/7.jpg" alt="">
               <span class="badge badge-success">50% OFF</span>
               <h5><a href="#">Product Title Here</a></h5>
               <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
               <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i> <span class="regular-price">$800.99</span></p>
            </div>
            <div class="cart-list-product">
               <a class="float-right remove-cart" href="#"><i class="mdi mdi-close"></i></a>
               <img class="img-fluid" src="img/item/9.jpg" alt="">
               <span class="badge badge-success">50% OFF</span>
               <h5><a href="#">Product Title Here</a></h5>
               <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
               <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i> <span class="regular-price">$800.99</span></p>
            </div>
            <div class="cart-list-product">
               <a class="float-right remove-cart" href="#"><i class="mdi mdi-close"></i></a>
               <img class="img-fluid" src="img/item/1.jpg" alt="">
               <span class="badge badge-success">50% OFF</span>
               <h5><a href="#">Product Title Here</a></h5>
               <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
               <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i> <span class="regular-price">$800.99</span></p>
            </div>
            <div class="cart-list-product">
               <a class="float-right remove-cart" href="#"><i class="mdi mdi-close"></i></a>
               <img class="img-fluid" src="img/item/2.jpg" alt="">
               <span class="badge badge-success">50% OFF</span>
               <h5><a href="#">Product Title Here</a></h5>
               <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
               <p class="offer-price mb-0">$450.99 <i class="mdi mdi-tag-outline"></i> <span class="regular-price">$800.99</span></p>
            </div>
         </div>
         <div class="cart-sidebar-footer">
            <div class="cart-store-details">
               <p>Sub Total <strong class="float-right">$900.69</strong></p>
               <p>Delivery Charges <strong class="float-right text-danger">+ $29.69</strong></p>
               <h6>Your total savings <strong class="float-right text-danger">$55 (42.31%)</strong></h6>
            </div>
            <a href="checkout.html"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Checkout </span><span class="float-right"><strong>$1200.69</strong> <span class="mdi mdi-chevron-right"></span></span></button></a>
         </div>
      </div>
      <!-- Bootstrap core JavaScript -->
      <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="vendor/jquery/jquery.min.js" type="d5e2ea083a114e6516642d3e-text/javascript"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="d5e2ea083a114e6516642d3e-text/javascript"></script>
      <!-- Contact form JavaScript -->
      <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <script src="js/jqBootstrapValidation.js" type="d5e2ea083a114e6516642d3e-text/javascript"></script>
      <script src="js/contact_me.js" type="d5e2ea083a114e6516642d3e-text/javascript"></script>
      <!-- select2 Js -->
      <script src="vendor/select2/js/select2.min.js" type="d5e2ea083a114e6516642d3e-text/javascript"></script>
      <!-- Owl Carousel -->
      <script src="vendor/owl-carousel/owl.carousel.js" type="d5e2ea083a114e6516642d3e-text/javascript"></script>
      <!-- Custom -->
      <script src="js/custom.js" type="d5e2ea083a114e6516642d3e-text/javascript"></script>
   <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="d5e2ea083a114e6516642d3e-|49" defer></script>
</body>

</html>

<script src="vendor/jquery/jquery.min.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
   <script src="other/rocket-loader.min.js" data-cf-settings="c3d65250493e38dddb45a56a-|49" defer></script>

