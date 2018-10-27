
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
           
           $query = "SELECT * FROM posts";
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

    <?php  include "includes/footer.php"; ?>