<h2>Edit Post</h2>
<hr>

<?php
if(isset($_GET['p_id'])){
    $the_post_id = $_GET['p_id'];
}
$query = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
    $select_posts_by_id = mysqli_query($connection,$query);
    while($row = mysqli_fetch_assoc($select_posts_by_id)){
       $post_id = $row['post_id'];
       $post_title = $row['post_title'];
       $post_category_id = $row['post_category_id'];
       $post_status = $row['post_status'];
       $post_image = $row['post_image'];
       $post_tags = $row['post_tags'];
       $post_content = $row['post_content'];
       $post_comment_count = $row['post_comment_count'];
       $post_date = $row['post_date'];
}

if(isset($_POST['update_post'])){
    $post_title = $_POST['post_title'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_temp_image = $_FILES['post_image']['tmp_name'];
    
    $post_tags = $_POST['post_tags'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');

    $location = "../images/$post_image";
    move_uploaded_file($post_temp_image,$location);

    if(empty($post_image)){
        $query = "SELECT * FROM posts WHERE post_id = '{$the_post_id}' ";
        $set_image = mysqli_query($connection,$query);

        while($row = mysqli_fetch_assoc($set_image)){
        $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE posts SET post_title = '{$post_title}', post_category_id = '{$post_category_id}', 
            post_status = '{$post_status}', post_image = '{$post_image}', post_tags = '{$post_tags}', 
            post_content = '{$post_content}', post_date = NOW() WHERE post_id = ?";

    $stmt_update_post = mysqli_prepare($connection,$query);
    mysqli_stmt_bind_param($stmt_update_post, "s", $the_post_id);
    mysqli_stmt_execute($stmt_update_post);
    mysqli_stmt_close($stmt_update_post);

    confirm_query($stmt_update_post);
    header("Location:posts.php");

}


?>


<form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="post_title">Post title</label>
            <input type="text" class="form-control" value="<?php echo $post_title; ?>" name="post_title" >
        </div>
        
        <div class="form-group">
            <label for="post_category_id">Post Category ID</label><br>
            <select name="post_category_id" id="">    
            <?php   
            $query = "SELECT * FROM categories";
            $select_category = mysqli_query($connection,$query);
            
            confirm_query($select_category);

            while($row = mysqli_fetch_assoc($select_category)){
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];
                
            echo "<option value='$cat_id'>{$cat_title}</option>";
            
            }
            ?>

            </select>
        </div>

        <div class="form-group">
            <label for="post_status">Post Status</label><br>
            <select name="post_status" id="">
                <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
                <?php
                if($post_status == 'published'){
                    echo "<option value='draft'>draft</option>";
                }else{
                    echo "<option value='published'>published</option>";                    
                }

                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="post_image">Post Image</label><br>
            <?php
                $image = imagePlaceholder($post_image);
                echo "<img width='100' class='img-fluid' src='../images/$image' alt='img'>";  
            ?><br><br>
            <input type="file" name="post_image">
        </div>
        <div class="form-group">
            <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" value="<?php echo $post_tags; ?>" name="post_tags" >
        </div>
        <div class="form-group">
            <label for="post_content">Post Content</label>
            <textarea class="form-control" id="" name="post_content" rows="4"><?php echo $post_content; ?>   </textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-secondary " name="update_post" value="Update Post" >
        </div>
    </form>