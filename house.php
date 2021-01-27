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
                <li class="nav-item"><a href="room.php" class="nav-link">Rooms</a></li>
                <li class="nav-item"><a href="apt.php" class="nav-link">Aparments</a></li>
                <li class="nav-item"><a href="house.php" class="nav-link">Building</a></li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Search form -->
                    <form class="form-inline ml-auto" action="searchHouse.php" method="GET">
                        <div class="md-form my-0">
                            <input  class="form-control mr-sm-2" type="text" name="query" placeholder="Search address" aria-label="Search">
                        </div>
                    </form>
                </div>
                <li class="nav-item"><a href="login/login.php" class="nav-link">Login</a></li>
                <li class="nav-item"><a href="login/register.php" class="nav-link">Register</a></li>
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<div class="container mt-5 pt-5 heading-section  ftco-animate">
    <span class="subheading ml-5 mt-3">Search Results for Buildings</span>
    <?php
    include_once("login/dbconn.php");
    $sql = "SELECT id, address,price, contact, details FROM house";
    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
    while( $record = mysqli_fetch_assoc($resultset) ) {
        ?>

        <div class="card border-dark m-3" style="max-width: 1100px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <?php
                    // Include the database configuration file
                    include 'login/dbconn.php';
                    // Get images from the database
                    $query = $conn->query("SELECT file_name FROM house where id = '$record[id]' " );

                    while ($row = $query->fetch_assoc()){
                        $imageURL = 'uploads/'.$row["file_name"];
                        ?>
                        <img src="<?= $imageURL; ?>" class="card-img" alt="...">
                    <?php } ?>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">HSE<?php echo $record['id']; ?></h5>
                        <p class="card-text"><span style="color:blue">Address: </span><?php echo $record['address']; ?></p>
                        <p class="card-text"><span style="color:blue">Price: </span>Rs. <?php echo $record['price']; ?></p>
                        <p class="card-text"><span style="color:blue">Contact: </span><?php echo $record['contact']; ?></p>
                        <p class="card-text text-justify"><span style="color:blue">Details: </span><br><?php echo $record['details']; ?></p>


                    </div>
                </div>
            </div>
        </div>


    <?php } ?>
</div>









<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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