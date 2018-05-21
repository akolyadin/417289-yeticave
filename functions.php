<?php
date_default_timezone_set('Europe/Moscow');

/**
 * Функция преобразования формата цены
 * @param price_value integer - значение цены
 * @return string - преобразованная цена
 */
function price_format($price_value) {
	return number_format($price_value, 0, ',', ' ');
}

/**
 * Функция шаблонизатора
 * @param file_name string - исходный файл
 * @param  data array - данные, подключаемые в файл
 * @return string - сгеннерированный результат
 */
function render_template($file_name, $data) {
	$file_path = __DIR__ . '/templates/' . "$file_name.php"; /**уПочему когда убираю кавычки не работает*/
	if (is_readable($file_path)) {
		ob_start();
		extract($data, EXTR_SKIP);
		require "$file_path";
		return ob_get_clean();
	}

	else  {
		return '';
	}
}

/**
 * Функция обратного отсчета времени
 * @param end_date string - дата окончания (по умолчанию полночь)
 * @return string - счетчик оставшегося времени Ч:М
 */
function end_time($end_date = '1 day midnight') {
	$rest_time = strtotime($end_date) - time();
	if ($rest_time < 0) {
		return '00:00';
	}
	return intdiv($rest_time, 3600) . ' : ' . intdiv($rest_time % 3600, 60);
}

/**
 * Функция подключения к БД
 * @param host string - адрес БД
 * @param user string - адрес БД
 * @param pass string - адрес БД
 * @param db string - адрес БД
 */
/*function connect_db($host, $user, $pass, $db) {
	$connect = mysqli_connect($host, $user, $pass, $db);

	if ($connect === false) {
		print('Ошибка подключения к БД:'. mysqli_connect_error());
		die();
	}

	return mysqli_set_charset($connect, 'utf8');
} */
/*
function get_categories ($connect) {
	$sql = mysqli_query('select category_name, category_name_alias from categories;');
	
	return $categories;
}
*/

