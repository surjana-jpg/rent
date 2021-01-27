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
mysqli_connect("localhost", "root", "") or die("Error connecting to database: ".mysqli_error());
/*
    localhost - it's location of the mysql server, usually localhost
    root - your username
    third is your password

    if connection fails it will stop loading the page and display an error
*/
include "login/dbconn.php";
mysqli_select_db($conn,"dummy") or die(mysqli_error());
/* tutorial_search is the name of database we've created */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>myRent</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>


<nav class="navbar  navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.html">myRent</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a href="room1.php" class="nav-link">Rooms</a></li>
                <li class="nav-item"><a href="apt1.php" class="nav-link">Apartments</a></li>
                <li class="nav-item"><a href="house1.php" class="nav-link">Building</a></li>

            </ul>

            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php  if (isset($_SESSION['username'])) : ?>

                            <strong>
                                <?php echo $_SESSION['username']; ?>
                            </strong>
                        <?php endif ?>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="add.php">Add</a>
                        <a class="dropdown-item" href="posts.php">Posts</a>
                        <a class="dropdown-item" href="index.html">Logout</a>
                    </div>

                </li>            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<div class="container mt-5 pt-5 heading-section  ftco-animate">
    <span class="subheading ml-5 mt-3">Search Results  </span>
    <?php
    $query = $_GET['query'];
    // gets value sent over search form

    $min_length = 3;
    // you can set minimum length of the query if you want

    if(strlen($query) >= $min_length){ // if query length is more or equal minimum length then

        $query = htmlspecialchars($query);
        // changes characters used in html to their equivalents, for example: < to &gt;

        $query = mysqli_real_escape_string($conn,$query);
        // makes sure nobody uses SQL injection

        $raw_results = mysqli_query($conn,"SELECT * FROM house
            WHERE (`address` LIKE '%".$query."%')") or die(mysqli_error($conn));

        // * means that it selects all fields, you can also write: `id`, `title`, `text`
        // articles is the name of our table

        // '%$query%' is what we're looking for, % means anything, for example if $query is Hello
        // it will match "hello", "Hello man", "gogohello", if you want exact match use `title`='$query'
        // or if you want to match just full word so "gogohello" is out use '% $query %' ...OR ... '$query %' ... OR ... '% $query'

        if(mysqli_num_rows($raw_results) > 0){ // if one or more rows are returned do following

            while($results = mysqli_fetch_array($raw_results)){
                // $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it does the loop
                ?>
                <div class="card border-dark m-3" style="max-width: 1100px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <?php
                            // Include the database configuration file
                            include 'login/dbconn.php';
                            // Get images from the database
                            $query = $conn->query("SELECT file_name FROM house where id = '$results[id]' " );

                            while ($row = $query->fetch_assoc()){
                                $imageURL = 'uploads/'.$row["file_name"];
                                ?>
                                <img src="<?= $imageURL; ?>" class="card-img" alt="...">
                            <?php } ?>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title ">HSE<?php echo $results['id']; ?></h5>
                                <p class="card-text"> <span style="color:blue">Address:</span> <?php echo $results['address']; ?></p>
                                <p class="card-text "><span style="color:blue">Rs.</span><?php echo $results['price']; ?> </p>
                                <p class="card-text"><span style="color:blue">Contact: </span><?php echo $results['contact']; ?></p>
                                <p class="card-text text-justify"><span style="color:blue">Details: </span><br><?php echo $results['details']; ?></p>



                            </div>
                        </div>
                    </div>
                </div>




                <?php
            }

        }
        else{ // if there is no matching rows do following
            echo "<br> <br> ";
            echo "No results";
        }

    }
    else{ // if query length is less than minimum

        echo "<br> <br> ";
        echo "Please enter value to search ";
    }
    ?>
</div>









<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>