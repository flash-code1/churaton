<?php
include("functions/db/connect.php");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="description" content="Churaton Hotel">
    <meta name="keywords" content="Hotel, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Churaton Hotel | <?php echo $title; ?></title>

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
                    <a href="rooms.php" class="primary-btn">Reserve</a>
                </div>
                <nav class="main-menu mobile-menu">
                    <ul>
                        <li  class="<?php if ($page == "home") { echo "active"; } ?>"><a href="index.php">Home</a></li>
                        <li class="<?php if ($page == "about") { echo "active"; } ?>"><a href="about-us.php">About</a></li>
                        <li class="<?php if ($page == "room") { echo "active"; } ?>"> <a href="rooms.php">Rooms</a></li>
                        <li class="<?php if ($page == "service") { echo "active"; } ?>"><a href="#">Services</a>
                            <ul class="drop-menu">
                                <li><a href="rooms.php">Reservation</a></li>
                                <li><a href="#">Resturant</a></li>
                                <li><a href="#">Gym Center</a></li>
                            </ul>
                        </li>
                        <li class="<?php if ($page == "news") { echo "active"; } ?>"><a href="./blog.php">News</a></li>
                        <li class="<?php if ($page == "contact") { echo "active"; } ?>"><a href="./contact.php">Contact</a></li>
                        <!-- <li class=""><a href="account/login.php">Admin</a></li> -->
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- Navigation Header stops -->