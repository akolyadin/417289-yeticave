<?php

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
	$file_path = __DIR__ . "/templates/$file_name.php";
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
