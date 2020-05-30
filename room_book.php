<?php $page = "room"; $title = "Book Room"; ?>
<?php
include("main.php");
include("header.php");
session_start();
?>
<div class="hero-area set-bg other-page" data-setbg="img/pillow.jpg">
    </div>
    <!-- Hero Area Section End -->
<?php
if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
 $check_in = $_SESSION["check_in"];
 $check_out = $_SESSION["check_out"];
 $days_calc = floor((($_SESSION["diff_date"] / 60) / 60) / 24);
 $adult = $_SESSION["adult"];
 $kids = $_SESSION["kids"];
 $room = $_SESSION["room"];
 $sel_room = mysqli_query($connection, "SELECT * FROM room_inventory WHERE id = '$id'");
 $x = mysqli_fetch_array($sel_room);
 $room_name = $x["room_name"];
 $group = $_SESSION["group"];
 $room_code = $x["room_code"];
 $price = number_format(($x["price"] * $room) * $days_calc);
//  here we will get transaction id
$randms = $_SESSION["randms"];
?>
    <!-- Search Filter Section Begin -->
    <section class="search-filter">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="rooms.php" method="POST" class="check-form">
                        <center>
                        <h4>Booking</h4>
                        </center>
                        <!-- <div class="room-quantity">
                        </div> -->
                        <!-- <div class="room-selector">
                        </div> -->
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Search Filter Section End -->
<?php
// posting to the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $c_i = $_POST["check_in"];
    $c_o = $_POST["check_out"];
    $r_t = $_POST["room_type"];
    $ad = $_POST["adult"];
    $kd = $_POST["kids"];
    $no_room = $_POST["no_room"];
    // client
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $c_time = $_POST["c_time"];
    $pay_t = $_POST["pay_t"];
    $ref_id = $_POST["ref_id"];
    $m_price = $price;
    $cpt = 0;
    if ($_POST["g_name"] != "") {
        $cpt = 1;
        $g_name = $_POST["g_name"];
    } else {
        $g_name = "No Guest";
        $cpt = 0;
    }
    $note = $_POST["note"];
    $ts = date('Y-m-d H:i:s');
    $ts2 = date('Y-m-d');
    $bookin = mysqli_query($connection, "SELECT * FROM booking WHERE reference_id =  '$randms'");
    $resx1 = mysqli_num_rows($bookin);
  if ($resx1 == 0) {
    // here we will write code to push to booking database
    $booking = mysqli_query($connection, "INSERT INTO `booking` (`room_type`, `check_in`, `check_out`, `room_no`, `reference_id`, `fullname`, `email`,
    `phone`, `amount`, `payment_status`, `note`, `date`, `date_and_time`, `time`, 
    `booking_for`, `primary_guest_name`, `plan`, `adult`, `kids`, `no_of_room`, `payment_type`) VALUES 
    ('{$r_t}', '{$c_i}', '{$c_o}', '{$id}', '{$ref_id}', '{$full_name}', '{$email}', 
    '{$phone}', '{$m_price}', 'Pending', '{$note}', '{$ts2}', '{$ts}', '{$c_time}',
    '{$cpt}', '{$g_name}',
    NULL, '{$ad}', '{$kd}', '{$no_room}', '{$pay_t}')");
    if ($booking) {
        // affect the inventory
        $update_invent = mysqli_query($connection, "INSERT INTO `booking_date` (room_id, booked_on, booked_out) VALUES ('{$id}', '{$c_i}', '{$c_o}')");
        if ($update_invent) {
            echo '<script type="text/javascript">
                               $(document).ready(function(){
                                   swal({
                                       type: "success",
                                       title: "Booked Successfully",
                                       text: "Check Your Mail For Details and Invoice",
                                       showConfirmButton: false,
                                       timer: 5000
                                   })
                               });
                               </script>
                               ';
        } else {
            echo '<script type="text/javascript">
                               $(document).ready(function(){
                                   swal({
                                       type: "error",
                                       title: "Booking Failed",
                                       text: "This Booking Failed - 310 ERROR",
                                       showConfirmButton: false,
                                       timer: 5000
                                   })
                               });
                               </script>
                               ';
        }
    } else {
        // display an error
        echo '<script type="text/javascript">
        $(document).ready(function(){
            swal({
                type: "error",
                title: "Booking Failed",
                text: "This Booking Failed - 399 ERROR",
                showConfirmButton: false,
                timer: 5000
            })
        });
        </script>
        ';
        if ($connection->error) {
                      try {
                          throw new Exception("MYSQL error $connection->error <br> $booking ", $mysqli->error);
                      } catch (Exception $e) {
                          echo "Error No: ".$e->getCode()." - ".$e->getMessage() . "<br>";
                          echo ($e->getTraceAsString());
                      }
                  }
    }
} else {
    echo '<script type="text/javascript">
        $(document).ready(function(){
            swal({
                type: "error",
                title: "Booked Already - Check Your Mail",
                text: "Check your Mail/Spam We will get back to you soon",
                showConfirmButton: false,
                timer: 5000
            })
        });
        </script>
        ';
}
}
?>
      <!-- Contact Section Begin -->
      <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-title">
                        <div class="section-title">
                            <span>CHURATON HOTELS LTD</span>
                            <h2>Booking</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <form method="POST" class="contact-form">
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="">Check In</label>
                                <input type="date" name="check_in" value="<?php echo $check_in;?>" placeholder="Check In" required readonly>
                            </div>
                            <div class="col-lg-6">
                            <label for="">Check Out</label>
                                <input type="date" name="check_out" value="<?php echo $check_out; ?>" placeholder="Check Out" required readonly>
                            </div>
                            <div class="col-lg-4">
                            <label for="">Room Type</label>
                                <input name="room_type" type="text" value="<?php echo $room_name; ?>" placeholder="Room Type" required readonly>
                            </div>
                            <div class="col-lg-2">
                            <label for="">Adult</label>
                                <input type="number" name="adult" value="<?php echo $adult;?>" placeholder="No. of Adult" required readonly>
                            </div>
                            <div class="col-lg-2">
                            <label for="">Children</label>
                                <input type="number" name="kids" value="<?php echo $kids;?>" placeholder="No. of Kids" required readonly>
                            </div>
                            <div class="col-lg-4">
                            <label for="">No. Room(s)</label>
                                <input type="number" name="no_room" value="<?php echo $room;?>" placeholder="No. of Room" required readonly>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <br>
                            <div class="col-lg-12">
                            <label for="">Full-Name *</label>
                                <input type="text" name="full_name" placeholder="Enter FullName" required>
                            </div>
                            <div class="col-lg-6">
                            <label for="">E-mail *</label>
                                <input type="email" name="email" placeholder="Enter E-mail" required>
                            </div>
                            <div class="col-lg-6">
                            <label for="">Phone *</label>
                                <input type="number" name="phone" placeholder="Enter Phone" required>
                            </div>
                            <!-- next type -->
                            <div class="col-lg-6">
                            <label for="">Check In Time</label>
                                <input type="time" name="c_time" placeholder="Your email" required>
                            </div>
                            <div class="col-lg-6">
                            <label for="">Payment Type</label>
                             <select class="" name="pay_t" style="width: 100%;" id="stm">
                                 <option value="1">Cash</option>
                                 <option value="2">Card</option>
                             </select>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-6">
                            <label for="">Reference ID (Click The ID to Copy )</label>
                                <input onclick="myFunction()" name="ref_id" id="myInput" value="<?php echo $randms; ?>" type="text" placeholder="Your email" readonly>
