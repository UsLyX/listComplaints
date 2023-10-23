<?php

session_start();
require('connect.php');

$id = $_SESSION['id'];

$result = $conn->query("SELECT * FROM `statements`");
 
while($row = $result->fetch_row()) {
    $rows[] = $row;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adminList</title>
    <link rel="stylesheet" href="adminList.css">
</head>
<body>
    <header>
        <p class="name">Администратор: <?= $_SESSION['login']?></p>
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
                if($row[4] == 'В обработке'){
                    echo '
                    <form class="element" action="createAdminList.php" method="post">
                    <div class="num_box">
                    <p>Номер заявки: </p>
                    <input class="num_state" name="number" style="outline: none" readonly="true" value="'.$row[0].'" />
                    </div>
                    <p>Номер автомобиля: '.$row[1].'</p>
                    <p>Жалоба: '.$row[2].'</p>
                    <input class="accept" name="stat" type="submit" value="Принять" />
                    <input class="reject" name="stat" type="submit" value="Отклонить" />
                    </form>';  

                }
                else if($row[4] == 'Принято'){
                    echo '
                    <form class="element" action="createAdminList.php" method="post">
                    <div class="num_box">
                    <p>Номер заявки: </p>
                    <input class="num_state" name="number" style="outline: none" readonly="true" value="'.$row[0].'" />
                    </div>
                    <p>Номер автомобиля: '.$row[1].'</p>
                    <p>Жалоба: '.$row[2].'</p>
                    <input class="accept" name="acceptt" type="button" value="Принято" />
                    </form>';   
                }
                else if($row[4] == 'Отклонено'){
                    echo '
                    <form class="element" action="createAdminList.php" method="post">
                    <div class="num_box">
                    <p>Номер заявки: </p>
                    <input class="num_state" name="number" style="outline: none" readonly="true" value="'.$row[0].'" />
                    </div>
                    <p>Номер автомобиля: '.$row[1].'</p>
                    <p>Жалоба: '.$row[2].'</p>
                    <input class="reject" name="acceptt" type="button" value="Отклонено" />
                    </form>';   
                }
            }
        }

    ?>
    </div>
</body>
</html>
