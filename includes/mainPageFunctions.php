<?php

function imagePlaceholder($image=''){
    if(!$image){
        return 'nopost.jpg';
    }
    else{
        return $image;
    }
}

function escape($string){
    global $connection;

    return mysqli_real_escape_string($connection, trim($string));
}

function confirm_query($result){
    global $connection;

   if(!$result){
    die("QUERY FAILED" . mysqli_error($connection));
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