<?php
session_start();
include_once 'functions.php';

// проверяем подключение к базе
$resource = checkConnectToDatabase();
if (!$resource)
    print 'error<br>';
else
    print 'success<br>';

// категории товаров
$sql_categories = 'SELECT * FROM categories';
$data['categories'] = getData($resource, $sql_categories);

// данные о лоте
$sql_lot = "SELECT lots.name, lots.id, lots.img, lots.price, lots.date_final, lots.description,
                    categories.name AS categoryies FROM lots JOIN categories ON lots.category_id = categorues.id 
                      WHERE lots.id=?";
$lots = getData($resource, $sql_lot, ['lots.id' => $_GET['id']]);

//if ($sql_lot)

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
<?=includeTemplate('header.php', ['data'=>$data]);?>

<?=includeTemplate('lot_main.php', ['data'=>$data]);?>

<?=includeTemplate('footer.php', ['data'=>$data]);?>
</body>
</html>