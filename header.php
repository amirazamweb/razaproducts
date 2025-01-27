<?php
$full_path_filename = $_SERVER['PHP_SELF'];
$full_path = basename($full_path_filename);
$filename = explode(".", $full_path);
$current_page = $filename[0];

if ($current_page == "index") {
   $temp = "index";
}
if ($current_page == "about") {
   $temp = "about";
}
if ($current_page == "product-category") {
   $temp = "category";
}
if ($current_page == "cart") {
   $temp = "cart";
}
if ($current_page == "blogs") {
   $temp = "blogs";
}
if ($current_page == "faq") {
   $temp = "faq";
}
if ($current_page == "contact") {
   $temp = "contact";
}

?>

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
               if (!isset($_SESSION['user_id'])) {
                  echo '<li class="list-inline-item">
                  <a href="login.php" class="btn btn-link"><i class="mdi mdi-account-circle"></i> Login/Sign Up</a>
               </li>';
               } else {

                  $name = $_SESSION['user_name'];
                  $position = strpos($name, ' ');
                  if ($position != false) {
                     $sub_name = substr($name, 0, $position);
                     $name = $sub_name;
                  }

                  echo '<li class="list-inline-item dropdown osahan-top-dropdown">
                        <a class="btn btn-theme-round dropdown-toggle dropdown-toggle-top-user" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img alt="logo" src="http://localhost/imran/img/user/profile-icon.jpg"><strong>Hi</strong> ' . $name . '
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
               <a class="nav-link shop" href="/"><span class="mdi mdi-store"></span> Super Store</a>
            </li>
            <li class="nav-item <?php echo $temp=='index'?'active2':'' ?>">
               <a href="/" class="nav-link">Home</a>
            </li>
            <li class="nav-item <?php echo $temp=='about'?'active2':'' ?>">
               <a href="/about.php" class="nav-link">About Us</a>
            </li>
            <li class="nav-item dropdown <?php echo $temp=='category'?'active2':'' ?>">
               <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Category
               </a>
               <div class="dropdown-menu">
                  <?php
                  include "includes/connect.php";
                  $sql = "SELECT * FROM categories";
                  $result = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($result) > 0) {
                     while ($row = mysqli_fetch_assoc($result)) {
                  ?>
                        <a class="dropdown-item" href="shop.html"><i class="mdi mdi-chevron-right" aria-hidden="true"></i><?php echo $row['cat_name'] ?></a>
                  <?php
                     }
                  }
                  ?>
               </div>
            </li>
            <li class="nav-item <?php echo $temp=='cart'?'active2':'' ?>">
               <a href="/cart.php" class="nav-link">Cart</a>
            </li>
            <li class="nav-item <?php echo $temp=='blogs'?'active2':'' ?>">
               <a href="/blogs.php" class="nav-link">Blogs</a>
            </li>
            <li class="nav-item <?php echo $temp=='faq'?'active2':'' ?>">
               <a href="/faq.php" class="nav-link">FAQ</a>
            </li>
            <li class="nav-item <?php echo $temp=='contact'?'active2':'' ?>">
               <a href="/contact.php" class="nav-link">Contact</a>
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