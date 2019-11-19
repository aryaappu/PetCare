<?php

include "../connect.php";

$userId = $_GET['userId'];

$sql = "SELECT article.*, user.name FROM article JOIN user ON article.userId = user.LoginId";

if ($userId != 0) {
    $sql .= " WHERE LoginId = $userId";
}

$res = mysqli_query($con, $sql);

$result = array();

while ($row = mysqli_fetch_assoc($res)) {
    array_push($result, $row);
}

echo json_encode($result);