<?php

require('connect.php');

$login = $_POST["login"];
$password = $_POST["password"];
$name = $_POST['name'];
$phone = $_POST["phone"];
$email = $_POST["email"];

$logins = $conn->query("SELECT login FROM `users`");
while($row = $logins->fetch_assoc()) {
    $rows[] = $row;
}
foreach($rows as $existLogin){
    if($login == $existLogin['login']){
        echo "<script>alert('Пользователь с таким логином уже существует'); 
              location.href='http://test/reg.html';</script>";
        exit;
        return;      
    }
}


$conn->query("INSERT INTO `users`(`name`, `login`, `password`, `phone`, `email`) VALUES ('$name', '$login', '$password', '$phone', '$email')");

$conn->close();

header('Location: /auth.html');
?>