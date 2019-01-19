<?php include "includes/header.php" ?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

<!-- Sidebar -->
<?php include "includes/sidebar.php" ?>

<div id="content-wrapper">

    <div class="container-fluid">
        <!-- Page Content -->
        <h2 class="text-center">Manage Categories</h2>
        <hr>

        <diV class="row" style="background-color:#181e22; color:white;" >
            <div class="col-sm-3">
                <?php  insert_categories(); ?>                 <!-- insertion of categories -->
                
                <form action="" method="POST" class="mt-4">
                    <div class="form-group">
                        <label for="heading">Create Category</label>
                        <input type="text" class="form-control" name="cat_title" >
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-secondary " name="submit" value="CREATE" >
                    </div>
                </form>


                <?php                           //Edit categories
                if(isset($_GET['edit'])){
                    $cat_id = $_GET['edit'];
                    include "includes/update_category.php";
                }
                ?>
            </div>
        </div>

        <diV class="row" style="background-color:#181e22; color:white;" >
            <table class="table table-bordered table-hover table-dark text-center">
            <p class='ml-5 mt-4'>#Information About Categories</p>
                <thead>
                    <tr>
                      <th scope="col" >S.No.</th>
                      <th scope="col" >CATERORY</th>
                      <th scope="col" >CREATOR</th>
                      <th scope="col" >DELETE</th>
                      <th scope="col" >EDIT</th>
                    </tr>
                </thead>
                <tbody>
                    <?php FindAllCAtegories(); ?>               <!-- find all categories -->     
                    <?php DeleteCategories(); ?>                <!--delete category -->
                </tbody>
            </table>
        </div>


  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>