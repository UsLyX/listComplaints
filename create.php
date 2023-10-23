<?php

    require('connect.php');
    require('createState.php');

    $number = $_POST["number"];
    $violation = $_POST["violation"];
    $id = $_SESSION['id'];

    $conn->query("INSERT INTO `statements`(`auto_number`, `description_violation`, `users_id`) VALUES ('$number', '$violation', '$id')");

    $conn->close();

    header('Location: /list.php');
?>