<?php
session_start();
include_once 'data.php';
require_once 'functions.php';
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

<?=includeTemplate('main.php', ['stuff_categories' => $stuff_categories, 'stuff_details' => $stuff_details]);?>

<?=includeTemplate('footer.php',[]);?>

</body>
</html>