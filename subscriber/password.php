<?php include "includes/header.php" ?>

<?php
    if(isset($_POST['password']) && isset($_POST['confirmpassword'])){
            
        if($_POST['password']==$_POST['confirmpassword']){
            $password = $_POST['password'];
            $hashedpassword = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));

            if($stmt = mysqli_prepare($connection, "UPDATE users SET user_password='{$hashedpassword}' WHERE username=?")){
                mysqli_stmt_bind_param($stmt,"s",$_SESSION['username']);
                mysqli_stmt_execute($stmt);

                if(mysqli_stmt_affected_rows($stmt) >= 1){
                    redirect('../login.php');
                }

                mysqli_stmt_close($stmt);

            }
        }else{
            $msg= '<h6 class="mb-3 ml-3">Both Password are not Same<br>Please Enter Same Password Password</h6>';
        }
        
    }
?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

<!-- Sidebar -->
<?php include "includes/sidebar.php" ?>

<div id="content-wrapper">
    <div class="container-fluid">
        <!-- Page Content -->
        <h2>Change Your Password</h2>
        <hr>

        <?php
         if(isset($msg)){
             echo $msg;
         }
        ?>

        <div class="col-sm-5">
            <form action="" method="POST" enctype="multipart/form-data">
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
                <input type="submit" name="" class="btn btn-secondary" value="CHANGE PASSWORD">                            
                </div>
            </form>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>