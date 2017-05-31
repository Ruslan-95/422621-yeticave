<?php
session_start();
include_once 'functions.php';
include_once 'data.php';
$new_bet= decode_array();
checkAuth();
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
<?=includeTemplate('mylots.php', [
 //   'stuff_details' => $stuff_details,
    'new_bet' => $new_bet,
    'product_id' => $product_id,
]);?>
<?=includeTemplate('footer.php',[]);?>
</body>
</html>
