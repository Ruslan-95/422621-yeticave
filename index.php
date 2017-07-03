<?php
session_start();
//include_once 'data.php';
include_once 'functions.php';

// проверяем подключение к базе
$resource = checkConnectToDatabase();
if (!$resource)
    print 'error<br>';
else
    print 'success<br>';

$sql_for_category = 'SELECT * FROM categories';
$data['categories'] = getData($resource, $sql_for_category);


$sql_for_lots = "SELECT lots.id, lots.name, lots.img, lots.price, lots.date_final, categories.name AS categories FROM lots
    JOIN categories ON lots.category_id = categories.id";

$data['data_add'] = getData($resource, $sql_for_lots);

if (!$resource)
    $errror = mysqli_connect_error();
    $content = includeTemplate(error.php, ['error' => $content])
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

<?=includeTemplate('header.php', ['data'=>$data]);?>

<?=includeTemplate('main.php', ['data'=>$data]);?>

<?=includeTemplate('footer.php', ['data'=>$data]);?>

</body>
</html>