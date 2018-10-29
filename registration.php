<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php
if(isset($_POST['submit'])){
$username = $_POST['username'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

    if(!empty($username) && !empty($email) && !empty($password)){
        $username = mysqli_real_escape_string($connection,$username);
        $firstname = mysqli_real_escape_string($connection,$firstname);
        $lastname = mysqli_real_escape_string($connection,$lastname);
        $email = mysqli_real_escape_string($connection,$email);
        $password = mysqli_real_escape_string($connection,$password);

        $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12)); 

        // $query = "SELECT randSalt FROM users ";
        // $select_randsalt_query = mysqli_query($connection,$query);
        // if(!$select_randsalt_query){
        //     die("QUERY FAILED" . mysqli_error($connection));
        // }

        // $row = mysqli_fetch_array($select_randsalt_query);
        // $salt = $row['randSalt'];
        // $password = crypt($password,$salt);

        $query = "INSERT INTO users (user_role,username,user_firstname,user_lastname,user_email,user_password) ";
        $query .= "VALUES( 'subscriber','{$username}','{$firstname}','{$lastname}','{$email}','{$password}' )";
        $register_user_query = mysqli_query($connection,$query);
        if(!$register_user_query){
            die("QUERY FAILED" . mysqli_error($connection) . ' ' . mysqli_errno($connection));
        }

        $message = "Your Registration has been submitted";

    }else{
        $message = "fields cannot be empty";
    }

}else{
    $message = "";
}


?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row  justify-content-center align-items-center">
            <div class="col-sm-6 col-sm-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <h6><?php echo $message; ?></h6>
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="sr-only">Firstname</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Enter Your Firstname">
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="sr-only">Lastname</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Enter Your Lastname">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
