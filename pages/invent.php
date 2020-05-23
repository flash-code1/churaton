<?php
  $avt = 'invent';
  include("header.php");
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
                                <h5 class="mb-0">Room Management - Total Rooms() </h5>
                                <p>Create | Delete | Flag | Post Hotel Rooms. click to add below</p>
                                <div style="float: right;">
                                <a href="add_invent.php" class="btn btn-dark btn-rounded btn-lg">Add a Room</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example3" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
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
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Single</td>
                                                <td>COD12</td>
                                                <td>Moon Landing</td>
                                                <td>$320,800</td>
                                                <td> <i class="fas fa-check" style="color: green"></i> </td>
                                                <td>10/5</td>
                                                <td>2</td>
                                                <td> <a href="#" class="btn btn-rounded btn-primary">overview</a></td>
                                            </tr>
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