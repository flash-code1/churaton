<?php
  $avt = 'invent';
  include("header.php");
//   session_start();
?>
<?php
// If it is successfull, It will show this message
if (isset($_GET["message101"])) {
    $key = $_GET["message101"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "success",
            title: "Room Creation",
            text: "Successfully Created",
            showConfirmButton: false,
            timer: 2000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = null;
}
// If it is not successfull, It will show this message
else if (isset($_GET["message404"])) {
  $key = $_GET["message404"];
  // $out = $_SESSION["lack_of_intfund_$key"];
  echo '<script type="text/javascript">
  $(document).ready(function(){
      swal({
          type: "error",
          title: "Room Creation",
          text: "Error in Creation",
          showConfirmButton: false,
          timer: 2000
      })
  });
  </script>
  ';
  $_SESSION["lack_of_intfund_$key"] = null;
}
?>
<!-- body of inventory -->
 <!-- ============================================================== -->
 <div class="dashboard-wrapper">
<div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Manage Inventory (Rooms) </h2>
                            <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Inventory & News</a></li>
                                        <li class="breadcrumb-item active">Create & Manage</li>
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
                    <!-- ============================================================== -->
                    <!-- data table multiselects  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-header">
                            <?php
                              $query = "SELECT * FROM `room_inventory`";
                              $result = mysqli_query($connection, $query);
                              if ($result) {
                                $inr = mysqli_num_rows($result);
                               }?> 
                                <h5 class="mb-0">Room Management - Total Rooms(<?php echo $inr; ?>) </h5>
                                <p>Create | Delete | Flag | Post Hotel Rooms. click to add below</p>
                                <div style="float: right;">
                                <a href="add_invent.php" class="btn btn-dark btn-rounded btn-lg">Add a Room</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                        <?php
                                          $resultx = mysqli_query($connection, $query);
                                        ?>
                                            <tr>
                                                <th>Group</th>
                                                <th>Room Number</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Active</th>
                                                <th>Rating</th>
                                                <th>Total Per. Room</th>
                                                <th>Adult</th>
                                                <th>Kids</th>
                                                <th>Status</th>
                                                <th>Review</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (mysqli_num_rows($resultx) > 0) {
                                      while($row = mysqli_fetch_array($resultx, MYSQLI_ASSOC)) {?>
                                            <tr>
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
                                                <td><?php echo $rgm; ?></td>
                                                <td><?php echo $row["room_code"]; ?></td>
                                                <td><?php echo $row["room_name"]; ?></td>
                                                <td><?php echo number_format($row["price"], 2); ?></td>
                                                <?php
                                                $active = $row["is_active"];
                                                if ($active == 1) {
                                                    $is_active = '<i class="fas fa-check" style="color: green"></i>';
                                                } else {
                                                    $is_active = '<i class="far fa-times-circle" style="color:red"></i>';
                                                }
                                                ?>
                                                <td><?php echo $is_active; ?>  </td>
                                                <?php
                                                ?>
                                                <td><?php echo $row["star"]." Stars"; ?></td>
                                                <td><?php echo $row["max_users"]. " Customers"; ?></td>
                                                <td><?php echo $row["max_adult"]; ?></td>
                                                <td><?php echo $row["max_kids"]; ?></td>
                                                <?php
                                                $stat = $row["status"];
                                                if ($stat == 0) {
                                                    $st = "Avaliable";
                                                } else {
                                                    $st = "Booked";
                                                }
                                                ?>
                                                <td><?php echo $st; ?></td>
                                                <td> <a href="#" class="btn btn-rounded btn-primary">overview</a></td>
                                            </tr>
                                            <?php }
                                                }
                                             else {
                                            echo "0 Rooms";
                                              }
                                             ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                                <th>Group</th>
                                                <th>Room Number</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Active</th>
                                                <th>Total No./Occupant</th>
                                                <th>Max Per. Room</th>
                                                <th>Review</th>
                                            </tr>

                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end data table multiselects  -->
                    <!-- ============================================================== -->
                </div>
            </div>
<!-- end of inventory -->
<?php
  include("footer.php");
?>