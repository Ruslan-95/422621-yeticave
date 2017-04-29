<?php
$stuff_categories = array('Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное');

$stuff_details= array(
	array('name' => "2014 Rossignol District Snowboard",
		"category" => "Доски и лыжи",
		"price" => 10999,
		"url_image" =>'img/lot-1.jpg'),
	array('name'=>'DC Ply Mens 2016/2017 Snowboard',
		'category'=>'Доски и лыжи',
		'price'=>159999,
		'url_image'=>'img/lot-2.jpg'),
	array('name'=>'Крепления Union Contact Pro 2015 года размер L/XL',
		'category'=>'Крепления',
		'price'=>8000,
		'url_image'=>'img/lot-3.jpg'),
	array('name'=>'Ботинки для сноуборда DC Mutiny Charocal',
		'category'=>'Ботинки',
		'price'=>10999,
		'url_image'=>'img/lot-4.jpg'),
	array('name'=>'Куртка для сноуборда DC Mutiny Charocal',
		'category'=>'Одежда',
		'price'=>7500,
		'url_image'=>'img/lot-5.jpg'),
	array('name'=>'Маска Oakley Canopy',
		'category'=>'Разное',
		'price'=>5400,
		'url_image'=>'img/lot-6.jpg')
);

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
