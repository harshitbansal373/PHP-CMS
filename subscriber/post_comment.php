<?php include "includes/header.php" ?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

<!-- Sidebar -->
<?php include "includes/sidebar.php" ?>

<div id="content-wrapper">

  <div class="container-fluid">
    <!-- Page Content -->
    <h2>COMMENTS</h2>
    <hr><br>
    <h6>You can manage commnets that will appear on your Post.</h6>

    <table class="table table-hover table-dark table-bordered">
        <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">COMMENT</th>
              <th scope="col">STATUS</th>
              <th scope="col">In Response To</th>
              <th scope="col">DATE</th>
              <th scope="col">SHOW</th>
              <th scope="col">HIDE</th>
              <th scope="col">DELETE</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $query = "SELECT * FROM comments WHERE comment_post_id =" .$_GET['id']. " ";
            $select_all_comments_query = mysqli_query($connection,$query);
            while($row = mysqli_fetch_assoc($select_all_comments_query)){
               $comment_id = $row['comment_id'];
               $comment_post_id = $row['comment_post_id'];
               $comment_content = $row['comment_content'];
               $comment_status = $row['comment_status'];
               $comment_date = $row['comment_date'];

              echo "<tr>";
              echo "<th scope='row'>$comment_id</th>";
              echo "<td>$comment_content</td>";
              echo "<td>$comment_status</td>";

              $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
              $select_post_id_query = mysqli_query($connection,$query);
              while($row = mysqli_fetch_assoc($select_post_id_query)){
                  $post_id = $row['post_id'];
                  $post_title = $row['post_title'];
                  echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

              }

              echo "<td>$comment_date</td>";
              echo "<td><a href='comments.php?show=$comment_id'>Show</td>";
              echo "<td><a href='comments.php?hide=$comment_id'>Hide</td>";
              echo "<td><a href='post_comment.php?delete=$comment_id&id=". $_GET['id'] ."'>Delete</td>";
              echo "</tr>";
            }
        ?>

        </tbody>
    </table>


    <?php                          

    //show comments
    Show_comment();

    //hide comments
    Hide_comment();

    //delete comments
    if(isset($_GET['delete'])){
        $the_comment_id = $_GET['delete'];
        $query = "DELETE FROM comments WHERE comment_id = {$the_comment_id}";
        $delete_query = mysqli_query($connection,$query);
        header("Location:post_comment.php?id=". $_GET['id'] ."");

    }
    ?>


  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>