<?php $page = "room"; $title = "Rooms";?>
<?php
include("header.php");
?>

<!-- Hero Area Section Begin -->
<div class="hero-area set-bg other-page" data-setbg="img/lux2.jpg">
    </div>
    <!-- Hero Area Section End -->

    <!-- Search Filter Section Begin -->
    <?php include("check.php") ?>
    <!-- Search Filter Section End -->
    <?php
    if (isset($_POST["check_out"]) && isset($_POST["check_in"]) && isset($_POST["group"]) && isset($_POST["room"])) {
        // check a function
        $check_in = $_POST["check_in"];
        $main_c_i = strtotime($check_in);
        $check_out = $_POST["check_out"];
        $main_c_o = strtotime($check_out);
        // adding to db
        $newformatCI = date('Y-m-d',$main_c_i);
        $newformatCO = date('Y-m-d',$main_c_o);
        $adult = $_POST["adult"];
        $kids = $_POST["kids"];
        $room = $_POST["room"];
        $group = $_POST["group"];
        if ($group == 0 || $group == "0") {
            $query = "SELECT * FROM `room_inventory` WHERE is_active = '1' && (((booked_out < '$newformatCI') OR (booked_out IS NULL OR booked_in IS NULL)) && (max_adult >= '$adult' && max_kids >= '$kids'))";
        } else {
        $query = "SELECT * FROM `room_inventory` WHERE is_active = '1' && (((booked_out < '$newformatCI') OR (booked_out IS NULL OR booked_in IS NULL)) && (max_adult >= '$adult' && max_kids >= '$kids')) && room_group = '$group'";
        // echo "Check in : ".$newformatCI;
        }
        $result = mysqli_query($connection, $query);
    } else {
        $query = "SELECT * FROM `room_inventory` WHERE is_active = '1' && status = '0'";
        $result = mysqli_query($connection, $query);
    }
    ?>
    <!-- Room Section Begin -->
    <section class="room-section">
        <div class="container-fluid">
            <?php if (mysqli_num_rows($result) > 0) {
                $rows = 0;
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    $bgcolor = ['','order-lg-2'][$rows++ % 2];
                ?>
            <div class="row">
                <div class="col-lg-6 <?php echo $bgcolor; ?>">
                    <div class="ri-slider-item">
                        <div class="ri-sliders owl-carousel">
                            <div class="single-img set-bg" data-setbg="functions/room/<?php echo $row["img"] ?>"></div>
                            <!-- <div class="single-img set-bg" data-setbg="room/2.jpg"></div>
                            <div class="single-img set-bg" data-setbg="room/5.jpg"></div> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ri-text left-side">
                        <div class="section-title">
                            <div class="section-title">
                            <?php
                                                $rg = $row["room_group"];
                                                if ($rg == 1) {
                                                    $rgm = "Master suite";
                                                } else if ($rg == 2) {
                                                    $rgm = "Double Room";
                                                } else if ($rg == 3) {
                                                    $rgm = "Single Room";
                                                } else if ($rg == 4) {
                                                    $rgm = "Special Room";
                                                }
                                                ?>
                                <span><?php echo $rgm; ?></span>
                               
                                <h2><?php echo $row["room_name"]; ?></h2>
                            </div>
                            <p><?php echo $row["description"];?></p>
                            <div class="ri-features">
                                <?php
                                $tv = $row["tv"];
                                $wifi = $row["wifi"];
                                $ac = $row["ac"];
                                $park = $row["parking"];
                                $pool = $row["pool"];
                                if ($tv == 1) {
                                    echo '
                                    <div class="ri-info">
                                    <i class="flaticon-019-television"></i>
                                    <p>Smart TV</p>
                                </div>
                                    ';
                                }
                                if ($wifi == 1) {
                                    echo '<div class="ri-info">
                                    <i class="flaticon-029-wifi"></i>
                                    <p>High Wi-fi</p>
                                </div> ';
                                }
                                if ($ac == 1) {
                                    echo ' <div class="ri-info">
                                    <i class="flaticon-003-air-conditioner"></i>
                                    <p>AC</p>
                                </div>';
                                }
                                if ($park == 1) {
                                    echo ' <div class="ri-info">
                                    <i class="flaticon-036-parking"></i>
                                    <p>Parking</p>
                                </div>';
                                }
                                if ($pool == 1) {
                                    echo '  <div class="ri-info">
                                    <i class="flaticon-007-swimming-pool"></i>
                                    <p>Pool</p>
                                </div>';
                                }
                                ?>
                            </div>
                            <a href="#" class="primary-btn">Make a Reservation</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
             }
             else {
               echo "0 Rooms";
             }
            ?>
            <!-- <div class="row">
                <div class="col-lg-6 order-lg-2">
                    <div class="ri-slider-item">
                        <div class="ri-sliders owl-carousel">
                            <div class="single-img set-bg" data-setbg="room/4.jpg"></div>
                            <div class="single-img set-bg" data-setbg="room/6.jpg"></div>
                            <div class="single-img set-bg" data-setbg="room/7.jpg"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="ri-text left-side">
                        <div class="section-title">
                            <div class="section-title">
                                <span>a memorable holliday</span>
                                <h2>Twin Room With Seaview</h2>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                                viverra maecenas. Donec in sodales dui, a blandit nunc. Pellentesque id eros venenatis,
                                sollicitudin neque sodales, vehicula nibh. Nam massa odio, porttitor vitae efficitur
                                non, ultricies volutpat tellus.</p>
                            <div class="ri-features">
                                <div class="ri-info">
                                    <i class="flaticon-019-television"></i>
                                    <p>Smart TV</p>
                                </div>
                                <div class="ri-info">
                                    <i class="flaticon-029-wifi"></i>
                                    <p>High Wi-fi</p>
                                </div>
                                <div class="ri-info">
                                    <i class="flaticon-003-air-conditioner"></i>
                                    <p>AC</p>
                                </div>
                                <div class="ri-info">
                                    <i class="flaticon-036-parking"></i>
                                    <p>Parking</p>
                                </div>
                                <div class="ri-info">
                                    <i class="flaticon-007-swimming-pool"></i>
                                    <p>Pool</p>
                                </div>
                            </div>
                            <a href="#" class="primary-btn">Make a Reservation</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="ri-slider-item">
                        <div class="ri-sliders owl-carousel">
                            <div class="single-img set-bg" data-setbg="room/1.jpg"></div>
                            <div class="single-img set-bg" data-setbg="room/2.jpg"></div>
                            <div class="single-img set-bg" data-setbg="room/3.jpg"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="ri-text">
                        <div class="section-title">
                            <div class="section-title">
                                <span>a memorable holliday</span>
                                <h2>Double Room</h2>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo
                                viverra maecenas. Donec in sodales dui, a blandit nunc. Pellentesque id eros venenatis,
                                sollicitudin neque sodales, vehicula nibh. Nam massa odio, porttitor vitae efficitur
                                non, ultricies volutpat tellus.</p>
                            <div class="ri-features">
                                <div class="ri-info">
                                    <i class="flaticon-019-television"></i>
                                    <p>Smart TV</p>
                                </div>
                                <div class="ri-info">
                                    <i class="flaticon-029-wifi"></i>
                                    <p>High Wi-fii</p>
                                </div>
                                <div class="ri-info">
                                    <i class="flaticon-003-air-conditioner"></i>
                                    <p>AC</p>
                                </div>
                                <div class="ri-info">
                                    <i class="flaticon-036-parking"></i>
                                    <p>Parking</p>
                                </div>
                                <div class="ri-info">
                                    <i class="flaticon-007-swimming-pool"></i>
                                    <p>Pool</p>
                                </div>
                            </div>
                            <a href="#" class="primary-btn">Make a Reservation</a>
                        </div>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Room Section End -->

    <!-- End for Count -->
<?php
include("footer.php");
?>