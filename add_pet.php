<?php

require_once '../connect.php';

error_reporting(E_ALL);
if (isset($_FILES['image'])) {

    $userId = $_POST['userId'];
    $category = $_POST['category'];
    $name = $_POST['name'];
    $breed = $_POST['breed'];
    $quantity = $_POST['quantity'];
    $food = $_POST['food'];
    $amount = $_POST['amount'];

    $d1 = new Datetime();

    $image = $_FILES['image'];
    $file_name = 'pet_' . $d1->format('U') . '.png';
    $file_tmp = $image['tmp_name'];

    move_uploaded_file($file_tmp, "../images/" . $file_name);

    $sql = "INSERT INTO petdetails (shopId, LoginId, name, category, breed, quantity, food, medicine, image, amount) 
            VALUES ($userId, $userId, '$name', '$category', '$breed', $quantity, '$food', '', '$file_name', $amount)";

    mysqli_query($con, $sql);

    echo('{"message": "success", "data": "' . "$category, $name, $breed, $food, $amount" . '"}');
}