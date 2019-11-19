<?php

include '../connect.php';

$user_type = $_REQUEST['user_type'];
$user_name = $_REQUEST['user_name'];
$email_id = $_REQUEST['email_id'];
$password = $_REQUEST['password'];
$mobile_no = $_REQUEST['mobile_no'];
$owner_name = $_REQUEST['owner_name'];
$shop_name = $_REQUEST['shop_name'];
$address = $_REQUEST['address'];
$latitude = $_REQUEST['latitude'];
$longitude = $_REQUEST['longitude'];

$sql = "select * from login where username='$user_name'";
$res = mysqli_query($con, $sql);
if ($res->num_rows == 0) {

    $query = "insert into login (username,password,status,type) values('$user_name','$password', 1, '$user_type')";
    mysqli_query($con, $query);
    $insert_id = mysqli_insert_id($con);
    if ($user_type = 'user') {
        $sql1 = "insert into user (name,phone,email,LoginId) values('$user_name','$mobile_no','$email_id','$insert_id')";
    } else if ($user_type = 'shop') {
        $sql1 = "insert into shop (ownername, shopname, address, phone, email, LoginId, latitude, longitude) 
                  values('$owner_name', '$shop_name', '$address', '$mobile_no', '$email_id', $insert_id, '$latitude', '$longitude')";
    } else {
        $sql1 = "insert into user (name,phone,email,LoginId) values('$user_name','$mobile_no','$email_id','$insert_id')";
    }
    mysqli_query($con, $sql1);
    if (mysqli_affected_rows($con) > 0) {
        echo '{"code":"0","message":"Data Inserted Successfully"}';
    } else {
        echo '{"code":"1","message":"Error While Inserting Data"}';
    }

} else {
    echo '{"code":"2","message":"User Already Exist"}';
}


?>