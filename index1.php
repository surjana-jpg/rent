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
        <a class="navbar-brand" href="index1.php">myRent</a>
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

                    </li>



            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text justify-content-center align-items-center">
            <div class="col-lg-8 col-md-6 ftco-animate d-flex align-items-end">
                <div class="text text-center">
                    <h1 class="mb-4">The Simplest <br>Way to Find Property</h1>
                    <p style="font-size: 20px ;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mouse">
        <a href="#" class="mouse-icon">
            <div class="mouse-wheel"><span class="ion-ios-arrow-round-down"></span></div>
        </a>
    </div>
</div>

<section class="ftco-section ftco-no-pb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Our Services</span>
                <h2 class="mb-2">The smartest way to buy a home</h2>
            </div>
        </div>
        <div class="row d-flex">
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-center">
                    <div class="icon d-flex justify-content-center align-items-center"><img src="images/browse.png" height="50px" alt=""></div>
                    <div class="media-body py-md-4">
                        <h3>Browse</h3>
                        <p> Helps you browse for your property requirements.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-center">
                    <div class="icon d-flex justify-content-center align-items-center"><img src="images/add.png" height="50px" alt=""></div>
                    <div class="media-body py-md-4">
                        <h3>Advertise</h3>
                        <p>Helps you advertise your property for potential buyers.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-block text-center">
                    <div class="icon d-flex justify-content-center align-items-center"><img src="images/hand.png" height="50px" alt=""></div>
                    <div class="media-body py-md-4">
                        <h3>Connect</h3>
                        <p>Connects property buyers and sellers.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<section class=" mt-3 ftco-section ftco-degree-bg services-section img mx-md-5" style="background-image: url(images/bg_2.jpg);">
    <div class="overlay"></div>
    <div class="container">
        <div class="row justify-content-start mb-5">
            <div class="col-md-6 text-center heading-section heading-section-white ftco-animate">
                <span class="subheading">Advertise</span>
                <h2 class="mb-3">Your Property</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services services-2">
                            <a href="addRoom.php"><div class="media-body py-md-4 text-center">
                                    <div class="icon mb-3 d-flex align-items-center justify-content-center"><span><img src="images/room.png" height="50px"
                                                                                                                       alt=""></span></div>
                                    <h3>Add Room Details</h3>
                                    <p><span style="opacity: 0">A small river named Duden flows by their place and supplies it with the necessary regelialia.</span></p>
                                </div></a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services services-2">
                            <a href="addApt.php"><div class="media-body py-md-4 text-center">
                                    <div class="icon mb-3 d-flex align-items-center justify-content-center"><span><img src="images/apart.png " height="50px" alt=""></span></div>
                                    <h3>Add Apartment Details</h3>
                                    <p><span style="opacity: 0">A small river named Duden flows by their place and supplies it with the necessary regelialia.</span></p>
                                </div></a>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                        <div class="media block-6 services services-2">
                            <a href="addHouse.php"><div class="media-body py-md-4 text-center">
                                    <div class="icon mb-3 d-flex align-items-center justify-content-center"><span><img src="images/house.png " height="50px" alt=""></span></div>
                                    <h3>Add Building Details</h3>
                                    <p><span style="opacity: 0">A small river named Duden flows by their place and supplies it with the necessary regelialia.</span></p>
                                </div></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







<footer class="ftco-footer ftco-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">myRent</h2>
                    <p>Let us find a place for you.</p>


                </div>
            </div>

            <div class="col-md">
                <div class="ftco-footer-widget mb-4">
                    <h2 class="ftco-heading-2">Have Questions?</h2>
                    <p>Contact us at</p>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="icon icon-map-marker"></span><span class="text">Kathmandu, Nepal</span></li>
                            <li><a href="#"><span class="icon icon-phone"></span><span class="text">986478533</span></a></li>
                            <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text">myRent@domain.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>



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