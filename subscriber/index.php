<?php include "includes/header.php" ?>

<!-- Navbar -->
<?php include "includes/navigation.php" ?>

<div id="wrapper">

<!-- Sidebar -->
<?php include "includes/sidebar.php" ?>

  <div id="content-wrapper">
    <div class="container-fluid">
      <!-- Page Content -->
      <h1>Welcome Our User 
      <small><?php echo $_SESSION['username']; ?></small></h1>
      <hr>
      <p>This is a great starting point for new custom pages.</p>





      <!-- /.row -->
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <i class="fas fa-file-alt fa-5x"></i>
                </div>
                <div class="col-sm-9 text-right">
                    <?php
                      $user = currentUser();
                      $query = "SELECT * FROM posts WHERE post_user = '$user'";
                      $select_all_post = mysqli_query($connection,$query);
                      $post_count = mysqli_num_rows($select_all_post);
                      echo "<div>{$post_count}</div>";
                    ?>
                    <div>Posts</div>
                </div>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="posts.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="row">
                <div class="col-sm-3">
                  <i class="fa fa-comments fa-5x"></i>
                </div>
                <div class="col-sm-9 text-right">
                    <?php
                      $query = "SELECT * FROM comments";
                      $select_all_comments = mysqli_query($connection,$query);
                      $comment_count = mysqli_num_rows($select_all_comments);
                      echo "<div>{$comment_count}</div>";
                    ?>
                    <div>Comments</div>
                </div>
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="comments.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fas fa-arrow-circle-right"></i>
              </span>
            </a>
          </div>
        </div>



        <?php
        $user = currentUser();

        $query = "SELECT * FROM posts WHERE post_status='published' AND post_user = '$user' ";
        $select_all_published_posts = mysqli_query($connection,$query);
        $post_published_count = mysqli_num_rows($select_all_published_posts);

        $query = "SELECT * FROM posts WHERE post_status = 'draft' AND post_user = '$user' ";
        $select_all_draft_posts = mysqli_query($connection,$query);
        $post_draft_count = mysqli_num_rows($select_all_draft_posts);

        $query = "SELECT * FROM comments WHERE comment_status = 'hide' ";
        $hide_comments_query = mysqli_query($connection,$query);
        $hide_comments_count = mysqli_num_rows($hide_comments_query);

        ?>

        <div class="row">
          <script type="text/javascript">
            google.charts.load('current', {'packages':['bar']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ['Data', 'Count'],
              
                <?php
                $element_text = ['All Posts', 'Active Posts', 'Draft Post', 'Comments', 'hide Comments'];
                $element_count = [$post_count, $post_published_count, $post_draft_count, $comment_count, $hide_comments_count];
                for($i=0;$i<5;$i++){
                  echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                }
                ?>
              
              ]);
              var options = {
                chart: {
                  title: '',
                  subtitle: '',
                }
              };

              var chart = new google.charts.Bar(document.getElementById('columnchart_material'));
              chart.draw(data, google.charts.Bar.convertOptions(options));
            }
          </script>
         <div class="ml-4 mt-5" id="columnchart_material" style="width: 1200px; height: 350px;"></div>
          
        </div>



    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/footer.php" ?>