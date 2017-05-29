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

/**
 * Функция lot_time_remaining() рассчитывает кол-во оставшегося времени до полуночи(мск)
 */
function lot_time_remaining(){
    date_default_timezone_set('Europe/Moscow');
    $tomorrow = strtotime('tomorrow midnight');
    $now = time();
    $minutes = floor($tomorrow - $now)/60;
    $hours = floor($minutes / 60);
    $lot_time_remaining = $hours.":".$minutes % 60;
    return $lot_time_remaining;}


/**
 *функция bets_time преобразует временные метки в человекообразный формат и выдает значаения в определенно заданом формате
 */
function bets_time($ts){
    {
        $minutes = (time() - $ts) / 60;
        $hours = $minutes / 60;
        if ($hours > 24) {
            $result = date("d.m.y в H:i", $ts);
        } else if ($minutes > 60) {
            $result = $hours . " часов назад";
        } else {
            $result = $minutes . " минут назад";
        }
        return $result;
    }}


/**
 * @param $new_bet десериализирует данные этого массива
 * @return array|mixed возвращает результат
 */
function decode_array()
{
    $new_bet = [];
    if (isset($_COOKIE["new_bet"])) {
        $new_bet = json_decode($_COOKIE["new_bet"], true);
    }
    return $new_bet;
}
