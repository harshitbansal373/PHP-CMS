<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php  include "admin/functions.php"; ?>

<!-- Navigation -->
<?php  include "includes/navigation.php"; ?>

<?php 

    if(!isset($_GET['email']) && !isset($_GET['token'])){
        redirect('index.php');
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

