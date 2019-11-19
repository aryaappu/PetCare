<?php

require_once '../connect.php';

error_reporting(E_ALL);
if (isset($_FILES['image'])) {

    $userId = $_POST['userId'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $amount = $_POST['amount'];

    $d1 = new Datetime();

    $image = $_FILES['image'];
    $file_name = 'accessory_' . $d1->format('U') . '.png';
    $file_tmp = $image['tmp_name'];

    move_uploaded_file($file_tmp, "../images/" . $file_name);

    $sql = "INSERT INTO accessories (shopid, category, name, description, quantity, image, price) 
            VALUES ($userId, '$category', '$name', '$description', $quantity, '$file_name', '$amount')";

    mysqli_query($con, $sql);

    echo('{"message": "success", "data": "' . "$category, $name, $description, $amount" . '"}');
}