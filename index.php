
<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>



    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->

        <div class="col-md-8">
        
        <?php 

            $per_page =3;

            if(isset($_GET['page'])){
              $page = $_GET['page'];
            }else{
              $page = "";
            }

            if($page == 1 || $page == ""){
              $page_1 = 0;
            }else{
              $page_1 = ($page * $per_page) -$per_page;
            }

            $post_query_count = "SELECT * FROM posts";
            $find_count = mysqli_query($connection,$post_query_count);
            $count = mysqli_num_rows($find_count);

            $count = ceil($count/$per_page);
           
           $query = "SELECT * FROM posts LIMIT $page_1 ,$per_page";
           $select_all_posts_query = mysqli_query($connection,$query);

           while($row = mysqli_fetch_assoc($select_all_posts_query)){
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
              $post_author = $row['post_author'];
              $post_user = $row['post_user'];
              $post_date = $row['post_date'];
              $post_image = $row['post_image'];
              $post_content = $row['post_content'];
        ?>



          <h1 class="page-header">Page Heading
            <small>Secondary Text</small>
          </h1>
                  
          <!--first Blog Post -->
          <h1><?php echo $count; ?></h1>
          <h2> 
            <a href="post.php?p_id='<?php echo $post_id; ?>'"><?php echo $post_title; ?></a>
          </h2>
          <p class="lead">
              by <a href="post.php?p_id='<?php echo $post_id; ?>'"><?php echo $post_author; ?></a>
          </p>
          <p> <i class="far fa-clock"></i> <?php echo $post_date; ?></p>
          <hr>
          <a href="post.php?p_id='<?php echo $post_id; ?>'">
          <img class="img-fluid" <?php echo "src='images/$post_image'";?> alt="img">
          </a>
          <hr>  
          <p><?php echo $post_content; ?></p>
              <a href="post.php?p_id='<?php echo $post_id; ?>'" class="btn btn-primary">Read More &rarr;</a>
          <hr>        


          <?php } ?>
 

        </div>

        <!-- Sidebar Widgets Column -->
        <?php  include "includes/sidebar.php"; ?>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <?Php
          echo "<li class='page-item'><a class='page-link' href='index.php'>pre</a></li>";    
      for($i=1;$i<=$count;$i++){
        if($i == $page){
          echo "<li class='page-item active'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
        }else{
          echo "<li class='page-item'><a class='page-link' href='index.php?page={$i}'>{$i}</a></li>";
        }
      }
          echo "<li class='page-item'><a class='page-link' href='index.php'>next</a></li>";    
    ?>
  </ul>
</nav>

    <?php  include "includes/footer.php"; ?>