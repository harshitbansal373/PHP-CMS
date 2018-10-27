
<?php include "includes/header.php" ?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

<!-- Sidebar -->
<?php include "includes/sidebar.php" ?>

<div id="content-wrapper">

  <div class="container-fluid">
    <!-- Page Content -->
    <h1>Welcome To Admin 
     <small>Author</small>
    </h1>
    <hr>

<?php

if(isset($_GET['source'])){
  $source = $_GET['source'];

}
else{
  $source ='';
}

  switch($source){
    case 'add_user';
    include "includes/add_user.php" ;    
    break;

    case 'edit_user';
    include "includes/edit_user.php" ; 
    break;

    default:
    include "includes/view_all_users.php" ;
    break;
  }



?>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>