<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

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
                                    <input type="email" id="email" name="email" placeholder="email address" class="form-control">									
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

