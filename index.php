<?php

require_once 'functions.php';
require_once 'data.php';

$connect = mysqli_connect('localhost', 'root', '', 'yeticave')
	or die ('Ошибка подключения к БД ('. mysqli_connect_error($connect) .')');

$sql_categories = 'select category_name, category_name_alias from categories';
$result_categories = mysqli_query($connect, $sql_categories);

$sql_ads = 'SELECT ad_name, ad_price, ad_link, (t_cnt_bet.cnt_bet * ad_price_step) + ad_price AS cur_price, t_cnt_bet.cnt_bet, categories.category_name FROM ads
JOIN categories ON categories.id_category = ads.category_id
LEFT JOIN (SELECT COUNT(id_bet) cnt_bet, ad_id FROM bets GROUP BY ad_id) t_cnt_bet ON t_cnt_bet.ad_id = ads.id_ad WHERE user_win_id is null';
$result_ads = mysqli_query($connect, $sql_ads);

mysqli_close($connect);


$ads = mysqli_fetch_all($result_ads, MYSQLI_ASSOC);
$categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);


$content = render_template('index', [
	'categories' => $categories, 
	'ads' => $ads
]);

$layout = render_template('layout', [
	'content' => $content,
    'is_auth' => $is_auth, 
    'page_title' => $page_title, 
    'user_name' => $user_name, 
    'user_avatar' => $user_avatar, 
    'categories' => $categories
    
]);

print($layout);
