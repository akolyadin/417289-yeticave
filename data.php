<?php 

	$is_auth = (bool) rand(0, 1);

	$user_name = 'Константин';
	$user_avatar = 'img/user.jpg';

	$title = 'Главная';

    $categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];

    $ads['1'] = array('name' => '2014 Rossignol District Snowboard', 'ads_category' => $categories[0], 'price' => 10999, 'pic_link' => 'img/lot-1.jpg');

    $ads['2'] = array('name' => 'DC Ply Mens 2016/2017 Snowboard', 'ads_category' => $categories[0], 'price' => 159999, 'pic_link' => 'img/lot-2.jpg');

    $ads['3'] = array('name' => 'Крепления Union Contact Pro 2015 года размер L/XL', 'ads_category' => $categories[1], 'price' => 8000, 'pic_link' => 'img/lot-3.jpg');

    $ads['4'] = array('name' => 'Ботинки для сноуборда DC Mutiny Charocal', 'ads_category' => $categories[2], 'price' => 10999, 'pic_link' => 'img/lot-4.jpg');
        
    $ads['5'] = array('name' => 'Куртка для сноуборда DC Mutiny Charocal', 'ads_category' => $categories[3], 'price' => 7500, 'pic_link' => 'img/lot-5.jpg');
    
    $ads['6'] = array('name' => 'Маска Oakley Canopy', 'ads_category' => $categories[5], 'price' => 5400, 'pic_link' => 'img/lot-6.jpg');
?>