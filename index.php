<?php
session_start();
$_SESSION['prev_page'] = $_SERVER['PHP_SELF'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Askbootstrap">
   <meta name="author" content="Askbootstrap">
   <title>Raza Products - Home</title>
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

   <section class="carousel-slider-main text-center border-top border-bottom bg-white">
      <div class="owl-carousel owl-carousel-slider">
         <div class="item">
            <a href="shop.html"><img class="img-fluid" src="img/slider/slider1.png" alt="First slide"></a>
         </div>
         <div class="item">
            <a href="shop.html"><img class="img-fluid" src="img/slider/slider2.jpg" alt="First slide"></a>
         </div>
         <div class="item">
            <a href="shop.html"><img class="img-fluid" src="img/slider/slider1.png" alt="First slide"></a>
         </div>
         <div class="item">
            <a href="shop.html"><img class="img-fluid" src="img/slider/slider2.jpg" alt="First slide"></a>
         </div>
      </div>
   </section>

   <?php
   include "includes/connect.php";
   $sql = "SELECT DISTINCT category FROM products";
   $result = mysqli_query($conn, $sql);
   if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
         $sql2 = "SELECT * FROM categories WHERE cat_id = {$row['category']}";
         $result2 = mysqli_query($conn, $sql2);
         $row2 = mysqli_fetch_assoc($result2);
   ?>
         <section class="product-items-slider section-padding">
            <div class="container">
               <div class="section-header">
                  <h5 class="heading-design-h5">Top <?php echo $row2['cat_name'] ?> Products</span>

                     <a class="float-right text-secondary" href="shop.html">View All</a>
                  </h5>
               </div>
               <div class="owl-carousel owl-carousel-featured">
                  <?php
                  $sql3 = "SELECT * FROM products WHERE category = {$row2['cat_id']}";
                  $result3 = mysqli_query($conn, $sql3);
                  if (mysqli_num_rows($result3) > 0) {
                     while ($row3 = mysqli_fetch_assoc($result3)) {
                  ?>
                        <div class="item">
                           <div class="product">
                              <a href="product-details.php?product_id=<?php echo $row3['product_id'] ?>">
                                 <div class="product-header">
                                    <?php
                                    echo $row3['discount'] > 0 ? '<span class="badge badge-success">' . (floor(($row3['discount'] * 100) / $row3['price'])) . '% OFF</span>' : ''
                                    ?>
                                    <img class="img-fluid" src="dashboard/upload/<?php echo $row3['img_url'] ?>" alt="product image">
                                    <span class="veg text-success mdi mdi-circle"></span>
                                 </div>
                                 <div class="product-body">
                                    <h5 class="mb-3"><?php echo strlen($row3['name']) > 19 ? substr($row3['name'], 0, 22) . "...." : $row3['name'] ?></h5>
                                 </div>
                                 <div class="product-footer">
                                    <form action="" method="post">
                                       <input type="hidden" name="product_id" value="<?php echo $row3['product_id'] ?>">
                                       <button type="submit" class="btn btn-secondary btn-sm float-right" name="addToCart"><i class="mdi mdi-cart-outline"></i> Add To Cart</button>
                                    </form>
                                    <p class="offer-price mb-0">₹<?php echo ($row3['price'] - $row3['discount']) ?><?php echo $row3['unit'] == 'weight' ? '/KG' : '' ?> <?php echo $row3['discount'] > 0 ? '<br><span class="regular-price">₹' . $row3['price'] . '</span>' : '<br>&nbsp;' ?> </p>
                                 </div>
                              </a>
                           </div>
                        </div>
                  <?php
                     }
                  }
                  ?>
               </div>
            </div>
         </section>
         <!-- add to cart action start -->
         <?php
         if (isset($_POST['addToCart'])) {
            if (isset($_SESSION['user_id'])) {
               $product_id = $_POST['product_id'];
               $user_id = $_SESSION['user_id'];
               $sql4 = "SELECT * FROM cart WHERE product_id = {$product_id} AND user_id={$user_id}";
               $result4 = mysqli_query($conn, $sql4);
               if (mysqli_num_rows($result4) > 0) {
                  $sql5 = "UPDATE cart SET qty = qty+1 WHERE user_id={$user_id} AND product_id = {$product_id}";
                  if (mysqli_query($conn, $sql5)) {
                     alertPopup('Product added to cart 😊!');
                  }
               } else {
                  $sql6 = "INSERT INTO cart(user_id, product_id, qty) VALUES({$user_id}, {$product_id}, 1)";
                  if (mysqli_query($conn, $sql6)) {
                     alertPopup('Product added to cart 😊!');
                  }
               }
            } else {
               echo "<script>
            window.location.href = '{$host}/login.php';
            </script>";
            }
         }
         ?>
         <!-- add to cart action end -->

         <section class="offer-product">
            <div class="container">
               <div class="row no-gutters">
                  <div class="col-md-6">
                     <a href="#"><img class="img-fluid" src="img/ad/1.jpg" alt=""></a>
                  </div>
                  <div class="col-md-6">
                     <a href="#"><img class="img-fluid" src="img/ad/2.jpg" alt=""></a>
                  </div>
               </div>
            </div>
         </section>

   <?php
      }
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
   <!-- Footer start-->
   <?php
   include 'footer.php';
   ?>
   <!-- Footer end -->
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
   <script data-cfasync="false" src="other/email-decode.min.js"></script>
   <script src="vendor/jquery/jquery.min.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
   <script src="vendor/bootstrap/js/bootstrap.bundle.min.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
   <!-- select2 Js -->
   <script src="vendor/select2/js/select2.min.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
   <!-- Owl Carousel -->
   <script src="vendor/owl-carousel/owl.carousel.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
   <!-- Custom -->
   <script src="js/custom.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
   <script src="other/rocket-loader.min.js" data-cf-settings="c3d65250493e38dddb45a56a-|49" defer></script>
   <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8fb213a22adee1ed","version":"2024.10.5","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"dd471ab1978346bbb991feaa79e6ce5c","b":1}' crossorigin="anonymous"></script>
</body>

</html>