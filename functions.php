<?php

function includeTemplate($template, $array){
	$template = $_SERVER["DOCUMENT_ROOT"]."/templates/". $template;
	if (!file_exists($template)) {
		return "";
	}
	extract($array); //extract — Импортирует переменные из массива в текущую таблицу символов
	ob_start();
	include_once ($template);
	$html = ob_get_clean();
	return $html;
}

function lot_time_remaining()
{
// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');
// записать в эту переменную оставшееся время в этом формате (ЧЧ:ММ)
$lot_time_remaining = "00:00";
// временная метка для полночи следующего дня
$tomorrow = strtotime('tomorrow midnight');
// временная метка для настоящего времени
$now = time();
// далее нужно вычислить оставшееся время до начала следующих суток и записать его в переменную $lot_time_remaining
//$minutes = floor($tomorrow - $now)/60;
//$hours = floor($minutes / 60);
//$lot_time_remaining = $hours.":".$minutes % 60;

$lot_time_remaining = date('H:i' ,$tomorrow - $now / 3600*3);
	return $lot_time_remaining;}
//$lot_time_remaining = date('H:i' ,$tomorrow - $now / 3600*3);