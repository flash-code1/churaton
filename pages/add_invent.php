<?php
  $avt = 'invent';
  include("header.php");
?>
<style>
    
    .file-upload{display:block;text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
    .file-upload .file-select{display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
    .file-upload .file-select .file-select-button{background:#dce4ec;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
    .file-upload .file-select .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
    .file-upload .file-select:hover{border-color:#34495e;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
    .file-upload .file-select:hover .file-select-button{background:#34495e;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
    .file-upload.active .file-select{border-color:#3fa46a;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
    .file-upload.active .file-select .file-select-button{background:#3fa46a;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
    .file-upload .file-select input[type=file]{z-index:100;cursor:pointer;position:absolute;height:100%;width:100%;top:0;left:0;opacity:0;filter:alpha(opacity=0);}
    .file-upload .file-select.file-select-disabled{opacity:0.65;}
    .file-upload .file-select.file-select-disabled:hover{cursor:default;display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;margin-top:5px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
    .file-upload .file-select.file-select-disabled:hover .file-select-button{background:#dce4ec;color:#666666;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
    .file-upload .file-select.file-select-disabled:hover .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
    </style>
<!-- start of inventory -->
<div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <div class="col-xl-10">
                        <!-- ============================================================== -->
                        <!-- pageheader  -->
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                    <h2 class="pageheader-title">Add A Room </h2>
                                    <p class="pageheader-text">Create a New Room</p>
                                    <div class="page-breadcrumb">
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Inventory & News</a></li>
                                                <li class="breadcrumb-item"><a href="invent.php" class="breadcrumb-link">Manage Rooms</a></li>
                                                <li class="breadcrumb-item active" aria-current="page">Create</li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        <div class="page-section" id="overview">
                            <!-- ============================================================== -->
                            <!-- overview  -->
                            <!-- ============================================================== -->
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h2>Overview</h2>
                                    <p class="lead">Important Key Data Needed. <b>NB: Please Fill all Data</b> </p>
                                    <ul class="list-unstyled arrow">
                                        <li>Room Code.</li>
                                        <li>Room Name.</li>
                                        <li>Price.</li>
                                        <li>Number of Rooms.</li>
                                        <li>Image.</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end overview  -->
                            <!-- ============================================================== -->
                        </div>
                        <!-- ============================================================== -->
                        <!-- basic form  -->
                        <!-- ============================================================== -->
                        <form>
                        <div class="row">
                        
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="basicform">
                                    <h3 class="section-title">Room Details</h3>
                                    <p>Please Fill Carefully.</p>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Basic Form</h5>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <div  class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text"><i class="fas fa-folder-open"></i></span></span>
                                            <select class="form-control" name="group" required>
                                                <option value="0">Select Group</option>
                                                <option value="1">Master suite</option>
                                                <option value="2">Double Room</option>
                                                <option value="3">Single Room</option>
                                                <option value="4">Special Room</option>
                                            </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text"> <i class="fas fa-home"></i></span></span>
                                                <input type="text" placeholder="Room Number" name="room_code" class="form-control" required>
                                            </div>
                                            <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text"> <i class="fas fa-heart"></i></span></span>
                                                <input type="text" placeholder="Name" name="name" class="form-control" required>
                                            </div>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend"><span class="input-group-text">&#8358;</span></div>
                                                <input type="number" placeholder="Price" name="price" class="form-control" required>
                                                <div class="input-group-append"><span class="input-group-text">.00</span></div>
                                            </div>
                                            <div class="input-group mb-3">
                                            <script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>

<div class="file-upload">
  <div class="file-select">
    <div class="file-select-button" id="fileName">Pick Room Image</div>
    <div class="file-select-name" id="noFile">No file chosen...</div> 
    <input type="file" name="chooseFile" id="chooseFile" accept="image/*">
  </div>
</div>
<script>
    $('#chooseFile').bind('change', function () {
  var filename = $("#chooseFile").val();
  if (/^\s*$/.test(filename)) {
    $(".file-upload").removeClass('active');
    $("#noFile").text("No file chosen..."); 
  }
  else {
    $(".file-upload").addClass('active');
    $("#noFile").text(filename.replace("C:\\fakepath\\", "")); 
  }
});
</script>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <div class="input-group mb-3"><span class="input-group-prepend"><span class="input-group-text"> <i class="fas fa-pencil-alt"></i></span></span>
                                                <textarea required="" placeholder="Description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="section-block" id="select">
                                    <h3 class="section-title">Service & Configuration</h3>
                                    <p>Select your options carefully.</p>
                                </div>
                                <div class="card">
                                    <h5 class="card-header">Select Example</h5>
                                    <div class="card-body">
                                        <div class="form-group">
                                         <div class="row">
                                         <div class="input-group col-md-4"><span class="input-group-prepend"><span class="input-group-text"> <i class="fas fa-hourglass-half"></i></span></span>
                                                <input type="number" placeholder="How Many Rooms? eg. 10 " name="name" class="form-control" required>
                                            </div>
                                            <div class="input-group col-md-4"><span class="input-group-prepend"><span class="input-group-text"> <i class="far fa-user"></i></span></span>
                                                <input type="number" placeholder="Maximum Adult" name="name" class="form-control" required>
                                            </div>
                                            <div class="input-group col-md-4"><span class="input-group-prepend"><span class="input-group-text"> <i class="far fa-smile"></i></span></span>
                                                <input type="number" placeholder="Maximum Kids" name="name" class="form-control" required>
                                            </div>
                                         </div>
                                            <h4>Services</h4>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label"> <i class="fas fa-wifi"></i> WIFI</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label"> <i class="fas fa-tv"></i> TV</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label"> <i class="far fa-snowflake"></i> AC</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label"> <i class="fas fa-car"></i> Parking</span>
                                            </label>
                                            <label class="custom-control custom-checkbox custom-control-inline">
                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label"> <i class="far fa-life-ring"></i> Pool</span>
                                            </label>
                                        </div>
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                <button class="btn btn-space btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </form>
                        <!-- ============================================================== -->
                        <!-- end select options  -->
                        <!-- ============================================================== -->
                        <!-- end switch component -->
                        <!-- ============================================================== -->
                    </div>
                    <!-- ============================================================== -->
                    <!-- sidenavbar -->
                    <!-- ============================================================== -->
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
                        <div class="sidebar-nav-fixed">
                            <ul class="list-unstyled">
                                <li><a href="#overview" class="active">Overview</a></li>
                                <li><a href="#basicform">Filling</a></li>
                                <li><a href="#select">Submit</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end sidenavbar -->
                    <!-- ============================================================== -->
                </div>
            </div>
<!-- end of inventory -->
<?php
  include("footer.php");
?>