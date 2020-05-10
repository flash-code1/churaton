<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="description" content="Churaton Hotel">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Churaton | Hotel</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat+Alternates:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="design/x1/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="design/x1/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="design/x1/css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="design/x1/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="design/x1/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="design/x1/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="design/x1/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="design/x1/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="design/x1/css/style.css" type="text/css">
    </head>
    <!-- END OF CSS -->

    <!-- CSS LOADER -->
    <!-- body -->
    <body>
    <!-- preloader -->
<div id="preloder">
    <div class="loader"></div>
</div>
    <!-- Navigation header setup -->
    <header class="header-section">
        <div class="container-fluid">
            <div class="inner-header">
                <div class="logo">
                    <a href="index.php"><img src="img/logo.png" alt=""></a>
                </div>
                <div class="nav-right">
                    <a href="#" class="primary-btn">Reserve</a>
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li <?php if($_SERVER['SCRIPT_NAME']=="/index.php") { echo 'class="active"'; }?> class="active"><a href="./index.php">Home</a></li>
                        <li <?php if($_SERVER['SCRIPT_NAME']=="/about-us.php") { echo 'class="active"'; }?>><a href="./about-us.php">About</a></li>
                        <li <?php if($_SERVER['SCRIPT_NAME']=="/rooms.php") { echo 'class="active"'; }?>><a href="rooms.php">Rooms</a></li>
                        <li><a href="#">Services</a>
                            <ul class="drop-menu">
                                <li><a href="about-us.html">Reservation</a></li>
                                <li><a href="about-us.html">Resturant</a></li>
                                <li><a href="rooms.html">Gym Center</a></li>
                                <li><a href="services.html">Airport Pickup</a></li>
                            </ul>
                        </li>
                        <li <?php if($_SERVER['SCRIPT_NAME']=="/blog.php") { echo 'class="active"'; }?>><a href="./blog.php">News</a></li>
                        <li <?php if($_SERVER['SCRIPT_NAME']=="/contact.php") { echo 'class="active"'; }?>><a href="./contact.php">Contact</a></li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Navigation Header stops -->