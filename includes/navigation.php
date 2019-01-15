<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Harshit Bansal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            
          <?php 
          // $query = "SELECT * FROM categories";
          // $select_all_categories_query = mysqli_query($connection,$query);

          // while($row = mysqli_fetch_assoc($select_all_categories_query)){
          //     $cat_title = $row['cat_title'];
          //     echo "<li class='nav-item'>
          //     <a class='nav-link' href='#'>{$cat_title}</a></li>";
          // }        
          ?> 
           
              <li class="nav-item ">
                <a class="nav-link" href="index.php">Home
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="includes/userverify.php">dashboard
                </a>
              </li>
              <?php
              if(!isset($_SESSION['user_role'])){
                echo '<li class="nav-item "><a class="nav-link" href="login.php">Login</a></li>';
              }
              ?>
              <li class="nav-item ">
                <a class="nav-link" href="registration.php">Registration
                </a>
              </li> 
              <li class="nav-item ">
                <a class="nav-link" href="contact.php">Contact
                </a>
              </li>           

          </ul>
        </div>
      </div>
    </nav> 