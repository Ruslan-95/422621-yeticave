<?php
session_start();
include_once 'functions.php';
include_once 'data.php';
$new_bet= decode_array();
checkAuth();


// проверка авторизации
checkAuthorization();

// проверяем подключение к базе
$resource = checkConnectToDatabase();

// категории товаров
$sql_for_category = 'SELECT * FROM category';
$data['categories'] = getData($resource, $sql_for_category);

// данные для шаблона
$sql_for_my_rates = 'SELECT bet.rate, bet.rate, bet.lot_id, lot.img AS image, lot.name AS name 
                        FROM bet JOIN lot ON bet.lot_id=lot.id WHERE bet.user_id=?';
$data['my_rates'] = getData($resource, $sql_for_my_rates, ['user_id' => $_SESSION['user']['id']]);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Главная</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?=includeTemplate('header.php',[]);?>
<?=includeTemplate('mylots.php', $data) ?>
<?=includeTemplate('footer.php',['categories' => $data['categories']]) ?>
</body>
</html>
