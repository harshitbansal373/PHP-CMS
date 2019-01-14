<?php include "includes/header.php" ?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

<!-- Sidebar -->
<?php include "includes/sidebar.php" ?>

<div id="content-wrapper">

  <div class="container-fluid">
    <!-- Page Content -->
    <h2>Manage Categories</h2>
    <hr>

    <diV class="row" style="background-color:#181e22; color:white;" >
        <div class="col-sm-3 offest-sm-3">
    
            <?php  insert_categories(); ?>                 <!-- insertion of categories -->

            <form action="" method="POST" class="mt-4">
                <div class="form-group">
                    <label for="heading">Create Your Own Category</label>
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
    

        <div class="col-sm-6 mt-4 ml-auto">
            <p class='ml-5'>#List of categories created by you</p>
            <table class="table table-bordered table-hover text-center">
              <thead>
                <tr>
                  <th scope="col" >ID</th>
                  <th scope="col" >CATEGORY TITLE</th>
                  <th scope="col" >DELETE</th>
                  <th scope="col" >EDIT</th>
                </tr>
              </thead>
              <tbody>

            <?php viewOwnCategory(); ?>               <!-- view own categories -->     

            <?php DeleteCategories(); ?>                <!--delete category -->

              </tbody>
            </table>
        </div>

        <table class="table table-hover table-dark table-bordered">
        <p class='ml-5 mt-4'>#Your whole status about your Post related to Catogories</p>
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">CATEGORY</th>
                  <th scope="col">STATUS</th>
                  <th scope="col">No.OF POST</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $query = "SELECT * FROM categories";
                $select_title = mysqli_query($connection,$query);
                while($row = mysqli_fetch_assoc($select_title)){
                    $cat_id = $row['cat_id'];
                    $cat_title = $row['cat_title'];
                
                    $user = currentUser();
                    $query = "SELECT * FROM categories WHERE cat_user LIKE '%$user%,' AND cat_title = '$cat_title' ";
                    $search_query = mysqli_query($connection,$query);
                    $count_cat = mysqli_num_rows($search_query);

                        echo "<tr>";
                        echo "<td>{$cat_id}</td>";   
                        echo "<td>{$cat_title}</td>";

                        if($count_cat==0){
                            echo "<td>cross</td>";   
                        }else{
                            echo "<td>tick</td>";
                        }
                    
                        echo "<td>{$count_cat}</td>";   
                        echo "</tr>";
                    } 
                ?>
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