<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  alert("Reference ID Copied, It Will also be Sent to Your Mail: " + copyText.value);
}
</script>

                            </div>
                            <div class="col-lg-6">
                            <label for="">Amount Due</label>
                            <input type="text" value="&#x20A6; <?php echo $price;?>" readonly>
                            </div>
                            <div class="col-lg-12">
                                <br>
                                <textarea name="note" placeholder="Leave a Note"></textarea>
                            </div>
                            <div class="col-lg-12">
                                <br>
                            <p>Enter Details Below if Booking For Someone</p>
                            <label for="">Guest Full-Name</label>
                                <input type="text" name="g_name" placeholder="Guest First and Last Name">
                            </div>
                        </div>
                        <button type="submit" class="primary-btn">Reserve</button>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="info-box">
                        <img src="img/contact-logo.png" alt="">
                        <!-- company logo -->
                        <p>Invoice Summary #<?php echo $randms; ?></p>
                        <ul>
                            <li>Name: <?php echo $room_name; ?> </li>
                            <li>Room Number: <?php echo $room_code; ?> </li>
                            <li>No. of Room(s): <?php echo $room; ?></li>
                            <li>Amount Due: &#x20A6;<?php echo $price; ?></li>
                            <li>VAT: 0.2%</li>
                        </ul>
                        <a href="#" class="primary-btn">Print Invoice</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    } else {
        echo "404 YOU NEED TO MAKE RESERVATION OF A ROOM";
    }
    ?>
<?php
include("footer.php");
?>