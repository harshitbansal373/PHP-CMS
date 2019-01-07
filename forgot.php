<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  include "admin/functions.php"; ?>


<?php
    
    if(empty($_GET['forgot'])){
        redirect('index.php');
    }

    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $length = 50;
        $token = bin2hex(openssl_random_pseudo_bytes($length));

        if(email_exists($email)){
            
           $stmt = mysqli_prepare($connection,"UPDATE users SET token='{$token}' WHERE user_email= ?");
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);

        }else{
            echo "email does not exist";
        }
    }

?>

<!-- Page Content -->
<div class="container">

<section id="login">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="form-wrap">
                    <div class="text-center">
				    <h3><i class="fa fa-lock fa-4x"></i></h3>
				    <h2>Forgot Password?</h2>
                    <p>You can reset your password here.</p>
    	                <form role="form" action="" method="post" id="login-form" autocomplete="off">
    	                    <div class="input-group mb-3">
				    		 	<div class="input-group-prepend">
 				    				<span class="input-group-text"><i class="far fa-envelope"></i></span>
				    			</div>
    	                        	<label for="email" class="sr-only">email</label>
                                    <input type="email" id="email" name="email" placeholder="email address" class="form-control" required>									
				    		</div>
                            <div class="form-group">
                            <input type="submit" name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password">                            
                            </div>
                            <input type="hidden" class="hide" name="token" id="token" value="">
    	                </form>
                        
                        <h2>Please check your email</h2>
                    </div>
    	        </div>
		    </div> <!-- /.col-xs-12 -->
		</div> <!-- /.row -->
    </div> <!-- /.container -->
    </section>

    <hr>

    <?php include "includes/footer.php";?>

</div> <!-- /.container -->

