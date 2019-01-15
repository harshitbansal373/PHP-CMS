<?php  include "includes/header.php"; ?>

<!-- Navigation -->
<?php  include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">
    <section id="login">
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
                	        <input type="submit" name="login" id="btn-login" class="btn btn-secondary btn-lg btn-block" value="Login">
							<div class="form-group">
      						<a href="forgot.php?forgot=<?php echo uniqid(true); ?>"> Forgot Password?</a>
      						</div>
                	    </form>
                </div>
    	    </div> <!-- /.col-sm-4 -->
    	</div> <!-- /.row -->
    </section>

    <hr>

<?php include "includes/footer.php";?>

</div> <!-- /.container -->
