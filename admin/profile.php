<?php include "includes/header.php" ?>

<?php
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_users_by_id = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_users_by_id)){
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
    }

}
?>

<?php
if(isset($_POST['update_user'])){
    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12)); 
 
    $query = "UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', 
            user_email = '{$user_email}', user_password = '{$user_password}' WHERE username = ? ";
  
    $stmt_update_user_query = mysqli_prepare($connection,$query);
    mysqli_stmt_bind_param($stmt_update_user_query, "s", $username);
    mysqli_stmt_execute($stmt_update_user_query);
    mysqli_stmt_close($stmt_update_user_query);

    confirm_query($stmt_update_user_query);

    header("location:index.php");

}
?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

<!-- Sidebar -->
<?php include "includes/sidebar.php" ?>

<div id="content-wrapper">

  <div class="container-fluid">
    <!-- Page Content -->
    <h2>Edit Your Personal Details</h2>
    <hr>

    <div class="col-sm-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="firstname" >
            </div>
            
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="lastname" >
            </div>
    
            <div class="form-group">
                <label for="user_email">Email</label>
                <input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email" >
            </div>
            <!-- <div class="form-group">
                <label for="post_image">Post Image</label>
                <input type="file" class="form-control-file" name="post_image">
            </div> -->
            <div class="form-group">
                <input type="submit" class="btn btn-secondary " name="update_user" value="UPDATE PROFILE" >
            </div>
        </form>
    </div>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>