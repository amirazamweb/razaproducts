<?php
session_start();

if (isset($_SESSION['user_id'])) {
    include '../includes/connect.php';
         header("Location: {$host}dashboard/my-profile.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta name="description" content="Askbootstrap">
   <meta name="author" content="Askbootstrap">
   <title>Register</title>
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
   <!-- login-signup-model end -->
   <!-- header start -->
   <?php
   include 'header.php';
   ?>
   <!-- header end -->

   <?php
if (isset($_POST['register'])) {
   include './includes/connect.php';
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $phone = mysqli_real_escape_string($conn, $_POST['phone']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpassword = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
   $petname = mysqli_real_escape_string($conn, $_POST['petname']);

   if ($password != $cpassword) {
      alertPopup('Confirm password not matched!');
   }

   else{
      $sql = "SELECT * FROM users WHERE phone = '{$phone}'";
   $result = mysqli_query($conn, $sql) or die("Query Failed");
   if (mysqli_num_rows($result) > 0) {
      echo "<script>
      setTimeout(()=>{
      window.location.href = '{$host}/login.php';
      }, 1000)
      </script>";
      alertPopup('User already registered 😞!');
   } else {
      $sql2 = "INSERT INTO users(name, phone, password, pet_name) VALUES('{$name}', '{$phone}', '{$password}', '{$petname}')";
      if (mysqli_query($conn, $sql2)) {
         echo "<script>
         setTimeout(()=>{
         window.location.href = '{$host}/login.php';
         }, 1000)
         </script>";
         alertPopup('User registered sucessfully 😊!');
      }
   }
   }
   mysqli_close($conn);
}
?>

   <div class="col-md-3 mx-auto mb-2">
      <div class="card card-body account-right">
         <div class="widget">
            <div class="section-header">
               <h5 class="heading-design-h5 text-center">
                  Register to Your Account
               </h5>
            </div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="control-label">Full Name <span class="required">*</span></label>
                        <input class="form-control border-form-control" value="" name="name" placeholder="John Doe" type="text" required>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="control-label">Phone <span class="required">*</span></label>
                        <input class="form-control border-form-control" placeholder="+91-9999999999" name="phone" type="number" onkeypress="return this.value.length<=9" required>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="control-label">Password <span class="required">*</span></label>
                        <input class="form-control border-form-control" placeholder="***********" name="password" type="password" required>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="control-label">Confirm Password <span class="required">*</span></label>
                        <input class="form-control border-form-control" placeholder="***********" name="cpassword" type="password" required>
                     </div>
                  </div>
                  <div class="col-sm-12">
                     <div class="form-group">
                        <label class="control-label">Pet Name <span class="required">*</span></label>
                        <input class="form-control border-form-control" placeholder="Johny" name="petname" type="text" required>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-sm-12 text-center">
                     <input type="submit" value="Register" name="register" class="btn btn-success btn-lg w-100" required>
                  </div>
               </div>
            </form>
            <p class="mt-2 text-dark">Already registered? <a href="login.php" style="color: #E96125;">Login</a></p>
         </div>
      </div>
   </div>

   <!-- Footer start-->
   <?php
   include 'footer.php';
   ?>
   <!-- Footer end -->
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