<section class="section-padding footer bg-white border-top">
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-3">
                  <h4 class="mb-2 mt-0"><a class="logo" href="/"><img src="http://localhost/imran/img/logo-footer.jpg" alt="Groci" style="height:38px; width:auto;"></a></h4>
                  <p class="mb-2">Raza Products offers premium tea, rich dry fruits, and delicious khajoor, ensuring quality and authentic flavors.</p>
                  <p class="mb-0"><a class="text-dark" href="tel: +91 9113734693"><i class="mdi mdi-phone"></i>+91 91137 34693 </a></p>
                  <p class="mb-0"><a class="text-success" href="mailto: therazaproducts@gmail.com"><i class="mdi mdi-email"></i>therazaproducts@gmail.com</a></p>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h6 class="mb-4">QUICK LINKS </h6>
                  <ul>
                  <li><a href="/about.php">About US</a></li>
                  <li><a href="/contact.php">Contact</a></li>
                  <li><a href="/faq.php">FAQ</a></li>
                  <li><a href="/terms-conditions.php">Terms & Conditions</a></li>
                  <li><a href="/privacy-policy">Privacy Policy</a></li>
                  <ul>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h6 class="mb-4">CATEGORIES</h6>
                  <ul>
                  <?php
                  include "includes/connect.php";
                  $sql = "SELECT * FROM categories LEFT JOIN products ON categories.cat_id = products.category LIMIT 5";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                     while ($row = mysqli_fetch_assoc($result)) {
                        if(!empty($row['category'])){
                  ?>
                        <li><a href="/product-category.php?cat_id=<?php echo $row['cat_id'] ?>"><?php echo $row['cat_name'] ?></a></li>
                  <?php
                  }
                     }
                  }
                  ?>
                  <ul>
               </div>
               <div class="col-lg-2 col-md-2">
                  <h6 class="mb-4">Blogs</h6>
                  <ul>
                  <?php
                  include "includes/connect.php";
                  $sql2 = "SELECT * FROM blogs LIMIT 5";
                  $result2 = mysqli_query($conn, $sql2);
                  if (mysqli_num_rows($result2) > 0) {
                     while ($row2 = mysqli_fetch_assoc($result2)) {
                     echo '<li><a href="#">'.$row2['blog_title'].'</a></li>';   
                     }
                  } 
                  ?>
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