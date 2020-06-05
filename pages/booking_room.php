<?php
  $avt = 'invent';
  include("header.php");
?>
<?php
// here we will use alert
?>
<div class="dashboard-wrapper">
<div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Customer Booking/Orders</h2>
                            <p class="pageheader-text">Order by Caleder.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Calendar</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <?php
                $getbook = mysqli_query($connection, "SELECT * FROM `booking`");
                // $x = mysqli_fetch_array($getbook);
                while($row = mysqli_fetch_array($getbook))
                {
                $check_in = $row["check_in"];
                $xy = $row["check_out"];
                // qwerty
                $date1 = str_replace('-', '/', $xy);
                $check_out = date('Y-m-d',strtotime($date1 . "+1 days"));
                // ed
                $fullname = $row["fullname"];
                $email = $row["email"];
                $c_d = date("Y-m-d");
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
                $getall[] = array('title'=>''.$fullname.' '.$email.' - Reference ID .'.$row['reference_id'].'',
                    'url'=>'single_book.php?edit='.$row['id'].'',
                     'start'=>''.$check_in.'',
                    'end'=>''.$check_out.'',
                    'backgroundColor'=>$bg,
                    'borderColor'=>$bc);
                }
                ?>
                <!-- ============================================================== -->
                <!-- simple calendar -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div id='calendarx1'></div>
                            </div>
                            <script>
                                $(document).ready(function() {
$('#calendarx1').fullCalendar({
    header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay,listWeek'
    },
    defaultDate: '<?php echo date("Y-m-d"); ?>',
    navLinks: true, // can click day/week names to navigate views
    editable: false,
    eventLimit: true, // allow "more" link when too many events
    events:<?php echo json_encode($getall); ?>
});

}); 
                            </script>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end simple calendar -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- data table multiselects  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                            <?php
                              $query = "SELECT * FROM `booking`";
                              $result = mysqli_query($connection, $query);
                              if ($result) {
                                $inr = mysqli_num_rows($result);
                               }?> 
                                <h5 class="mb-0">Booking Management - Total Room(s) Booked(<?php echo $inr; ?>) </h5>
                                <p>Booking</p>
                                <div style="float: right;">
                                <a href="#" class="btn btn-dark btn-rounded btn-lg">Add Manual Booking</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <?php
                                          $getbook = mysqli_query($connection, "SELECT * FROM `booking`");
                                        ?>
                                            <tr>
                                                <th>Reference Id</th>
                                                <th>Check In</th>
                                                <th>Check Out</th>
                                                <th>Price</th>
                                                <th>Payment Status</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Guest</th>
                                                <th>Review</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (mysqli_num_rows($getbook) > 0) {
                                      while($row = mysqli_fetch_array($getbook, MYSQLI_ASSOC)) {
                                        $check_in = $row["check_in"];
                                        $xy = $row["check_out"];
                                        // qwerty
                                        $date1 = str_replace('-', '/', $xy);
                                        $check_out = date('Y-m-d',strtotime($date1 . "+1 days"));
                                        // ed
                                        $fullname = $row["fullname"];
                                        $email = $row["email"];
                                        $c_d = date("Y-m-d");
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
                                          ?>
                                            <tr>
                                                <td><?php echo $row["reference_id"]; ?></td>
                                                <td><?php echo $check_in; ?></td>
                                                <td><?php echo $xy; ?></td>
                                                <td><?php echo number_format($row["amount"], 2); ?></td>
                                                <?php
                                                    $is_active = '<i class="far fa-dot-circle" style="color: '.$bg.'"></i>';
                                                    $pt = $row["payment_type"];
                                                    if ($pt == 1) {
                                                        $ptr = "Cash";
                                                    } else {
                                                        $ptr = "Card";
                                                    }
                                                ?>
                                                <td><?php echo $is_active.' '. $ptr; ?>  </td>
                                                <?php
                                                ?>
                                                <td><?php echo $fullname; ?></td>
                                                <td><?php echo $email; ?></td>
                                                <td><?php echo $row["primary_guest_name"]; ?></td>
                                                <td> <a href="single_book.php?edit=<?php echo $row["id"]; ?>" class="btn btn-rounded btn-primary">overview</a></td>
                                            </tr>
                                            <?php }
                                                }
                                             else {
                                            echo "0 Booking";
                                              }
                                             ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table multiselects  -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- end events calendar -->
                <!-- ============================================================== -->
            </div>
<!-- end of inventory -->
<?php
  include("footer.php");
?>
