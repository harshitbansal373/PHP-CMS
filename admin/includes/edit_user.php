<?php
if(isset($_GET['u_id'])){
    $the_user_id = $_GET['u_id'];
}
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

    $query = "SELECT randSalt FROM users ";
    $select_randsalt_query = mysqli_query($connection,$query);
    if(!$select_randsalt_query){
        die("QUERY FAILED" . mysqli_error($connection));
    }

    $row = mysqli_fetch_array($select_randsalt_query);
    $salt = $row['randSalt'];
    $hashed_password = crypt($user_password, $salt);

 
    $query = "UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', 
    user_role = '{$user_role}', username = '{$username}', user_email = '{$user_email}', 
    user_password = '{$hashed_password}' WHERE user_id = {$the_user_id} ";
  
    $update_user_query = mysqli_query($connection,$query);

    confirm_query($update_user_query);

    header("location:users.php");

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
            <input type="password" value="<?php echo $user_password; ?>"class="form-control" name="user_password" >
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary " name="update_user" value="Update User" >
        </div>
    </form>
