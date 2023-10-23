<?php
session_start();
require_once 'connect.php';

$login = $_POST['loginn'];
$password = $_POST['passwordd'];


$result = $conn->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'");


$user = $result->fetch_assoc();

if (count($user) == 0) {
    echo "Неа";
    exit();
}

$_SESSION['id'] = $user['id'];
$_SESSION['name'] = $user['name'];
$_SESSION['login'] = $user['login'];

if($login == 'copp' && $password == 'password'){
    header('Location: /adminList.php');   
}
else{
    header('Location: /list.php');
}