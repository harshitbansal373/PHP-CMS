
<?php include "includes/header.php" ?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

<!-- Sidebar -->
<?php include "includes/sidebar.php" ?>

<div id="content-wrapper">

  <div class="container-fluid">
    <!-- Page Content -->
    <?php

    if(isset($_GET['source'])){
      $source = $_GET['source'];
    
    }
    else{
      $source ='';
    }

      switch($source){
        case 'add_post';
        include "includes/add_post.php" ;    
        break;
      
        case 'edit_post';
        include "includes/edit_post.php" ; 
        break;
      
        default:
        include "includes/view_all_posts.php" ;
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