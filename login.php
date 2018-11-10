<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>


<?php

		// checkIfUserIsLoggedInAndRedirect('/cms/admin');


		// if(ifItIsMethod('post')){

		// 	if(isset($_POST['username']) && isset($_POST['password'])){

		// 		login_user($_POST['username'], $_POST['password']);


		// 	}else {


		// 		redirect('/cms/login.php');
		// 	}

		// }


?>



<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row  justify-content-center align-items-center">
                <div class="col-sm-4 col-sm-offset-4">
                    <div class="form-wrap">
					<h3 class="text-center mt-2"><i class="fas fa-user-circle fa-4x"></i></h3>
					<h2 class="text-center">Login</h2>
        	            <form role="form" action="includes/login.php" method="post" id="login-form" autocomplete="off">
        	                <div class="input-group mb-3">
							 	<div class="input-group-prepend">
     								<span class="input-group-text"><i class="far fa-user"></i></span>
								</div>
        	                    	<label for="username" class="sr-only">Username</label>
									<input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
							</div>
        	                <div class="input-group mb-3">
								<div class="input-group-prepend">
     								<span class="input-group-text"><i class="fas fa-key"></i></span>
								</div>
        	                    <label for="password" class="sr-only">password</label>
								<input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
        	                </div>

        	                <input type="submit" name="login" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Login">
        	            </form>

        	        </div>
    		    </div> <!-- /.col-xs-12 -->
    		</div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

    <hr>

<?php include "includes/footer.php";?>

</div> <!-- /.container -->
