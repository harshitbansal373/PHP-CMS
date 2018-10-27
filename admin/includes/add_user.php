
<?php
if(isset($_POST['create_user'])){
    $user_firstname = $_POST['firstname'];
    $user_lastname = $_POST['lastname'];
    $user_role = $_POST['user_role'];
    $username = $_POST['username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
 

    // $post_image = $_FILES['post_image']['name'];
    // $post_temp_image = $_FILES['post_image']['tmp_name'];
    
    // $location = "../images/$post_image";
    // move_uploaded_file($post_temp_image,$location);

    $query = "INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password) ";
    $query .= "VALUES( '{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}' )";

    $create_user_query = mysqli_query($connection,$query);

    confirm_query($create_user_query);

    header("location:users.php");


}

?>




<form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="firstname">Firstname</label>
            <input type="text" class="form-control" name="firstname" >
        </div>
        
        <div class="form-group">
            <label for="lastname">Lastname</label>
            <input type="text" class="form-control" name="lastname" >
        </div>

        <div class="form-group">
            <label for="user_role">Role</label><br>
            <select name="user_role" id="">    
            <option value="">select option</option>
            <option value="admin">Admin</option>
            <option value="subscriber">Subscriber</option>
            </select>
        </div>

        <div class="form-group">
            <label for="username">username</label>
            <input type="text" class="form-control" name="username" >
        </div>
        <div class="form-group">
            <label for="user_email">Email</label>
            <input type="email" class="form-control" name="user_email" >
        </div>
        <!-- <div class="form-group">
            <label for="post_image">Post Image</label>
            <input type="file" class="form-control-file" name="post_image">
        </div> -->
        <div class="form-group">
            <label for="user_password">Password</label>
            <input type="password" class="form-control" name="user_password" >
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary " name="create_user" value="Add user" >
        </div>
    </form>
