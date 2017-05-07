<?php
require_once 'functions.php';
include_once 'data.php';

$errors = [];
$file = [];


if (isset($_POST)) {
    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars($value);

        if (empty($value)) {
            $errors[$key] = 'Обязательно для заполнения';
        }

        if (in_array($key, ['lot-rate', 'lot-step']) && !is_numeric($value)) {
            $errors[$key] = 'Только цифровые значения';
        }

        if (in_array($key, ['lot-date']) && !is_numeric($value)) {
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
            'name' => $_POST['lot-name'],
            'category' => $_POST['category'],
            'price' => $_POST["lot-rate"],
            'url_image' => 'img/' . $file['name'],
            'description' => $_POST['message']
        ];
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавление лота</title>
    <link href="css/normalize.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

<?= includeTemplate('header.php',[]) ?>
<?php if (empty($_POST) || !empty($errors)): ?>
    <?= includeTemplate('add-lot.php', ['stuff_categories' => $stuff_categories, 'errors' => $errors, 'file' => $file]) ?>
<?php else: ?>
    <?= includeTemplate('main-lot.php', ['stuff_details' => $stuff_details, 'bets' => $bets]) ?>
<?php endif; ?>
<?= includeTemplate('footer.php',[]) ?>

</body>
</html>
