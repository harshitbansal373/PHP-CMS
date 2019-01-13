<?php  include "includes/header.php"; ?>

<!-- Navigation -->
<?php  include "includes/navigation.php"; ?>

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
            
            if(isset($_POST['sendmail'])) { 
                $email = $_POST['email'];
                $subject = "test email";
                $message = '<p>Please click to reset Your Password
                            <a href="http://localhost/blog/reset.php?email='.$email.'&token='.$token.' ">
                                    http://localhost/blog/reset.php?email='.$email.'&token='.$token.'</a>
                            </p>';

                if(mail($email,$subject,$message)){
                    $emailsent = true;
                }else{
                    echo "failed to send mail, TRY AGAIN!!!";
                }
            }
            
        }else{
            echo '<center>Please insert correct Email Id</center>';
        }
    }

?>

<!-- Page Content -->
<div class="container">
    <section id="login">
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-4 col-sm-offset-4">
                <div class="form-wrap text-center mt-5 p-4 border border-dark">
                    
                    <?php if(!isset($emailsent)): ?>

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
                                <input type="submit" name="sendmail" class="btn btn-lg btn-secondary" value="Reset Password">                            
                                </div>
                                <input type="hidden" class="hide" name="token" id="token" value="">
    	                    </form>

                    <?php else: ?>
                        <h2>Please check your email</h2>

                    <?php endif; ?>

    	        </div>
		    </div> <!-- /.col-sm-4 -->
		</div> <!-- /.row -->
    </section>

<hr>

<?php include "includes/footer.php";?>

</div> <!-- /.container -->

