<table class="table table-hover table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Author</th>
      <th scope="col">Title</th>
      <th scope="col">Category</th>
      <th scope="col">Status</th>
      <th scope="col">Image</th>
      <th scope="col">Tags</th>
      <th scope="col">Comments</th>
      <th scope="col">Date</th>
      <th scope="col">View Post</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
</thead>
<tbody>

    <?php 
        
        $query = "SELECT * FROM posts";
        $select_all_posts_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_all_posts_query)){
           $post_id = $row['post_id'];
           $post_author = $row['post_author'];
           $post_title = $row['post_title'];
           $post_category_id = $row['post_category_id'];
           $post_status = $row['post_status'];
           $post_image = $row['post_image'];
           $post_tags = $row['post_tags'];
           $post_comment_count = $row['post_comment_count'];
           $post_date = $row['post_date'];

          echo "<tr>";
          echo "<th scope='row'>$post_id</th>";
          echo "<td>$post_author</td>";
          echo "<td>$post_title</td>";

          $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
          $select_categories_id = mysqli_query($connection,$query);
      
          while($row = mysqli_fetch_assoc($select_categories_id)){
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];
          echo "<td>$cat_title</td>";
          }
  
  
          echo "<td>$post_status</td>";
          echo "<td><img width='100' class='img-fluid' src='../images/$post_image' alt='img'></td>";
          echo "<td>$post_tags</td>";

          $query = "SELECT * FROM comments WHERE comment_post_id = {$post_id}";
          $send_comment_query = mysqli_query($connection,$query);

          $row = mysqli_fetch_array($send_comment_query);
          $comment_id = $row['comment_id'];
          $count_comment = mysqli_num_rows($send_comment_query);

          echo "<td><a href='post_comment.php?id={$post_id}'>$count_comment</a></td>";

          echo "<td>$post_date</td>";
          echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
          echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>edit</a></td>";
          echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \" href='posts.php?delete={$post_id}'>Delete</a></td>";
          echo "</tr>";
        }
    ?>

</tbody>
    </table>


<?php                                    //delete posts
if(isset($_GET['delete'])){
    $the_post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id = {$the_post_id}";
    $delete_query = mysqli_query($connection,$query);
    header("Location:posts.php");

}
?>