<?php
session_start();
if (!isset($_SESSION['user_id'])) {
   include '../includes/connect.php';
   header("Location: {$host}/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Askbootstrap">
   <meta name="author" content="Askbootstrap">
   <title>Cart</title>
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

   <section class="pt-3 pb-3 page-info section-padding border-bottom bg-white">
      <div class="container">
         <div class="row">
            <div class="col-md-12">
               <a href="#"><strong><span class="mdi mdi-home"></span> Home</strong></a> <span class="mdi mdi-chevron-right"></span> <a href="#">Cart</a>
            </div>
         </div>
      </div>
   </section>

   <?php
   include "includes/connect.php";
   $user_id = $_SESSION['user_id'];
   $sql3 = "SELECT * FROM cart WHERE user_id = {$user_id}";
   $result3 = mysqli_query($conn, $sql3);
   if (mysqli_num_rows($result3) > 0) {

   ?>
      <section class="cart-page section-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="card card-body cart-table">
                     <div class="table-responsive">
                        <table class="table cart_summary">
                           <thead>
                              <tr>
                                 <th class="cart_product">Product</th>
                                 <th>Description</th>
                                 <th>Avail.</th>
                                 <th>Unit price</th>
                                 <th>Qty</th>
                                 <th>Total</th>
                                 <th class="action"><i class="mdi mdi-delete-forever"></i></th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              include "includes/connect.php";
                              $user_id = $_SESSION['user_id'];
                              $sql = "SELECT * FROM cart LEFT JOIN products ON cart.product_id = products.product_id WHERE user_id = {$user_id} ORDER BY cart_id DESC";
                              $result = mysqli_query($conn, $sql);
                              if (mysqli_num_rows($result) > 0) {
                                 while ($row = mysqli_fetch_assoc($result)) {
                              ?>
                                    <tr>
                                       <td class="cart_product"><img class="img-fluid" src="dashboard/upload/<?php echo $row['img_url'] ?>" alt=""></td>
                                       <td class="cart_description">
                                          <h5 class="product-name"><a href="#"><?php echo $row['name'] ?> </a></h5>
                                          <h6><strong><span class="mdi mdi-approval"></span> Available in</strong> - 500 gm</h6>
                                       </td>
                                       <?php
                                       if ($row['stock'] == 0) {
                                          echo '<td class="availability in-stock"><span class="badge bg-danger text-white">In stock</span></td>';
                                       } elseif ($row['stock'] == 1) {
                                          echo '<td class="availability in-stock"><span class="badge badge-success">In stock</span></td>';
                                       }
                                       ?>
                                       <td class="price"><span>₹<?php echo $row['price'] ?></span></td>
                                       <td class="qty">
                                          <div class="input-group">
                                             <?php
                                             if($row['qty']==1){
                                                echo '<a href="decrease-cart-count.php?cart_id='.$row['cart_id'].'" class="input-group-btn"><button disabled="disabled" class="btn btn-theme-round btn-number" type="button">-</button></a>';
                                             }
                                             else{
                                                echo '<a href="decrease-cart-count.php?cart_id='.$row['cart_id'].'" class="input-group-btn"><button class="btn btn-theme-round btn-number" type="button">-</button></a>';
                                             }
                                             ?>
                                             
                                             <span style="padding:0 10px; padding-top:3px">
                                                <?php echo $row['qty'] ?>
                                             </span>
                                             <a href="increase-cart-count.php?cart_id=<?php echo $row['cart_id'] ?>" class="input-group-btn"><button class="btn btn-theme-round btn-number" type="button">+</button>
                                             </a>
                                          </div>
                                       </td>
                                       <td class="price"><span>₹<?php echo ($row['qty'] * $row['price']) ?></span></td>
                                       <td class="action">
                                          <a class="btn btn-sm btn-danger" data-original-title="Remove" href="delete-cart.php?cart_id=<?php echo $row['cart_id'] ?>" title="" data-placement="top" data-toggle="tooltip"><i class="mdi mdi-close-circle-outline"></i></a>
                                       </td>
                                    </tr>
                              <?php
                                 }
                              }
                              ?>
                           </tbody>
                        </table>
                     </div>
                     <a href="checkout.html"><button class="btn btn-secondary btn-lg btn-block text-left" type="button"><span class="float-left"><i class="mdi mdi-cart-outline"></i> Proceed to Checkout </span><span class="float-right"><strong>₹
                                 <?php
                                 $total = 0;
                                 $sql2 = "SELECT * FROM cart LEFT JOIN products ON cart.product_id = products.product_id WHERE user_id = {$user_id} ORDER BY cart_id DESC";
                                 $result2 = mysqli_query($conn, $sql2);
                                 if (mysqli_num_rows($result2) > 0) {
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                       $total += ($row2['qty'] * $row2['price']);
                                    }
                                 }
                                 echo $total;
                                 ?>
                              </strong> <span class="mdi mdi-chevron-right"></span></span></button></a>
                  </div>

               </div>
            </div>
         </div>
      </section>

   <?php
   } else {
      echo '<div style="min-height: 40vh; text-align:center; padding-top:40px">
         <div class="container">
         <p class="text-danger" style="font-size:20px; margin-bottom:20px">Your cart is empty!</p>
         <button style="background-color:#28A745; border:none; padding:4px 0; border-radius:4px"><a href="/" style="color:#fff; padding:7px">Continue Shopping</a></button>
         </div>
      </div>';
   }
   ?>

   <section class="section-padding bg-white border-top">
      <div class="container">
         <div class="row">
            <div class="col-lg-4 col-sm-6">
               <div class="feature-box">
                  <i class="mdi mdi-truck-fast"></i>
                  <h6>Free & Next Day Delivery</h6>
                  <p>Lorem ipsum dolor sit amet, cons...</p>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6">
               <div class="feature-box">
                  <i class="mdi mdi-basket"></i>
                  <h6>100% Satisfaction Guarantee</h6>
                  <p>Rorem Ipsum Dolor sit amet, cons...</p>
               </div>
            </div>
            <div class="col-lg-4 col-sm-6">
               <div class="feature-box">
                  <i class="mdi mdi-tag-heart"></i>
                  <h6>Great Daily Deals Discount</h6>
                  <p>Sorem Ipsum Dolor sit amet, Cons...</p>
               </div>
            </div>
         </div>
      </div>
   </section>
   <!-- Footer -->
   <section class="section-padding footer bg-white border-top">
      <div class="container">
         <div class="row">
            <div class="col-lg-3 col-md-3">
               <h4 class="mb-5 mt-0"><a class="logo" href="index.html"><img src="img/logo-footer.png" alt="Groci"></a></h4>
               <p class="mb-0"><a class="text-dark" href="#"><i class="mdi mdi-phone"></i> +61 525 240 310</a></p>
               <p class="mb-0"><a class="text-dark" href="#"><i class="mdi mdi-cellphone-iphone"></i> 12345 67890, 56847-98562</a></p>
               <p class="mb-0"><a class="text-success" href="#"><i class="mdi mdi-email"></i> <span class="__cf_email__" data-cfemail="cba2aaa6a4b8aaa3aaa58baca6aaa2a7e5a8a4a6">[email&#160;protected]</span></a></p>
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
   <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
   <script src="vendor/jquery/jquery.min.js" type="91c29e9a72b814a9f440e54b-text/javascript"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="91c29e9a72b814a9f440e54b-text/javascript"></script>
   <!-- select2 Js -->
   <script src="vendor/select2/js/select2.min.js" type="91c29e9a72b814a9f440e54b-text/javascript"></script>
   <!-- Owl Carousel -->
   <script src="vendor/owl-carousel/owl.carousel.js" type="91c29e9a72b814a9f440e54b-text/javascript"></script>
   <!-- Custom -->
   <script src="js/custom.js" type="91c29e9a72b814a9f440e54b-text/javascript"></script>
   <script src="../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="91c29e9a72b814a9f440e54b-|49" defer></script>

</body>

</html>


<script src="vendor/jquery/jquery.min.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
<script src="other/rocket-loader.min.js" data-cf-settings="c3d65250493e38dddb45a56a-|49" defer></script>