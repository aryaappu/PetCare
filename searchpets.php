<?php
include '../connect.php';

$name = $_GET['name'];
$shopId = $_GET['shopId'];
if ($shopId != 0) {
    $sql = "SELECT petdetails.*, shop.latitude, shop.longitude FROM petdetails JOIN shop ON petdetails.LoginId = shop.LoginId
            WHERE petdetails.shopId = $shopId";
} else {
    $sql = "SELECT petdetails.*, shop.latitude, shop.longitude FROM petdetails JOIN shop ON petdetails.LoginId = shop.LoginId
            WHERE name like '%$name%' OR category like '%$name%'";
}
$res = mysqli_query($con, $sql);

$final = array();

while ($row = mysqli_fetch_assoc($res)) {
    $result = array();
    $result['name'] = $row['name'];
    $result['category'] = $row['category'];
    $result['breed'] = $row['breed'];
    $result['food'] = $row['food'];
    $result['image'] = $row['image'];
    $result['amount'] = $row['amount'];
    $result['PetId'] = $row['PetId'];
    $result['latitude'] = $row['latitude'];
    $result['longitude'] = $row['longitude'];

    array_push($final, $result);
}

echo json_encode($final);
?>