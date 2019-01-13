<?php  include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>


<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
    
        <?php
        if(isset($_POST['submit'])){
            $search = $_POST['search'];
        
            $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
            $search_query = mysqli_query($connection,$query);
          
            confirm_query($search_query);
          
            $count = mysqli_num_rows($search_query);

            if($count == 0){
              echo "<h1 class='text-center'>NO RESULT</h1>";
            }
            else{
                while($row = mysqli_fetch_assoc($search_query)){
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
            <img class="img-fluid" src="images/<?php echo imagePlaceholder($post_image);?>" alt="img">
            </a>
            <hr>  
            <p><?php echo $post_content; ?></p>
                <a href="post.php?p_id='<?php echo $post_id; ?>'" class="btn btn-primary">Read More &rarr;</a>
            <hr>        
 
        <?php   } 
            }
        }
        ?>

        </div>

<!-- Sidebar Widgets Column -->
<?php  include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php  include "includes/footer.php"; ?>