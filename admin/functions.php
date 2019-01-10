<?php

function currentUser(){
    if(isset($_SESSION['username'])){
        return $_SESSION['username'];
    }
    return false;
}

function imagePlaceholder($image=''){
    if(!$image){
        return 'nopost.jpg';
    }
    else{
        return $image;
    }
}

function users_online() {

    global $connection;

    $session = session_id();
    $time = time();
    $time_out_in_seconds = 60;
    $time_out = $time - $time_out_in_seconds;

    $query = "SELECT * FROM users_online WHERE session = '$session'";
    $send_query = mysqli_query($connection, $query);
    $count = mysqli_num_rows($send_query);

        if($count == NULL) {

        mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");


        } else {

        mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");


        }

    $users_online_query =  mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
    return $count_user = mysqli_num_rows($users_online_query);

}


function confirm_query($result){
    global $connection;

   if(!$result){
    die("QUERY FAILED" . mysqli_error($connection));
   }

}


function insert_categories(){
    global $connection;

    if(isset($_POST['submit'])){
        $cat_title = $_POST['cat_title'];

        if($cat_title =="" || empty($cat_title))  {
            echo "<p class='lead'>*This field should not be empty</p>";
        }
        else{
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE(?)"; 

            $stmt_create_category_query = mysqli_prepare($connection,$query);
            mysqli_stmt_bind_param($stmt_create_category_query,"s",$cat_title);
            mysqli_stmt_execute($stmt_create_category_query);
            mysqli_stmt_close($stmt_create_category_query);

            if(!$stmt_create_category_query){
                die('QUERY FAILED'. mysql_error($connection));
            }
        }
    }

}

function FindAllCAtegories(){
    global $connection;

    $query = "SELECT * FROM categories";
    $select_all_categories = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_all_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";   
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='category.php?delete={$cat_id}'>Delete</a></td>";   
        echo "<td><a href='category.php?edit={$cat_id}'>Edit</a></td>";   
        echo "</tr>";
    }

}


function DeleteCategories(){
    global $connection;

    if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
    $delete_query = mysqli_query($connection, $query);
    header("Location:category.php");
    }


}

function Approve_comment(){
    global $connection;

    if(isset($_GET['approve'])){
        $the_comment_id = $_GET['approve'];
    
        // $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $the_comment_id";
        // $approve_query = mysqli_query($connection,$query);
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = ?";
        $stmt_approve_query = mysqli_prepare($connection,$query);
        mysqli_stmt_bind_param($stmt_approve_query, "s", $the_comment_id);
        mysqli_stmt_execute($stmt_approve_query);
        mysqli_stmt_close($stmt_approve_query);
        header("Location:comments.php");   
    }
}

function Unapprove_comment(){
    global $connection;

    if(isset($_GET['unapprove'])){
        $the_comment_id = $_GET['unapprove'];
    
        // $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id";
        // $unapprove_query = mysqli_query($connection,$query);
        $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = ?";
        $stmt_unapprove_query = mysqli_prepare($connection,$query);
        mysqli_stmt_bind_param($stmt_unapprove_query, "s", $the_comment_id);
        mysqli_stmt_execute($stmt_unapprove_query);
        mysqli_stmt_close($stmt_unapprove_query);
        header("Location:comments.php");   
    }
}

function redirect($location){
    header("Location:" . $location);
    exit;
}

function ifItIsMethod($method=null){
    if($_server['REQUEST_METHOD'] == strtoupper($method)){
        return true;
    }

    return false;
}

function isLoggedIn(){
    if(isset($_SESSION['user_role'])){
        return true;
    }

    return false;
}

function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){
    if(isLoggedIn()){
        redirect($redirectLocation);
    }
}

function email_exists($email){
    global $connection;

    $query = "SELECT user_email FROM users WHERE user_email ='$email'";
    $result = mysqli_query($connection, $query);
    confirm_query($result);

    if(mysqli_num_rows($result)>0){
        return true;
    }else{
        return false;
    }

}

?>