<?php
if(isset($_GET['u_id'])){
    $the_user_id = $_GET['u_id'];

    $query = "SELECT * FROM users WHERE user_id = {$the_user_id}";
    $select_users_by_id = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_users_by_id)){
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_role = $row['user_role'];
        $username = $row['username'];
        $user_email = $row['user_email'];
        $user_password = $row['user_password'];
    }

if(isset($_POST['update_user'])){
    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    $hashed_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12)); 
 
    $query = "UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', 
    user_role = '{$user_role}', username = '{$username}', user_email = '{$user_email}', 
    user_password = '{$hashed_password}' WHERE user_id = ?";
  
    $stmt_update_user_query = mysqli_prepare($connection,$query);
    mysqli_stmt_bind_param($stmt_update_user_query, "s", $the_user_id);
    mysqli_stmt_execute($stmt_update_user_query);
    mysqli_stmt_close($stmt_update_user_query);

    confirm_query($stmt_update_user_query);

    header("location:users.php");

}


}else{
    header("Location: index.php");
}
?>


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
            <label for="user_role">Role</label><br>
            <select name="user_role" id="">    
            <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>

            <?php
            if($user_role == 'admin'){
            echo "<option value='subscriber'>subscriber</option>";
            }else{
            echo "<option value='admin'>admin</option>";
            }
            ?>

            </select>
        </div>

        <div class="form-group">
            <label for="username">username</label>
            <input type="text" value="<?php echo $username; ?>" class="form-control" name="username" >
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
            <label for="user_password">Password</label>
            <input type="password" autocomplete="off" class="form-control" name="user_password" >
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary " name="update_user" value="Update User" >
        </div>
    </form>
