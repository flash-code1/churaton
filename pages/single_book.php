<?php
  $avt = 'Customer';
  include("header.php");
//   session_start();
?>
<!-- body of inventory -->
<?php
if (isset($_GET["edit"])) {
    $id = $_GET["edit"];
    $getbook = mysqli_query($connection, "SELECT * FROM `booking` WHERE id ='$id'");
    $row = mysqli_fetch_array($getbook);
                $check_in = $row["check_in"];
                $xy = $row["check_out"];
                // qwerty
                $date1 = str_replace('-', '/', $xy);
                $check_out = date('Y-m-d',strtotime($date1 . "+1 days"));
                // ed
                $fullname = $row["fullname"];
                $email = $row["email"];
                $phone = $row["phone"];
                $c_d = date("Y-m-d");
                $price = $row["amount"];
                $room_id = $row["room_no"];
                $getroom = mysqli_query($connection, "SELECT * FROM `room_inventory` WHERE id ='$room_id'");
                $gt = mysqli_fetch_array($getroom);
                $room_name = $gt["room_name"];
                $room_code = $gt["room_code"];
                $decription = $gt["description"];
                $room_price = $gt["price"];
                $no_of_room = $row["no_of_room"];
                // GET A TEST FOR COLOR
                $payment_stat = $row["payment_status"];
                if ($xy >= $c_d && $payment_stat == 'Pending') {
                    // color
                    $bg = '#F6591A';
                    $bc = '#F6591A';
                } else if ($xy >= $c_d && $payment_stat == 'Paid') {
                    $bg = '#2F925B';
                    $bc = '#2F925B ';
                } else if ($xy < $c_d && $payment_stat == 'Paid') {
                    $bg = '#909090';
                    $bc = '#909090';
                } else if ($xy < $c_d && $payment_stat == 'Pending') {
                    $bg = '#871517';
                    $bc = '#871517';
                } else {
                    $bg = '#871517';
                    $bc = '#871517';
                }
}
?>
 <!-- ============================================================== -->
 <div class="dashboard-wrapper">
<div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Customer Invoice </h2>
                            <p class="pageheader-text">Customers Payment Status.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="booking_room.php" class="breadcrumb-link">Booking</a></li>
                                        <li class="breadcrumb-item active">View Invoice</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                        <div class="offset-xl-2 col-xl-8 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-header p-4">
                                    <img src="https://firebasestorage.googleapis.com/v0/b/churaton-6e682.appspot.com/o/logo.jpeg?alt=media&token=23d88927-590b-4dd7-aa22-2c3981267ba7" alt="" height="70px" width="90px">
                                     <a class="pt-2 d-inline-block" href="https://www.churaton.com">CHURATON HOTEL NIG LTD</a>
                                   
                                    <div class="float-right"> <h3 class="mb-0">Invoice #<?php echo $row["reference_id"] ?></h3>
                                    <?php
                                     $pt = $row["payment_type"];
                                     if ($pt == 1) {
                                         $ptr = "Cash";
                                     } else {
                                         $ptr = "Card";
                                     }
                                    ?>
                                    <p>Payment Status: <?php echo $payment_stat?> <i class="far fa-dot-circle" style="color: <?php echo $bg?>"></i> - <?php echo $ptr ?> </p>
                                    <?php echo date('Y-m-d'); ?>
                                </div>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">From:</h5>                                            
                                            <h3 class="text-dark mb-1"><?php echo strtoupper($username); ?> - Churaton Hotel</h3>

                                            <div>Email: <?php echo $email; ?></div>
                                            <div>Phone: +(234)-806-282-7157</div>
                                        </div>
                                        <div class="col-sm-6">
                                            <h5 class="mb-3">To:</h5>
                                            <h3 class="text-dark mb-1"><?php echo strtoupper($fullname); ?></h3> 
                                            <div>Email: <?php echo $email; ?></div>
                                            <div>Phone: <?php echo $phone; ?></div>
                                        </div>
                                    </div>
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th class="center">#</th>
                                                    <th>Date</th>
                                                    <th>Room no. - Name</th>
                                                    <th>Description</th>
                                                    <th class="right">Cost</th>
                                                    <th class="center">Qty</th>
                                                    <th class="right">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $date = $check_in;
                                                $end_date = $check_out;
                                                $xm = 1;
                                                $v = 0;
                                                $sum = 0;
                                                $rm_p = ($room_price * $no_of_room);
                                                while (strtotime("+1 day", strtotime($date)) <= strtotime($end_date)) { 
                                                ?>
                                                <tr>
                                                    <td class="center"><?php echo $xm++; ?></td>
                                                    <td class="left strong"><?php echo $date; ?></td>
                                                    <td class="left strong"><?php echo $room_code. ' - ' . $room_name; ?></td>
                                                    <td class="left"><?php echo $decription; ?></td>
                                                    <td class="right">&#8358; <?php echo number_format($rm_p, 2) ?></td>
                                                    <td class="center"><?php echo $no_of_room; ?></td>
                                                    <td class="right">&#8358; <?php echo  number_format($v+=$rm_p, 2);?></td>
                                                </tr>
                                                <?php
                                                 $date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-5">
                                        </div>
                                        <div class="col-lg-4 col-sm-5 ml-auto">
                                            <table class="table table-clear">
                                                <tbody>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Subtotal</strong>
                                                        </td>
                                                        <td class="right">&#8358; <?php echo number_format($v,2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Discount (0%)</strong>
                                                        </td>
                                                        <td class="right">&#8358; <?php echo number_format($v,2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">VAT (0%)</strong>
                                                        </td>
                                                        <td class="right">&#8358; <?php echo number_format($v,2); ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="left">
                                                            <strong class="text-dark">Total</strong>
                                                        </td>
                                                        <td class="right">
                                                            <strong class="text-dark">&#8358; <?php echo number_format($v,2); ?></strong>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                <div style="float: right;">
                                <a href="#" class="btn btn-success btn-rounded btn-lg">Print Invoice</a>
                                </div>
                                    <p class="mb-0">No. 30 SOKODE CRESCENT,  OFF MICHAEL OPARA STREET <br />WUSE ZONE 5, ABUJA</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
<!-- end of inventory -->
<?php
  include("footer.php");
?>