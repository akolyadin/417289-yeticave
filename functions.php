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
	$file_path = __DIR__ . "/templates/$file_name.php"; /**уПочему когда убираю кавычки не работает*/
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
 * @param start_date string - дата начала (по умолчанию сегодня)
 * @param days integer - количество дней (по умолчанию 1 день)
 * @return string - счетчик оставшегося времени Ч:М
 */
function end_time($start_date = 'now', $days = 1) {
	$date1 = date('Y-m-d H:i:s', (strtotime($days . 'days')));
	$date2 = date('Y-m-d 00:00:00', (strtotime($start_date)));
	/** Не понимаю почему не работает!!! уже наверное все перепробовал*/
	return date_diff($date1, $date2);
}
