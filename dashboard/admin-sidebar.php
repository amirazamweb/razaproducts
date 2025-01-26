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
            <a href="my-profile.php" class="list-group-item list-group-item-action active"><i aria-hidden="true" class="mdi mdi-account-outline"></i> My Profile</a>
            <a href="category.php" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-map-marker-circle"></i> Category List</a>
            <a href="products.php" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-heart-outline"></i> Product List </a>
            <a href="orderlist.html" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-format-list-bulleted"></i> Order List</a>
            <a href="logout.php" class="list-group-item list-group-item-action"><i aria-hidden="true" class="mdi mdi-lock"></i> Logout</a>
        </div>
    </div>
</div>