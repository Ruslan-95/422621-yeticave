<?php
session_start();
require_once 'functions.php';
include_once 'data.php';

$valid = isset($_GET['id']) ? intval($_GET['id']) : null;

if (!array_key_exists($valid, $stuff_details)) {
    header('HTTP/1.1 404 Not Found');
    exit("<h1>404… Увы, но эта страница затерялась где-то в галактике Интернета</h1>");
}
$new_bet = decode_array();
if (!empty($_POST['cost'])){
    $new_bet[] = [
        'cost' => $_POST['cost'],
        'lot_id' => $valid,
        'time' => time(),
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
