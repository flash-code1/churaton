<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Churaton Hotel | Signup</title>
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
<!-- ============================================================== -->
<!-- signup form  -->
<!-- ============================================================== -->
<?php
session_start();
include("../functions/db/connect.php");
// Include config file
require_once "../bat/phpmailer/PHPMailerAutoload.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $digits = 6;
$randms = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $usertype = "staff";
    $status = 0;
    session_start();
    $res = mysqli_query($connection, "SELECT * FROM users");
    
    if (count([$res]) == 1) {
        $x = mysqli_fetch_array($res);
        $ui = $x['username'];
        $ei = $x['email'];
    // proper
        if ($username !== $ui && $email !== $ei) {
            $queryuser = "INSERT INTO users (username, email, password, user_type, is_active)
        VALUES ('{$username}', '{$email}', '{$hash}', '{$usertype}', '{$status}')";
        $result = mysqli_query($connection, $queryuser);
        if ($result) {
            // PHP MAILER
             // begining of mail
             $mail = new PHPMailer;
             // from email addreess and name
             $mail->From = "info@churaton.com";
             $mail->FromName = "CHURATON NIG LTD";
             // to adress and name
             $mail->addAddress($email, $username);
             // reply address
             //Address to which recipient will reply
             // progressive html images
             $mail->addReplyTo("info@churaton.com", "Reply");
             // CC and BCC
             //CC and BCC
             // $mail->addCC("cc@example.com");
             // $mail->addBCC("bcc@example.com");
             // Send HTML or Plain Text Email
             $mail->isHTML(true);
             $mail->Subject = "WELCOME TO CHURATON";
             $mail->Body = "Welcome to Churaton Hotel <br/> Your Login Details
             <p>Username: $username</p> <p>Password: $password</p>";
             $mail->AltBody = "This is the plain text version of the email content";
             // mail system
             if(!$mail->send()) 
             {
                 echo "Mailer Error: " . $mail->ErrorInfo;
                 $_SESSION["Lack_of_intfund_$randms"] = "Registration Suc";
             echo header ("Location: login.php?message1=$randms");
             } else
             {
                 echo "Message has been sent successfully";
                 $_SESSION["Lack_of_intfund_$randms"] = "Registration Suc";
             echo header ("Location: login.php?message1=$randms");
             }
        } else {
            $_SESSION["Lack_of_intfund_$randms"] = "Registration Failed";
            echo header ("Location: login.php?message2=$randms");
        }
        } else {
            $_SESSION["Lack_of_intfund_$randms"] = "Registration Ex";
       echo header ("Location: login.php?message3=$randms");
        }
    }
}
?>
<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" method="POST">
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Churaton</h3>
                <p>Please enter your user information.</p>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" type="text" name="username" required="" placeholder="Username" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="email" name="email" required="" placeholder="E-mail" autocomplete="off">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="pass1" name="password" type="password" required="" placeholder="Password">
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" required="" placeholder="Confirm">
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-dark" type="submit">Register My Account</button>
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" required name="terms" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                    </label>
                </div>
                <!-- <div class="form-group row pt-0">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-2">
                        <button class="btn btn-block btn-social btn-facebook " type="button">Facebook</button>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <button class="btn  btn-block btn-social btn-twitter" type="button">Twitter</button>
                    </div>
                </div> -->
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="login.php" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>

 
</html>