<?php
include_once 'mysql_helper.php';

/**
 * Функция подключения шаблонов
 * @param $template
 * @param $array
 * @return string
 */
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
 * Возвращает время до полуночи текущего дня в формате "чч:мм"
 * @return string
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
 * Преобразует временные метки в человекообразный формат и выдает значаения в определенно заданом формате (d.m.y в H:i)
 * @param $ts
 * @return false|string
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
 * Сохраняет определенные кукисы
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


/**
 * Проверка авторизации
 */
function checkAuth(){
    if (empty($_SESSION['user'])) {
    header('HTTP/1.1 403 Forbidden');
    header('Location: /login.php');
    exit();
    }
}


/**
 * Делает код более безопасным
 * @param $obj
 * @return array
 */
function valide($obj)
{
    if (isset($obj)) {

        if (is_array($obj)) {
            $objNew = [];

            foreach ($obj as $key => $value) {
                $objNew[valide($key)] = valide($value);
            }

            return $objNew;

        } else {
            return htmlspecialcharsEx($obj);
        }
    }
}


/**
 * Проверка подключения к базе данных
 * @return object
 */
function checkConnectToDatabase() {
    $resource = mysqli_connect('localhost', 'root', '', 'yeticave');

    if (!$resource) {
                header('HTTP/1.0 500 Internal Server Error');
                header('Location: /500.html');
    } else {
        return $resource;
    }
}


 /**
  * Функция для получения данных
  * @param $resource
  * @param $request
  * @param array $data
  * @return array|null
  */
 function getData($resource, $request, $data = []) {
        // получаем подготовленное выражение
        $prepared_statement = db_get_prepare_stmt($resource, $request, $data);
        // выполняем запрос
        if(mysqli_stmt_execute($prepared_statement)) {
                $result = mysqli_stmt_get_result($prepared_statement);
                return mysqli_fetch_all($result, MYSQLI_ASSOC);
     } else {
                return [];
     }
 }


 /**
  * Функция для вставки данных
  * @param $resource
  * @param $request
  * @param $data
  * @return bool|number
  */
 function insertData($resource, $request, $data) {
        // получаем подготовленное выражение
        $prepared_statement = db_get_prepare_stmt($resource, $request, $data);

        // выполняем запрос
        if(mysqli_stmt_execute($prepared_statement)) {
                return mysqli_stmt_insert_id($resource);
     } else {
                return false;
     }
 }


 /**
  * Форматирует ассоциативный массив
  * переобразуя все ключи в строку, а значения в простой массив
  * @param $array
  * @return array
  */
 function getFormatArray($array) {
        $fields = '';
        $value = [];

        foreach ($array as $key => $value) {
                $fields .= "`$key`=?, ";
                $value[] = $value;
            };

     return [$fields => $value];
 }


 /**
  * Функция для обновления данных
  * @param $resource
  * @param $table
  * @param $data
  * @param $requirement
  * @return bool|int
  */
 function updateData($resource, $table, $data, $requirement) {
        // форматируем массив данных
        $format_data = getFormatArray($data);
        // получаем поля для выражения
        $update_fields = array_keys($format_data)[0];
        // получаем значения для выражения
        $update_value = array_values($format_data)[0];
        // аналогично форматируем массив условий
        $requirement_data = getFormatArray($requirement);
        $requirement_fields = array_keys($requirement_data)[0];
        $requirement_value = array_values($requirement_data)[0];
        // объединяем все массивы значений
        $update_data = array_merge($update_value, $requirement_value);
        // формируем запрос
        $request = "UPDATE $table SET $update_fields WHERE $requirement_fields";
        // получаем подготовленное выражение
        $prepared_statement = db_get_prepare_stmt($resource, $request, $update_data);
        // выполняем запрос
        if (mysqli_stmt_execute($prepared_statement)) {
               return mysqli_stmt_affected_rows($prepared_statement);
     } else {
                return false;
     }
 }
