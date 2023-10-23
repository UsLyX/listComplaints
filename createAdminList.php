<?php
require('connect.php');

$number = $_POST["number"];
$accept = $_POST["stat"];
$status = '';

if($accept == 'Принять'){
    $status = 'Принято';
}
else if($accept == 'Отклонить'){
    $status = 'Отклонено';
}

$result = $conn->query("UPDATE `statements` SET `status` = '$status' WHERE `statements`.`id` = '$number'");

header('Location: adminList.php');
?>