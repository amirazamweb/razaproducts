<nav class="navbar navbar-light navbar-expand-lg bg-dark bg-faded osahan-menu">
   <div class="container-fluid">
      <a class="navbar-brand" href="index.html"> <img src="http://localhost/imran/img/logo.png" alt="logo"> </a>
      <button class="navbar-toggler navbar-toggler-white" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse" id="navbarNavDropdown">
         <div class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto top-categories-search-main">
            <div class="top-categories-search">
               <div class="input-group">
                  <input class="form-control" placeholder="Search products in Your City" aria-label="Search products in Your City" type="text">
                  <span class="input-group-btn">
                     <button class="btn btn-secondary" type="button"><i class="mdi mdi-file-find"></i> Search</button>
                  </span>
               </div>
            </div>
         </div>
         <div class="my-2 my-lg-0">
            <ul class="list-inline main-nav-right">
               <?php
               if(!isset($_SESSION['user_id'])){
                  echo '<li class="list-inline-item">
                  <a href="login.php" class="btn btn-link"><i class="mdi mdi-account-circle"></i> Login/Sign Up</a>
               </li>';
               }
               else{

               $name = $_SESSION['user_name'];
               $position = strpos($name, ' ');
            if($position!=false){
                $sub_name = substr($name, 0, $position);
                $name = $sub_name;
            }

             echo '<li class="list-inline-item dropdown osahan-top-dropdown">
                        <a class="btn btn-theme-round dropdown-toggle dropdown-toggle-top-user" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img alt="logo" src="http://localhost/imran/img/user/profile-icon.jpg"><strong>Hi</strong> '.$name.'
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-list-design">
                           <a href="my-profile.html" class="dropdown-item"><i aria-hidden="true" class="mdi mdi-account-outline"></i>  My Profile</a>
                           <a href="my-address.html" class="dropdown-item"><i aria-hidden="true" class="mdi mdi-map-marker-circle"></i>  My Address</a>
                           <a href="wishlist.html" class="dropdown-item"><i aria-hidden="true" class="mdi mdi-heart-outline"></i>  Wish List </a>
                           <a href="orderlist.html" class="dropdown-item"><i aria-hidden="true" class="mdi mdi-format-list-bulleted"></i>  Order List</a>
                           <div class="dropdown-divider"></div>
                           <a class="dropdown-item" href="#"><i class="mdi mdi-lock"></i> Logout</a>	
                        </div>
                     </li>';
               }
               ?>
               <li class="list-inline-item cart-btn">
                  <a href="#" data-toggle="offcanvas" class="btn btn-link border-none"><i class="mdi mdi-cart"></i> My Cart <small class="cart-value">5</small></a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-light osahan-menu-2 pad-none-mobile">
   <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarText">
         <ul class="navbar-nav mr-auto mt-2 mt-lg-0 margin-auto">
            <li class="nav-item">
               <a class="nav-link shop" href="index.html"><span class="mdi mdi-store"></span> Super Store</a>
            </li>
            <li class="nav-item">
               <a href="index.html" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
               <a href="about.html" class="nav-link">About Us</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="shop.html">Fruits & Vegetables</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="shop.html">Grocery & Staples</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pages
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="shop.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Shop Grid</a>
                  <a class="dropdown-item" href="single.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Single Product</a>
                  <a class="dropdown-item" href="cart.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Shopping Cart</a>
                  <a class="dropdown-item" href="checkout.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Checkout</a>
               </div>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  My Account
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="my-profile.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> My Profile</a>
                  <a class="dropdown-item" href="my-address.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> My Address</a>
                  <a class="dropdown-item" href="wishlist.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Wish List </a>
                  <a class="dropdown-item" href="orderlist.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Order List</a>
               </div>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Blog Page
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="blog.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Blog</a>
                  <a class="dropdown-item" href="blog-detail.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Blog Detail</a>
               </div>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  More Pages
               </a>
               <div class="dropdown-menu">
                  <a class="dropdown-item" href="about.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> About Us</a>
                  <a class="dropdown-item" href="contact.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> Contact Us</a>
                  <a class="dropdown-item" href="faq.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> FAQ </a>
                  <a class="dropdown-item" href="not-found.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i> 404 Error</a>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="contact.html">Contact</a>
            </li>
         </ul>
      </div>
   </div>
</nav>

<!-- popup mesaage -->

<?php
function alertPopup($val)
{
   echo '
   <div class="notify-popup">
   <div class="notify-popup-message">
   <p>localhost says</p>
   <p>' . $val . '</p>
      <button>ok</button>
   </div>
   </div>
   ';

   echo "<script>
   document.querySelector('.notify-popup-message button').addEventListener('click', () => {
      document.querySelector('.notify-popup').style.display = 'none';
   })
</script>";
}
?>

