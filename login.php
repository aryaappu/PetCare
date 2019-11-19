<?php
session_start();
include '../connect.php';

$uname = $_REQUEST['email_id'];
$pass = $_REQUEST['password'];

$sql = "select * from login where username='$uname' and password='$pass'";
$res = mysqli_query($con, $sql);
if ($res->num_rows != 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        echo '{"code":"0","message":"login Succesfully" ,
        "user_id" : "' . $row['LoginId'] . '", "user_type": "' . $row['type'] . '"}';
    }
} else {
    echo '{"code":"1","message":"Please Enter Valid User Name And Password"}';
}

?>