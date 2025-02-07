<?php
session_start();

include 'includes/connect.php';
if (isset($_SESSION['user_id'])) {
    
    if(isset($_SESSION['prev_page'])){
        $url = "http://localhost".$_SESSION['prev_page'];

        echo "<script>
        window.location.href = '{$url}';
        </script>";
    }
    else{
        header("Location: {$host}");
    }

        
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Askbootstrap">
    <meta name="author" content="Askbootstrap">
    <title>Login</title>
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

    <?php
    if (isset($_POST['login'])) {
        include './includes/connect.php';
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $password = mysqli_real_escape_string($conn, md5($_POST['password']));

        $sql = "SELECT * FROM users WHERE phone = '{$phone}'";

        $result = mysqli_query($conn, $sql) or die("Query Failed");

        if (mysqli_num_rows($result) > 0) {
            $sql2 = "SELECT * FROM users WHERE phone = '{$phone}' AND password ='{$password}'";
            $result2 = mysqli_query($conn, $sql2);
            if (mysqli_num_rows($result2) > 0) {
                $row = mysqli_fetch_assoc($result2);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['role'] = $row['role'];
                alertPopup('User registered successfully 😊!');
                if(isset($_SESSION['prev_page'])){
                    $url = "http://localhost".$_SESSION['prev_page'];
            
                    echo "<script>
                    setTimeout(()=>{
                    window.location.href = '{$url}';
                    }, 1000)
                    </script>";
                }
                else{
                    echo "<script>
                    setTimeout(()=>{
                    window.location.href = '{$host}';
                    }, 1000)
                    </script>";
                }
                    
            } else {
                alertPopup('Invalide crtedentials 😞!');
            }
        } else {
            echo "<script>
         setTimeout(()=>{
         window.location.href = '{$host}/register.php';
         }, 1000)
         </script>";
            alertPopup('No user found 😞!');
        }

        mysqli_close($conn);
    }
    ?>

    <div class="col-md-3 mx-auto mb-4">
        <div class="card card-body account-right">
            <div class="widget">
                <div class="section-header">
                    <h5 class="heading-design-h5 text-center">
                        Login to Your Account
                    </h5>
                </div>
                <form method="post">
                    <div class="row">
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
                    </div>
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <input type="submit" value="Login" class="btn btn-success btn-lg w-100" name="login">
                        </div>
                    </div>
                </form>
                <div class="mt-2 text-dark">New User? <a href="register.php" style="color: #E96125;">Register</a></div>
                <div class="text-dark">Forget password? <a href="reset-password.php" style="color: #E96125;">Reset</a></div>
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