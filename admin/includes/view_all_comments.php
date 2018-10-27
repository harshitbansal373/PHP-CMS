<table class="table table-hover table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Author</th>
      <th scope="col">Comment</th>
      <th scope="col">Email</th>
      <th scope="col">Status</th>
      <th scope="col">In Response To</th>
      <th scope="col">Date</th>
      <th scope="col">Approve</th>
      <th scope="col">Unapprove</th>
      <th scope="col">Delete</th>
    </tr>
</thead>
<tbody>

    <?php 
        
        $query = "SELECT * FROM comments";
        $select_all_comments_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_all_comments_query)){
           $comment_id = $row['comment_id'];
           $comment_post_id = $row['comment_post_id'];
           $comment_author = $row['comment_author'];
           $comment_content = $row['comment_content'];
           $comment_email = $row['comment_email'];
           $comment_status = $row['comment_status'];
           $comment_date = $row['comment_date'];

          echo "<tr>";
          echo "<th scope='row'>$comment_id</th>";
          echo "<td>$comment_author</td>";
          echo "<td>$comment_content</td>";

        //   $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
        //   $select_categories_id = mysqli_query($connection,$query);
      
        //   while($row = mysqli_fetch_assoc($select_categories_id)){
        //   $cat_id = $row['cat_id'];
        //   $cat_title = $row['cat_title'];
        //   echo "<td>$cat_title</td>";
        //   }
  
  
          echo "<td>$comment_email</td>";
          echo "<td>$comment_status</td>";

          $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
          $select_post_id_query = mysqli_query($connection,$query);
          while($row = mysqli_fetch_assoc($select_post_id_query)){
              $post_id = $row['post_id'];
              $post_title = $row['post_title'];
              echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

          }

          echo "<td>$comment_date</td>";
          echo "<td><a href='comments.php?approve=$comment_id'>Approve</td>";
          echo "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</td>";
          echo "<td><a href='comments.php?delete=$comment_id'>Delete</td>";
          echo "</tr>";
        }
    ?>

</tbody>
    </table>


<?php                          

//approve comments
if(isset($_GET['approve'])){
    $the_comment_id = $_GET['approve'];

    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
    $approve_query = mysqli_query($connection,$query);
    header("Location:comments.php");

}


//unapprove comments
if(isset($_GET['unapprove'])){
    $the_comment_id = $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id";
    $unapprove_query = mysqli_query($connection,$query);
    header("Location:comments.php");

}


//delete comments
if(isset($_GET['delete'])){
    $the_comment_id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
    $delete_query = mysqli_query($connection,$query);
    header("Location:comments.php");

    $query = "UPDATE posts SET post_comment_count = post_comment_count-1 ";
    $query .= "WHERE post_id = $comment_post_id";
    $update_comment_count = mysqli_query($connection,$query);

}
?>