
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

    <diV class="row" style="background-color:#181e22; color:white;" >
    <div class="col-sm-6">

    <?php  insert_categories(); ?>                 <!-- insertion of categories -->
<br>
    <form action="" method="POST">
        <div class="form-group">
            <label for="cat_title">Add Category</label>
            <input type="text" class="form-control" name="cat_title" >
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary " name="submit" value="add category" >
        </div>
    </form>



<hr>

<?php                           //Edit categories
if(isset($_GET['edit'])){
    $cat_id = $_GET['edit'];
    include "includes/update_category.php";
}
?>


    </div>
    

    <div class="col-sm-6 text-center">
<br>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th scope="col" >ID</th>
          <th scope="col" >Category Title</th>
          <th scope="col" >Delete</th>
          <th scope="col" >Edit</th>
        </tr>
      </thead>
      <tbody>

    <?php FindAllCAtegories(); ?>               <!-- find all categories -->     
    
    <?php DeleteCategories(); ?>                <!--delete category -->

      </tbody>
    </table>
    </div>
    </div>


  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>