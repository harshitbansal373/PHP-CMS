<?php include "includes/header.php" ?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

<!-- Sidebar -->
<?php include "includes/sidebar.php" ?>

<div id="content-wrapper">

  <div class="container-fluid text-center">
    <!-- Page Content -->
    <h2>COMMENTS</h2>
    <h6>You can manage commnets that will appear on your Post.</h6>
    <hr><br>

    <?php 
      $query = "SELECT * FROM posts WHERE post_user = '{$_SESSION['username']}' ";
      $select_post_query = mysqli_query($connection,$query);
      while($row = mysqli_fetch_assoc($select_post_query)){
        $post_id = $row['post_id'];
      
        $query = "SELECT * FROM comments WHERE comment_post_id = $post_id";
        $select_all_comments_query = mysqli_query($connection,$query);
        $select_all_comments_count = mysqli_num_rows($select_all_comments_query);
      
        if($select_all_comments_count>0){
          $view = true;
        }
      }
    ?>

    <?php if(!isset($view)): ?>
        <h2>No Comments has not been commenced yet</h2>

    <?php else: ?>

        <table class="table table-hover table-dark table-bordered">
          <thead>
            <tr>
              <th scope="col">S.No.</th>
              <th scope="col">NAME</th>
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
            <?php viewPostComments();  ?>
          </tbody>
        </table>

    <?php endif; ?>

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
        header("Location:comments.php");
      }
    ?>

  </div>
  <!-- /.container-fluid -->

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>