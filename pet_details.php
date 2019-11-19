<?php
include '../connect.php';

$id = $_GET['id'];
$sql = "SELECT * FROM petdetails p,shop s WHERE PetId=$id AND p.`shopId`=s.`shopId`";
$res = mysqli_query($con, $sql);

$final = array();

while ($row = mysqli_fetch_assoc($res)) {
    $result = array();
    $result['shopId'] = $row['shopId'];
    $result['name'] = $row['name'];
    $result['category'] = $row['category'];
    $result['breed'] = $row['breed'];
    $result['food'] = $row['food'];
    $result['image'] = $row['image'];
    $result['amount'] = $row['amount'];
    $result['PetId'] = $row['PetId'];

    $result['ownername'] = $row['ownername'];
    $result['shopname'] = $row['shopname'];
    $result['address'] = $row['address'];
    $result['phone'] = $row['phone'];
    $result['email'] = $row['email'];

    array_push($final, $result);
}

echo json_encode($final);
?>