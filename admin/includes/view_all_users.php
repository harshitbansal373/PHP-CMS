<div class="text-center">
    <h2>USERS</h2>
    <h6>List Of All Users</h6>
    <hr>

    <table class="table table-hover table-dark table-bordered">
        <thead>
            <tr>
              <th scope="col">S.No.</th>
              <th scope="col">Username</th>
              <th scope="col">firstname</th>
              <th scope="col">Lastname</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Change to Admin</th>
              <th scope="col">Change to Subscriber</th>
              <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

        <?php
            $serial=0;
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
              $serial=$serial+1;
              echo "<th scope='row'>$serial</th>";
              echo "<td>$username</td>";
              echo "<td>$user_firstname</td>";
              echo "<td>$user_lastname</td>";
              echo "<td>$user_email</td>";
              echo "<td>$user_role</td>";
              echo "<td><a href='users.php?admin=$user_id'>Admin</td>";
              echo "<td><a href='users.php?subscriber=$user_id'>Subscriber</td>";
              echo "<td><a href='users.php?delete=$user_id'>Delete</td>";
              echo "</tr>";
            }
        ?>

        </tbody>
    </table>
</div>

<?php                          


//change to admin
if(isset($_GET['admin'])){
    $the_user_id = $_GET['admin'];

    // $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id";
    // $admin_query = mysqli_query($connection,$query);
    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = ?";
    $stmt_admin_query = mysqli_prepare($connection,$query);
    mysqli_stmt_bind_param($stmt_admin_query, "s", $the_user_id);
    mysqli_stmt_execute($stmt_admin_query);
    mysqli_stmt_close($stmt_admin_query);
    header("Location:users.php");

}


//change to subscriber
if(isset($_GET['subscriber'])){
    $the_user_id = $_GET['subscriber'];

    // $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id";
    // $subscriber_query = mysqli_query($connection,$query);
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = ?";
    $stmt_subscriber_query = mysqli_prepare($connection,$query);
    mysqli_stmt_bind_param($stmt_subscriber_query, "s", $the_user_id);
    mysqli_stmt_execute($stmt_subscriber_query);
    mysqli_stmt_close($stmt_subscriber_query);
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