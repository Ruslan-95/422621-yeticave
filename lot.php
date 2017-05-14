<?php
session_start();
require_once 'functions.php';
include_once 'data.php';
$valid = is_numeric($_GET['id']) && array_key_exists($_GET['id'], $stuff_details);
if (!$valid) {
    header("HTTP/1.0 404 Not Found");
    exit("<h1>404… Увы, но эта страница затерялась где-то в галактике Интернета</h1>");
}


if (!empty($_POST['cost'])){

    $new_bet[] = [
        'cost' => $_POST['cost'],
        'time' => time(),
        'lot_id' => $valid
    ];
    $new_bet = json_encode($new_bet);
    setcookie('new_bet', $new_bet, strtotime('+30 days'));
    header( 'Location: /mylots.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $stuff_details[$_GET['id']]['name']; ?></title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<?=includeTemplate('header.php',[]);?>
<?=includeTemplate('lot_main.php', ['bets' => $bets, 'stuff_details'=> $stuff_details[$_GET['id']]]);?>
<?=includeTemplate('footer.php',[]);?>
</body>
</html>
