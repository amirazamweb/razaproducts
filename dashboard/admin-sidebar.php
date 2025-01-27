
<?php
  $full_path_filename = $_SERVER['PHP_SELF'];
  $full_path = basename($full_path_filename);
  $filename = explode(".", $full_path);
  $current_page = $filename[0];

  if($current_page=="my-profile"){
    $temp ="profile";
  }
  if($current_page=="category"){
    $temp = "category";
  }
  if($current_page=="add-category"){
    $temp = "category";
  }
  if($current_page=="update-category"){
    $temp = "category";
  }
  if($current_page=="products"){
    $temp = "product";
  }
  if($current_page=="add-product"){
    $temp = "product";
  }
  if($current_page=="update-product"){
    $temp = "product";
  } 
  if($current_page=="users"){
    $temp = "user";
  }

  if($current_page=="update-user"){
    $temp = "user";
  }
  
?>

<div class="col-md-4">
    <div class="card account-left">
        <?php
        include '../includes/connect.php';
        $user_id = $_SESSION['user_id'];
        $sql = "SELECT name, phone, role FROM users WHERE user_id = '{$user_id}'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result)>0){
        ?>
        <div class="user-profile-header">
        <div class="mb-2"><span class="mdi mdi-account-circle" style="font-size: 60px;"></span></div>
            <h5 class="mb-1 text-secondary"><strong>Hi </strong> <?php
            $name = $row['name'];
            $position = strpos($name, ' ');
            if($position!=false){
                $sub_name = substr($name, 0, $position);
                echo $sub_name;
            }
            else{
                echo $row['name'];
            }
            ?> </h5>
            <p style="margin-bottom: 0;"> +91 <?php echo $row['phone'];?></p>
        </div>

        <?php } 
        mysqli_close($conn);
        ?>
        <div class="list-group">

            <a href="my-profile.php" class="list-group-item list-group-item-action <?php echo $temp=='profile'?'active':'' ?>"><i aria-hidden="true" class="mdi mdi-account-outline"></i> My Profile</a>

            <a href="category.php" class="list-group-item list-group-item-action <?php echo $temp=='category'?'active':'' ?>"><i aria-hidden="true" class="mdi mdi-food-apple"></i> Category List</a>

            <a href="products.php" class="list-group-item list-group-item-action <?php echo $temp=='product'?'active':'' ?>"><i aria-hidden="true" class="mdi mdi-food-fork-drink"></i> Product List </a>

            <a href="users.php" class="list-group-item list-group-item-action <?php echo $temp=='user'?'active':'' ?>"><i aria-hidden="true" class="mdi mdi-human-male-female"></i> User List</a>

            <a href="logout.php" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-lock"></i> Logout</a>
        </div>
    </div>
</div>

