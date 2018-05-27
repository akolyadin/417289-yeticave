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
	$file_path = __DIR__ . '/templates/' . "$file_name.php";
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

function pased_time($time) {
    
    $time_sec = time() - strtotime($time);
    
    if (intdiv($time_sec, 86400) > 1) {
        return date('d.m.y', strtotime($time_sec)) . ' в ' . date('H:i', strtotime($time_sec));
    }
     $time_value = date('Y-m-d h:i:s', $time_sec);
}

/**
 * Функция инициализирует подключение к БД
 * @param host string - адрес подключения
 * @param username string - пользователь
 * @param pwd string - пароль
 * @param db string - имя БД
 * @return string - дискриптор соедениения
 */
function connect_db($host = 'localhost', $username = 'root', $pwd = '', $db = 'yeticave') {

	$connect = mysqli_connect($host, $username, $pwd, $db)
		or die ('Ошибка подключения к БД ('. mysqli_connect_error($connect) .')');

	return $connect;

	mysqli_close(connect_db());
}

/**
 * Функция выборки объявлений из БД
 * @param id_ad integer - ид объявления (по умолчанию '-1' - все объявления)
 * @param id_category integer - ид категории (по умолчанию '-1' - все категории)
 * @param lim integer - количество объеклений на странице (по умолчанию 9)
 * @param strig выборка из БД
 */
function get_ad($id_ad = -1, $id_category = -1, $lim = 9) {
    $sql_ads = "SELECT 
    ad.id_ad,
    ad.ad_name, 
    ad.ad_price, 
    ad.ad_link, 
    ad.ad_descrition,
    c.category_name,
    c.id_category,
    ad.ad_date_end
    FROM ads ad
	JOIN categories c ON c.id_category = ad.category_id
	WHERE (ad.id_ad = $id_ad or $id_ad = -1) and (c.id_category = $id_category or $id_category = -1)
	LIMIT $lim";


	$result_ads = mysqli_query(connect_db(), $sql_ads);

	$ads = mysqli_fetch_all($result_ads, MYSQLI_ASSOC);
    
    return $ads;
}

/**
 * Функция выборки категорий из БД
 * @param id_ad integer - ид объявления (по умолчанию '-1' - все объявления)
 * @param id_category integer - ид категории (по умолчанию '-1' - все категории)
 * @param lim integer - количество объеклений на странице (по умолчанию 9)
 * @param strig выборка из БД
 */
function get_categories($id_category = -1) {
    $sql_categories = "select
    id_category,
    category_name, 
    category_name_alias 
    from categories
    where (id_category = $id_category or $id_category = -1)";


	$result_categories = mysqli_query(connect_db(), $sql_categories);

	$categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);    
    
    return $categories;
}

function get_bets ($id_ad) {
	$sql_bets = "SELECT 
	users.user_name, 
	bet_date,
	bet_value  
	FROM bets
	JOIN users ON users.id_users = bets.user_id
	JOIN ads ON ads.id_ad = bets.ad_id
	WHERE bets.ad_id = $id_ad
	ORDER BY bet_date DESC";

	$result_bets = mysqli_query(connect_db(), $sql_bets);

	$bets = mysqli_fetch_all($result_bets, MYSQLI_ASSOC);    
    
    return $bets;	
}



