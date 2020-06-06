<!doctype html>
<html lang="en">
   
<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  if($_SESSION["usertype"] == "staff"){
    header("location: ../pages/dashboard.php");
    exit;
  } 
  elseif($_SESSION["usertype"] == "admin"){
    header("location: ../pages/dashboard.php");
    exit;
  }
//   elseif($_SESSION["usertype"] == "staff"){
//       if($_SESSION["employee_status"] == "Employed"){
//         header("location: mfi/index.php");
//       }
//       elseif($_SESSION["employee_status"] == "Decommisioned"){
//         $err = "Sorry, you are not allowed to login";
//         $password = "";
//       }
//     exit;
//   }
}
 
// Include config file
require_once "../functions/db/config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
$err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter Username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, email, user_type, password FROM users WHERE users.username = ?";
        // $sqlj = "SELECT users.id, users.int_id, users.username, users.fullname, users.usertype, users.password, org_role, display_name FROM staff JOIN users ON users.id = staff.user_id WHERE users.username = "sam"";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $email, $usertype, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            session_regenerate_id();
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;
                            $_SESSION["email"] = $email;
                            $_SESSION["usertype"] = $usertype;
                            // $_SESSION["lastname"] = $lastname;
                            session_write_close();                            
                            //run a quick code to show active user
                            // Redirect user to welcome page
                            if ($stmt->num_rows ==1 && $_SESSION["usertype"] =="staff") {
                              header("location: ../pages/dashboard.php");
                            }elseif ($stmt->num_rows ==1 && $_SESSION["usertype"]=="staff"){
                                header("location: ../pages/dashboard.php");
                            //   header("location: ./mfi/admin/dashboard.php");
                            }
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that Username.";
                }
            } else{
                $username_err = "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
    }
    
    // Close connection
    mysqli_close($link);
    mysqli_stmt_close($stmt);
}

?>

<?php
include("../main.php");
?>
<?php
if (isset($_GET["message1"])) {
    $key = $_GET["message1"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
  if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "success",
            title: "Done",
            text: "Account Creation Successful, Check Mail For Confirmation",
            showConfirmButton: false,
            timer: 5000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
 }
} else if (isset($_GET["message2"])) {
    $key = $_GET["message2"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
  if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "error",
            title: "Error",
            text: "Account Creation Error",
            showConfirmButton: false,
            timer: 4000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
  }
}
else if (isset($_GET["message3"])) {
    $key = $_GET["message3"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
  if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "error",
            title: "Existing Account",
            text: "Account Has Been Created Before",
            showConfirmButton: false,
            timer: 4000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
  }
}
$outx = "";
$outxx = "";
$outxxx = "";
?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Churaton Hotel | Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../design/x2/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../design/x2/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../design/x2/assets/libs/css/style.css">
    <link rel="stylesheet" href="../design/x2/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>
<?php
if (isset($_GET["message1"])) {
    $key = $_GET["message1"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
  if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "success",
            title: "Done",
            text: "Account Creation Successful, Check Mail For Confirmation",
            showConfirmButton: false,
            timer: 5000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
 }
} else if (isset($_GET["message2"])) {
    $key = $_GET["message2"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
  if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "error",
            title: "Error",
            text: "Account Creation Error",
            showConfirmButton: false,
            timer: 4000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
  }
}
else if (isset($_GET["message3"])) {
    $key = $_GET["message3"];
    // $out = $_SESSION["lack_of_intfund_$key"];
    $tt = 0;
  if ($tt !== $_SESSION["lack_of_intfund_$key"]) {
    echo '<script type="text/javascript">
    $(document).ready(function(){
        swal({
            type: "error",
            title: "Existing Account",
            text: "Account Has Been Created Before",
            showConfirmButton: false,
            timer: 4000
        })
    });
    </script>
    ';
    $_SESSION["lack_of_intfund_$key"] = 0;
  }
}
$outx = "";
$outxx = "";
$outxxx = "";
?>
<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="#"><img class="logo-img" height="40" width="50" src="../img/logo/logo.jpeg" alt="logo"></a><span class="splash-description">Churaton staff Login.</span></div>
            <div class="card-body">
            <div><?php echo $err;?></div>
                <form method="post" accept-charset="UTF-8">
                    <div class="form-group">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <input class="form-control form-control-lg" id="username" name="username" type="text" placeholder="Username" autocomplete="off">
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group">
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-dark btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="signup.php" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="reset.php" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../design/x2/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../design/x2/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>