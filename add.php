<?php
session_start();
include_once 'functions.php';
include_once 'data.php';

if (empty($session['user'])) {
    header('HTTP/1.1 403 Forbidden');
    exit();
}
$errors = [];
$file = [];
$post = valide($_POST);
$file = valide($_FILES);
if (!empty($post)) {
    foreach ($post as $key => $value) {
        $post[$key] = htmlspecialchars($value);
        if (empty($value)) {
            $errors[$key] = 'Заполните это поле';
            continue;
        }
        if (in_array($key, ['lot-date']) && !date(d.M.y, $value)) {
            $errors[$key] = 'Некорректная дата';
        }
    }
    if (isset($_FILES['lot-file'])) {
        $file = $_FILES['lot-file'];
        if ($file['type'] == 'image/jpeg') {
            $uploadetfile = move_uploaded_file($file['tmp_name'], 'img/' . $file['name']);
            is_uploaded_file($uploadetfile);
        } else {
            $errors['lot-file'] = 'Загрузите фото в формате jpeg';
        }
    }
    if (empty($errors)) {
        $lot = [
            'name' => $post['lot-name'],
            'category' => $post['category'],
            'price' => $post["lot-rate"],
            'url_image' => 'img/' . $file['name'],
            'description' => $post['message']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>DC Ply Mens 2016/2017 Snowboard</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?= includeTemplate('header.php',[]) ?>
<?php if (empty($_POST) || !empty($errors)): ?>
    <?= includeTemplate('add_lot.php', ['stuff_categories' => $stuff_categories, 'errors' => $errors, 'file' => $file]) ?>
<?php else: ?>
    <?= includeTemplate('lot_main.php', ['lot' => $lot, 'bets' => $bets]) ?>
<?php endif; ?>
<?= includeTemplate('footer.php',[]) ?>
</body>
</html>
