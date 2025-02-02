<div class="card sidebar-card mb-4">
    <div class="card-body">
        <form action="" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <div class="input-group">
                <input type="text" placeholder="Search For" class="form-control" name="search_val" required>
                <div class="input-group-append">
                    <input type="submit" class="btn btn-secondary" value="Search" name="search-blog" required>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card sidebar-card mb-4">
    <div class="card-body">
        <h5 class="card-title mb-4">Popular Posts</h5>
        <?php
        include "includes/connect.php";
        $sql = "SELECT * FROM blogs ORDER BY blog_id DESC LIMIT 4";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>
                <a href="blog-detail.php?blog_id=<?php echo $row['blog_id'] ?>">
                    <h6><?php echo $row['blog_title'] ?></h6>
                </a>
                <p class="mb-0"><i class="mdi mdi-calendar-text"></i> <?php echo $row['blog_date'] ?></p>
                <hr>
        <?php
            }
        }
        ?>
    </div>
</div>

<?php
if (isset($_POST['search-blog'])){
    $search_val = mysqli_real_escape_string($conn, $_POST['search_val']);
echo '<script>
         window.location.href = "'.$host.'/search-blog.php?search='.$search_val.'";
         </script>';
    }
?>