<?php

// Starting the session, to use and
// store data in session variable
session_start();

// If the session variable is empty, this
// means the user is yet to login
// User will be sent to 'login.php' page
// to allow the user to login
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    header('location: login/login.php');
}

// Logout button will destroy the session, and
// will unset the session variables
// User will be headed to 'login.php'
// after loggin out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: login/login.php");
}
?>


<?php
include ('login/dbconn.php');

$url = explode('?', basename($_SERVER['REQUEST_URI']));
$id = $url[1];

$del_error = "cannot?";

$sql = "DELETE FROM rooms where id = ?";


if($stmt = mysqli_prepare($conn, $sql)){

    mysqli_stmt_bind_param($stmt, "i", $del_record);

    $del_record = $id;

    if(mysqli_stmt_execute($stmt)){
        echo "Your record has been deleted";
    } else {
        echo mysqli_error($conn);
    }
}

mysqli_stmt_close($stmt);

header("refresh:1; url = posts.php");

?>
