<div class="text-center">
    <h2>ALL POSTS</h2>
    <h6>You can manage posts as your wish.</h6>
    <hr>

    <table class="table table-hover table-dark table-bordered">
        <thead>
            <tr>
              <th scope="col">S.No.</th>
              <th scope="col">TITLE</th>
              <th scope="col">CATEGORY</th>
              <th scope="col">STATUS</th>
              <th scope="col">IMAGE</th>
              <th scope="col">COMMENTS</th>
              <th scope="col">DATE</th>
              <th scope="col">VIEW POST</th>
              <th scope="col">DELETE</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $serial=0;
            $query = "SELECT * FROM posts";
            $select_all_posts_query = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_all_posts_query)){
               $post_id = $row['post_id'];
               $post_title = $row['post_title'];
               $post_category_id = $row['post_category_id'];
               $post_status = $row['post_status'];
               $post_image = $row['post_image'];
               $post_comment_count = $row['post_comment_count'];
               $post_date = $row['post_date'];

              echo "<tr>";
              $serial=$serial+1;
              echo "<th scope='row'>$serial</th>";
              echo "<td>$post_title</td>";

              $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
              $select_categories_id = mysqli_query($connection,$query);
            
              while($row = mysqli_fetch_assoc($select_categories_id)){
              $cat_id = $row['cat_id'];
              $cat_title = $row['cat_title'];
              echo "<td>$cat_title</td>";
              }
          
          
              echo "<td>$post_status</td>";
              $image = imagePlaceholder($post_image);
              echo "<td><img width='100' class='img-fluid' src='../images/$image' alt='img'></td>";

              $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id}";
              $send_comment_query = mysqli_query($connection,$query);

              $row = mysqli_fetch_array($send_comment_query);
              $comment_id = $row['comment_id'];
              $count_comment = mysqli_num_rows($send_comment_query);

              echo "<td><a href='post_comment.php?id={$post_id}'>$count_comment</a></td>";

              echo "<td>$post_date</td>";
              echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
              echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
              echo "</tr>";
            }
        ?>

        </tbody>
    </table>
</div>

<?php                                    //delete posts
if(isset($_GET['delete'])){
    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection,$query);

    $query = "DELETE FROM comments WHERE comment_post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection,$query);
    header("Location:posts.php");

}
?>