<?php
include("db/connect.php");
session_start();
?>
<?php
$rigits = 7;
$randms = str_pad(rand(0, pow(10, $rigits)-1), $rigits, '0', STR_PAD_LEFT);
if (isset($_POST["group"]))
{
    $group = $_POST["group"];
    $room_code = $_POST["room_code"];
    $room_name = $_POST["room_name"];
    $price = $_POST["price"];
    // img upload
    $temp1 = explode(".", $_FILES['chooseFile']['name']);
    $digits = 10;
    $randms1 = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    $sig_passport_one = $randms1. '.' .end($temp1);
    if (move_uploaded_file($_FILES['chooseFile']['tmp_name'], "room/" . $sig_passport_one)) {
      $msg = "Image uploaded successfully";
    } else {
      $msg = "Image Failed";
    }
    $descript = $_POST["descript"];
    // config and service
    $adult = $_POST["adult"];
    $kids = $_POST["kids"];
    $max_users = $adult + $kids;
    // service
    $wifi = $_POST["wifi"];
    if($wifi){
        $wifi = 1;
      }
      else{
        $wifi = 0;
      }
    $tv = $_POST["tv"];
    if($tv){
        $tv = 1;
      }
      else{
        $tv = 0;
      }
    $ac = $_POST["ac"];
    if($ac){
        $ac = 1;
      }
      else{
        $ac = 0;
      }
    $park = $_POST["park"];
    if($park){
        $park = 1;
      }
      else{
        $park = 0;
      }
    $pool = $_POST["pool"];
    if($pool){
        $pool = 1;
      }
      else{
        $pool = 0;
      }
    // now the DB

    $post_invent = mysqli_query($connection, "INSERT INTO `room_inventory` (`room_code`, `room_group`, `room_name`, `tv`, `wifi`, `ac`, `parking`, `pool`, `description`, `price`,
     `is_active`, `not_active_descipt`, `max_users`, `max_kids`, `max_adult`, `currently_used`, `star`, `img`)
    VALUES ('{$room_code}', '{$group}', '{$room_name}', '{$tv}', '{$wifi}', '{$ac}', '{$park}', '{$pool}', '{$descript}', '{$price}',
    '1', NULL, '{$max_users}', '{$kids}', '{$adult}', '0', '5', '{$sig_passport_one}')");
    if ($post_invent) {
      $select_id = mysqli_query($connection, "SELECT * FROM `room_inventory`ORDER BY id DESC LIMIT 1");
      $xy = mysqli_fetch_array($select_id);
      $int_id = $xy["id"];
      $insert_m = mysqli_query($connection, "INSERT INTO `booking_date` (`room_id`, `booked_on`, `booked_out`) VALUES ('{$int_id}', NULL, NULL)");
      if ($insert_m) {
        $_SESSION["Lack_of_intfund_$randms"] = "Registration Successful!";
        echo header ("Location: ../pages/invent.php?message101=$randms");
      } else {
        $_SESSION["Lack_of_intfund_$randms"] = "Registration Successful!";
        echo header ("Location: ../pages/invent.php?message404=$randms");
      }
       
    } else {
        $_SESSION["Lack_of_intfund_$randms"] = "Registration Successful!";
        echo header ("Location: ../pages/invent.php?message404=$randms");
    }
}
?>