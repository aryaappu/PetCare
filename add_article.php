<?php

require_once '../connect.php';

error_reporting(E_ALL);
if (isset($_FILES['image'])) {

    $userId = $_POST['userId'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $d1 = new Datetime();

    $image = $_FILES['image'];
    $file_name = 'article_' . $d1->format('U') . '.png';
    $file_tmp = $image['tmp_name'];

    move_uploaded_file($file_tmp, "../images/" . $file_name);

    $sql = "INSERT INTO article(userId, title, description, image) VALUES ($userId, '$title', '$description', '$file_name')";

    mysqli_query($con, $sql);
    $insert_id = mysqli_insert_id($con);

    echo('{"message": "success", "data": "' . $insert_id . '"}');
}