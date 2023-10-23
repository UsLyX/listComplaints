<?php

session_start();
require('connect.php');

$id = $_SESSION['id'];

$result = $conn->query("SELECT * FROM `statements` WHERE `users_id` = '$id'");
 
while($row = $result->fetch_row()) {
    $rows[] = $row;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
    <link rel="stylesheet" href="list.css">
</head>
<body>
    <header>
        <form class="form_create" action="createRedirect.php">
            <button class="create_btn">Создать заявление</button>
        </form>
        <p class="name">Имя: <?= $_SESSION['name']?></p>
        <form action="exit.php" action="post">
            <button class="btn">Выйти</button>
        </form>
    </header>

    <div class="list">

    <p class="title">Список заявлений:</p>

    <?php

        if ($rows == []) {
            echo "Вы ещё не написали ни одной жалобы";
            return;
        }
        else{
            foreach($rows as $row){
                echo '<div class="element">
                    <p>Номер заявки: '.$row[0].'</p>
                    <p>Номер автомобиля: '.$row[1].'</p>
                    <p>Жалоба: '.$row[2].'</p>
                    <p>Статус: <span class="status" style="padding: 10px 15px; border-radius: 10px">'.$row[4].'</span></p>
                    </div>';
            }
        }

    ?>


    </div>
    <script>
        const statuses = document.querySelectorAll('.status');
        statuses.forEach((item) => {
            if(item.innerHTML == 'В обработке'){
                item.style.backgroundColor = "orange";
            }
            else if(item.innerHTML == 'Принято'){
                item.style.backgroundColor = "#108a0c";
            }
            else if(item.innerHTML == 'Отклонено'){
                item.style.backgroundColor = "rgb(212, 37, 69)";
            }
        })
    </script>
</body>
</html>
