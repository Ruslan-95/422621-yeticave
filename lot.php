<?php
session_start();
require_once 'functions.php';
include_once 'data.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : null;
$product_id = $stuff_details[$id];
if (!$id) {
    header("HTTP/1.0 404 Not Found");
    exit("<h1>404… Увы, но эта страница затерялась где-то в галактике Интернета</h1>");
}
$new_bet = decode_array();
if (!empty($_POST['cost'])){
    $new_bet[] = [
        'cost' => $_POST['cost'],
        'product_id' => $product_id,
        'time' => time(),
        'name' => $product_id['name'],
        'category' => $product_id['category'],
        'img' => $product_id['url_image'],
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
<?=includeTemplate('lot_main.php', [
    'bets' => $bets,
    '$stuff_details'=> $stuff_details[$id],
    'new_bet' => $new_bet,
    'product_id' => $product_id,
]);?>
<?=includeTemplate('footer.php',[]);?>
</body>
</html>
