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

        <?php
            $the_cat_creator = $_SESSION['username'];
            $query = "SELECT * FROM categories WHERE cat_creator = '{$the_cat_creator}' ";
            $select_categories = mysqli_query($connection,$query);
            $category_own_count = mysqli_num_rows($select_categories);  

            if($category_own_count>0){
                $view=true;
            }
        ?>
        <?php if(isset($view)): ?>

            <div class="col-sm-6 mt-4 ml-auto">
                <p class="ml-5">#List of categories created by you</p>
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                          <th scope="col" >S.No.</th>
                          <th scope="col" >CATEGORY TITLE</th>
                          <th scope="col" >DELETE</th>
                          <th scope="col" >EDIT</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php viewOwnCategory(); ?>
                        <?php DeleteCategories(); ?>
                    </tbody>
                </table>
            </div>

        <?php endif; ?>
           
    </div>

    <diV class="row" style="background-color:#181e22; color:white;" >
        <table class="table table-hover table-dark table-bordered text-center">
        <p class='ml-5 mt-4'>#Your whole status about your Post related to Catogories</p>
            <thead>
                <tr>
                  <th scope="col">S.No.</th>
                  <th scope="col">CATEGORY</th>
                  <th scope="col">STATUS</th>
                  <th scope="col">No. Of POST</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $serial=0;
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
                        $serial=$serial+1;
                        echo "<td>{$serial}</td>";   
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