<table class="table table-hover table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Username</th>
      <th scope="col">firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Role</th>
      <th scope="col">Change to Admin</th>
      <th scope="col">Change to Subscriber</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
</thead>
<tbody>

    <?php 
        
        $query = "SELECT * FROM users";
        $select_all_users_query = mysqli_query($connection,$query);
        while($row = mysqli_fetch_assoc($select_all_users_query)){
           $user_id = $row['user_id'];
           $username = $row['username'];
           $user_firstname = $row['user_firstname'];
           $user_lastname = $row['user_lastname'];
           $user_email = $row['user_email'];
           $user_image = $row['user_image'];
           $user_role = $row['user_role'];

          echo "<tr>";
          echo "<th scope='row'>$user_id</th>";
          echo "<td>$username</td>";
          echo "<td>$user_firstname</td>";
          echo "<td>$user_lastname</td>";
          echo "<td>$user_email</td>";
          echo "<td>$user_role</td>";

        //   $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
        //   $select_categories_id = mysqli_query($connection,$query);
      
        //   while($row = mysqli_fetch_assoc($select_categories_id)){
        //   $cat_id = $row['cat_id'];
        //   $cat_title = $row['cat_title'];
        //   echo "<td>$cat_title</td>";
        //   }
  
  

        //   $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
        //   $select_post_id_query = mysqli_query($connection,$query);
        //   while($row = mysqli_fetch_assoc($select_post_id_query)){
        //       $post_id = $row['post_id'];
        //       $post_title = $row['post_title'];
        //       echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";

        //   }

          echo "<td><a href='users.php?admin=$user_id'>Admin</td>";
          echo "<td><a href='users.php?subscriber=$user_id'>Subscriber</td>";
          echo "<td><a href='users.php?source=edit_user&u_id=$user_id'>Edit</td>";
          echo "<td><a href='users.php?delete=$user_id'>Delete</td>";
          echo "</tr>";
        }
    ?>

</tbody>
    </table>


<?php                          


//change to admin
if(isset($_GET['admin'])){
    $the_user_id = $_GET['admin'];

    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
    $admin_query = mysqli_query($connection,$query);
    header("Location:users.php");

}


//change to subscriber
if(isset($_GET['subscriber'])){
    $the_user_id = $_GET['subscriber'];

    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id";
    $subscriber_query = mysqli_query($connection,$query);
    header("Location:users.php");

}


//delete comments
if(isset($_GET['delete'])){
    $the_user_id = $_GET['delete'];

    $query = "DELETE FROM users WHERE user_id = {$the_user_id}";
    $delete_query = mysqli_query($connection,$query);
    header("Location:users.php");

}
?>