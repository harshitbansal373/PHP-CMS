<?php  include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">

        <?php 
            if(isset($_GET['p_id'])){
               $the_post_id = $_GET['p_id'];
            }
            $query = "SELECT * FROM posts WHERE post_id = {$the_post_id} ";
            $select_all_posts_query = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_all_posts_query)){
               $post_title = $row['post_title'];
               $post_user = $row['post_user'];
               $post_date = $row['post_date'];
               $post_image = $row['post_image'];
               $post_content = $row['post_content'];
        ?>

                
        <!--first Blog Post -->
        <h2> 
          <a href="post.php?p_id='<?php echo $post_id; ?>'"><?php echo $post_title; ?></a>
        </h2>
        <p class="lead">
        <?php
            $query = "SELECT * FROM users WHERE username = '$post_user' ";
            $select_user_query = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_user_query)){
              $user_firstname = $row['user_firstname'];
              $user_lastname = $row['user_lastname'];
            }
            $name = $user_firstname.' '.$user_lastname;
            ?>
            by <a href="post.php?p_id='<?php echo $post_id; ?>'"><?php echo $name; ?></a>
        </p>
        <p> <i class="far fa-clock"></i> <?php echo $post_date; ?></p>
        <hr>
        <a href="post.php?p_id='<?php echo $post_id; ?>'">
        <img class="img-fluid" src="images/<?php echo imagePlaceholder($post_image);?>" alt="img">
        </a>
        <hr>  
        <p><?php echo $post_content; ?></p>
        <hr>     
           
        <?php } ?>


        <!-- Blog Comments -->
        <?php

        if(isset($_POST['create_comment'])){
            $the_post_id = $_GET['p_id'];
            $comment_author = $_POST['comment_author'];
            $comment_email = $_POST['comment_email'];
            $comment_content = $_POST['comment_content'];

            if(!empty($comment_author) && !empty($comment_email) && !empty($comment_content)){
                $query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,
                        comment_content,comment_status,comment_date) ";
                $query .= "VALUES ( $the_post_id,'{$comment_author}','{$comment_email}',
                        '{$comment_content}','show', NOW() )";
                
                $create_comment_query = mysqli_query($connection,$query);
                
                confirm_query($create_comment_query);
                
            }else{
                echo "<script>alert('fields cannot be empty')</script>";
            }          

        }
        ?>

        <!-- Comments Form -->
        <div class="col-sm-7">
            <h4>Leave a Comment:</h4>
            <form action="" method="POST" role="form">
                <div class="form-group">
                    <label for="Author">Name</label>
                    <input type="text" class="form-control" name="comment_author">
                </div>
                <div class="form-group">
                <label for="Email">Email</label>
                    <input type="email" class="form-control" name="comment_email">
                </div>
                <div class="form-group">
                <label for="">Your Comment</label>
                    <textarea class="form-control" rows="3" name="comment_content"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="create_comment">Submit</button>
            </form>
        </div>
        
        <hr>

        <!-- Posted Comments -->
        <?php
        
        $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id} ";
        $query .= "AND comment_status = 'show' ";
        $query .= "ORDER BY comment_id DESC ";
        $select_comments_query = mysqli_query($connection,$query);

        confirm_query($select_comments_query);

        while($row = mysqli_fetch_array($select_comments_query)) {
           $comment_date = $row['comment_date'];
           $comment_author = $row['comment_author'];
           $comment_content = $row['comment_content'];
        ?>

        <!-- Comment -->
        <div class="media mb-4">
            <a class="pull-left" href="#">
                <img class="media-object" src="http://placehold.it/64x64" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading"><?php echo $comment_author; ?>
                    <small class="lead"><?php echo $comment_date; ?></small>
                </h4>
                <?php echo $comment_content; ?>
            </div>
        </div>

        <?php } ?>

        </div>

<!-- Sidebar Widgets Column -->
<?php  include "includes/sidebar.php"; ?>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<?php  include "includes/footer.php"; ?>