<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<!-- Navigation -->

<?php  include "includes/navigation.php"; ?>

<?php
if(isset($_POST['submit'])){
$to = "harshitbansal373@gmail.com";
$subject = $_POST['subject'];
$body = $_POST['body'];
$header = $_POST['email'];

    if(mail($to,$subject,$body,$header)){
        $msg = "Mail has been sent successfully.";
    }else{
        $msg = "Sending Failed!";
    }

}else{
    $msg = "";
}


?>

    
 
    <!-- Page Content -->
    <div class="container">
    
    <section id="login">
        <div class="container">
            <div class="row  justify-content-center align-items-center">
                <div class="col-sm-5 col-sm-offset-5">
                    <div class="form-wrap">
                    <h1 class="text-center">Contact</h1>
                        <form role="form" action="contact.php" method="post" id="login-form" autocomplete="off">
                            <h6><?php echo $msg; ?></h6>
                             <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your email">
                            </div>
                            <div class="form-group">
                                <label for="subject" class="sr-only">subject</label>
                                <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Your subject">
                            </div>
                             <div class="form-group">
                                <textarea class="form-control" name="body" id="body" cols="50" rows="6"></textarea>
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Submit">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>

    <hr>


<?php include "includes/footer.php";?>
