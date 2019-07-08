<div class="col-md-4">

<!-- Search Widget -->

<div class="card my-4">
  <h5 class="card-header">Search</h5>
  <form action="search.php" method="POST">
  <div class="card-body">
    <div class="input-group">
      <input type="text" name="search" class="form-control" placeholder="Search for...">
      <span class="input-group-btn">
        <button name="submit" class="btn btn-secondary" type="submit"><i class="fas fa-search"></i></button>
      </span>
    </div>
  </div>
  </form>
</div>

<!-- Search Widget -->

<div class="card my-4">

  <?php if(isset($_SESSION['user_role'])): ?>

    <h5 class="card-header">Logged in as <?php echo $_SESSION['username']; ?></h5>
    <span class="input-group-btn text-center">
    <a href="includes/logout.php" class="btn btn-primary">Logout</a>
    </span>

  <?php else: ?>

  <h5 class="card-header">Login</h5>
    <form action="includes/login.php" method="POST">
    <div class="card-body">
      <div class="form-group">
        <input type="text" name="username" class="form-control" placeholder="Enter Username">
      </div>
      <div class="input-group">
        <input type="password" name="password" class="form-control" placeholder="Enter Password">
        <span class="input-group-btn">
          <button name="login" class="btn btn-secondary" type="submit">Submit</button>
        </span>
      </div>
      <div class="form-group">
      <a href="forgot.php?forgot=<?php echo uniqid(true); ?>"> Forgot Password?</a>
      </div>
    </div>
    </form>

  <?php endif; ?>


</div>

<!-- Categories Widget -->
<div class="card my-4 view">
  <h5 class="card-header text-center">Categories</h5>
  <div class="card-body">
      <div class="row">
          <?php 
          $query = "SELECT * FROM categories";
          $categories_query = mysqli_query($connection,$query);
          while($row =  mysqli_fetch_assoc($categories_query)){
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];
          ?> 
                  
          <div class="col-4 col-sm-3 col-lg-4">
              <ul class="list-unstyled mb-0">
                  <li class='nav-item text-center mb-2'>
                  <a style="font-family: roboto; color:#2c3e50;" href='categorymenu.php?category=<?php echo $cat_id; ?>'><h6><?php echo '#'.$cat_title; ?></h6></a></li>
              </ul>
          </div>
          <?php } ?>
      </div>
    
  </div>
</div>


<!-- Side Widget -->
<?php include "widget.php"; ?>

</div>