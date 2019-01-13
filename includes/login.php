<?php include "db.php"; ?>

<?php session_start(); ?>

<?php
if(isset($_POST['login'])){
$username = $_POST['username'];
$password = $_POST['password'];

$username = mysqli_real_escape_string($connection,$username);
$password = mysqli_real_escape_string($connection,$password);

$query = "SELECT * FROM users WHERE username = '{$username}' ";
$login_user_query = mysqli_query($connection,$query);

if(!$login_user_query){
    die("QUERY FAILED " . mysqli_error($connection));
}

while($row = mysqli_fetch_assoc($login_user_query)){
    $db_user_id = $row['user_id'];
    $db_username = $row['username'];
    $db_user_firstname = $row['user_firstname'];
    $db_user_lastname = $row['user_lastname'];
    $db_user_password = $row['user_password'];
    $db_user_role = $row['user_role'];
}

if(password_verify($password,$db_user_password)){
    $_SESSION['username'] = $db_username;
    $_SESSION['user_firstname'] = $db_user_firstname;
    $_SESSION['user_lastname'] = $db_user_lastname;
    $_SESSION['user_role'] = $db_user_role;

    // header("location: ../admin");
    header("location: userverify.php");

}
else{ 
    header("location: ../index.php");
}



}

?>