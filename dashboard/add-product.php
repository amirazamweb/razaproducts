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
   <title>Add Product - Dashboard</title>
   <!-- Favicon Icon -->
   <link rel="icon" type="image/png" href="../img/favicon.png">
   <!-- Bootstrap core CSS -->
   <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <!-- Material Design Icons -->
   <link href="../vendor/icons/css/materialdesignicons.min.css" media="all" rel="stylesheet" type="text/css" />
   <!-- Select2 CSS -->
   <link href="../vendor/select2/css/select2-bootstrap.css" />
   <link href="../vendor/select2/css/select2.min.css" rel="stylesheet" />
   <!-- Custom styles for this template -->
   <link href="../css/osahan.css" rel="stylesheet">
   <!-- Owl Carousel -->
   <link rel="stylesheet" href="../vendor/owl-carousel/owl.carousel.css">
   <link rel="stylesheet" href="../vendor/owl-carousel/owl.theme.css">
</head>

<body>
   <?php
   include '../header.php';
   ?>
   <section class="account-page section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-9 mx-auto">
               <div class="row no-gutters">

                  <?php include 'admin-sidebar.php'; ?>

                  <div class="col-md-8">
                     <div class="card card-body account-right">
                        <div class="widget">
                           <div class="section-header">
                              <h5 class="heading-design-h5">
                                 Add Product
                              </h5>
                           </div>
                           <form method="POST" enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']; ?>">
                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="control-label">Name <span class="required">*</span></label>
                                       <input class="form-control border-form-control" value="" placeholder="enter product name" type="text" name="product_name" required />
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="control-label">Category <span class="required">*</span></label>
                                       <select name="product_category" id="" class="form-control border-form-control" required>
                                          <option value="" selected disabled>Select Category</option>
                                          <?php
                                          include '../includes/connect.php';
                                          $sql = "SELECT * FROM categories";
                                          $result = mysqli_query($conn, $sql);
                                          if (mysqli_num_rows($result) > 0) {
                                             while ($row = mysqli_fetch_assoc($result)) {
                                                echo "<option value='" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";
                                             }
                                          }
                                          ?>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="control-label">Price(₹) <span class="required">*</span></label>
                                       <input class="form-control border-form-control" value="" placeholder="enter price" type="number" name="product_price" required>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="control-label">Discount(₹)</label>
                                       <input class="form-control border-form-control " value="" placeholder="enter discount" type="number" name="product_discount">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="control-label">Stock <span class="required">*</span></label>
                                       <select name="product_stock" id="" class="form-control border-form-control" required>
                                          <option value="1" selected>Yes</option>
                                          <option value="0">No</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-sm-6">
                                    <div class="form-group">
                                       <label class="control-label">Unit <span class="required">*</span></label>
                                       <select name="product_unit" id="" class="form-control border-form-control" required>
                                          <option value="" selected disabled>Select Unit</option>
                                          <option value="weight">Weight</option>
                                          <option value="number">Number</option>
                                       </select>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                       <label class="control-label">Description <span class="required">*</span></label>
                                       <textarea class="form-control border-form-control" name="product_description" placeholder="enter product desc" required></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <div class="form-group">
                                       <label class="control-label">Product Image <span class="required">*</span></label>
                                       <br>
                                       <input type="file" required name="product_img">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <input type="submit" value="Save Product" class="btn btn-success" name="add-product" required>
                                 </div>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
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
               <p class="mb-0"><a class="text-success" href="#"><i class="mdi mdi-email"></i> <span class="__cf_email__" data-cfemail="86efe7ebe9f5e7eee7e8c6e1ebe7efeaa8e5e9eb">[email&#160;protected]</span></a></p>
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

   <?php
   if (isset($_POST['add-product'])) {
      include '../includes/connect.php';

      if (isset($_FILES['product_img'])) {
         $errors = [];
         $file_name = $_FILES['product_img']['name'];
         $file_type = $_FILES['product_img']['type'];
         $file_tmp = $_FILES['product_img']['tmp_name'];
         $file_size = $_FILES['product_img']['size'];
         $expl = explode('.', $file_name);
         $ext_end = (end($expl));
         $file_ext = strtolower($ext_end);
         $extensions = ['jpeg', 'jpg', 'png'];

         if (in_array($file_ext, $extensions) == false) {
            $errors[] = "This extension file not allowed. Plesae choose a JPG or PNG file.";
            alertPopup('Plesae choose a JPG or PNG image 😞!');
            die();
         }

         if ($file_size > 2097152) {
            $errors[] = "File size is more than 2 MB.";
            alertPopup('Please select file size less than 2 MB 😞!');
            die();
         }

         if (empty($errors)) {

            $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
            $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
            $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
            $product_discount = mysqli_real_escape_string($conn, $_POST['product_discount']);
            $product_stock = mysqli_real_escape_string($conn, $_POST['product_stock']);
            $product_unit = mysqli_real_escape_string($conn, $_POST['product_unit']);
            $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);

            $sql2 = "SELECT * FROM products WHERE name = '{$product_name}'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
               alertPopup('Product already added 😞!');
            } else {
               $sql3 = "INSERT INTO products(name, description, category, price, discount, stock, img_url, unit) VALUES ('{$product_name}', '{$product_description}', '{$product_category}', '{$product_price}', '{$product_discount}', '{$product_stock}', '{$file_name}', '{$product_unit}')";
               if (mysqli_query($conn, $sql3)) {
                  echo "<script>
                        setTimeout(()=>{
                        window.location.href = '{$host}/dashboard/products.php';
                         }, 1000)
                        </script>";

                  move_uploaded_file($file_tmp, "upload/" . $file_name);
                  alertPopup('Product added successfully 😊!');
               }
            }
         }
      }

      mysqli_close($conn);
   }
   ?>

   <!-- Bootstrap core JavaScript -->
   <script data-cfasync="false" src="../other/email-decode.min.js"></script>
   <script src="../vendor/jquery/jquery.min.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
   <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
   <!-- select2 Js -->
   <script src="../vendor/select2/js/select2.min.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
   <!-- Owl Carousel -->
   <script src="../vendor/owl-carousel/owl.carousel.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
   <!-- Custom -->
   <script src="../js/custom.js" type="c3d65250493e38dddb45a56a-text/javascript"></script>
   <script src="../other/rocket-loader.min.js" data-cf-settings="c3d65250493e38dddb45a56a-|49" defer></script>
   <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"8fb213a22adee1ed","version":"2024.10.5","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"dd471ab1978346bbb991feaa79e6ce5c","b":1}' crossorigin="anonymous"></script>
</body>

</html>