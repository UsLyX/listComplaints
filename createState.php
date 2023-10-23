<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="createState.css">
</head>
<body>
    <header>
        <form class="form_create" action="listRedirect.php">
            <button class="create_btn">Вернуться к списку заявлений</button>
        </form>
        <p>Имя: <?= $_SESSION['name']?></p>
        <form action="exit.php" action="post">
            <button class="btn">Выйти</button>
        </form>
    </header>
    <form method="post" id="form" action="create.php" class="formm">
        <input type="text" placeholder="Введите номер машины" class="number" name="number">
        <textarea type="text" class="vio" placeholder="Введите нарушение" name="violation"></textarea>
        <button class="form__btn" type="submit">Отправить</button>
    </form>

    <script>
        const form = document.getElementById('form');
        form.addEventListener('submit', (event) => {
            if(document.querySelector('.number').value.length > 5){
                alert('Не правильно указан номер');
                event.preventDefault();
             }
        })
    </script>
</body>
</html>