<?php  include "includes/header.php"; ?>

<?php 

    if(!isset($_GET['email']) && !isset($_GET['token'])){
        redirect('index.php');
    }

    // $email = 'harshitbansal373@gmail.com';
    // $token = '77020c98efbc545715012c76bec5aaec6e8a2cfced12d25f1c2f2626a1ef4af2271b1e458848d80a745e6b578b954cf34427';

    if($stmt = mysqli_prepare($connection, 'SELECT  username,user_email, token FROM users WHERE token=?')){
        mysqli_stmt_bind_param($stmt, "s",$_GET['token']);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt,$username,$user_email,$token);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // if($_GET['token']!==$token || $_GET['email']!==$email){
        //     redirect('index.php');
        // }

        if(isset($_POST['password']) && isset($_POST['confirmpassword'])){
            
            if($_POST['password']==$_POST['confirmpassword']){

                $password = $_POST['password'];
                $hashedpassword = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));
                if($stmt = mysqli_prepare($connection, "UPDATE users SET token='',user_password='{$hashedpassword}' WHERE user_email=?")){

                    mysqli_stmt_bind_param($stmt,"s",$_GET['email']);
                    mysqli_stmt_execute($stmt);

                    if(mysqli_stmt_affected_rows($stmt) >= 1){
                        redirect('login.php');
                    }

                    mysqli_stmt_close($stmt);

                }


            }else{
                echo "<h5 class='text-center'>Both Password didn't Match<br>Please enter same Password Password.</h5> ";
            }
        }
    }

?>

<!-- Page Content -->
<div class="container">

<section id="login">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-4 col-sm-offset-4 border border-dark mt-5">
                <div class="form-wrap">
                    <div class="text-center mt-3">
				        <h2>Reset Password</h2>
                        <p>You can reset your password here.</p>
    	                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
    	                        <div class="input-group mb-3">
				        		 	<div class="input-group-prepend">
 				        				<span class="input-group-text"><i class="fas fa-check"></i></span>
				        			</div>
                                    <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Enter Password" required>
				        		</div>
                                <div class="input-group mb-3">
				        		 	<div class="input-group-prepend">
 				        				<span class="input-group-text"><i class="fas fa-check-double"></i></span>
				        			</div>
                                    <label for="password" class="sr-only">Password</label>
                                <input type="password" name="confirmpassword" id="key" class="form-control" placeholder="Confirm Password" required>
				        		</div>
                                <div class="form-group">
                                <input type="submit" name="" class="btn btn-lg btn-primary btn-block" value="Reset Password">                            
                                </div>
                                <input type="hidden" class="hide" name="token" id="token" value="">
    	                    </form>

                    </div>
    	        </div>
		    </div> <!-- /.col-xs-12 -->
		</div> <!-- /.row -->
    </div> <!-- /.container -->
    </section>

    <hr>

<?php include "includes/footer.php";?>

</div> <!-- /.container -->

