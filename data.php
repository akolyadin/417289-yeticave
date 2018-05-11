<?php 

$is_auth = (bool) rand(0, 1);

$user_name = 'Константин';
$user_avatar = 'img/user.jpg';

$page_title = 'Главная';

$categories = 
[
    'boards' => 'Доски и лыжи',
    'attachment' => 'Крепления',
    'boots' => 'Ботинки',
    'clothing'=> 'Одежда',
    'tools' => 'Инструменты',
    'others' => 'Разное'
];



$ads = 
[
    [
        'ad_name' => '2014 Rossignol District Snowboard', 
        'ad_category' => $categories['boards'],
        'ad_price' => 10999, 
        'ad_pic' => 'img/lot-1.jpg'
    ], [
        'ad_name' => 'DC Ply Mens 2016/2017 Snowboard', 
        'ad_category' => $categories['boards'], 
        'ad_price' => 159999, 
        'ad_pic' => 'img/lot-2.jpg'
    ], [
        'ad_name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'ad_category' => $categories['attachment'],
        'ad_price' => 8000,
        'ad_pic' => 'img/lot-3.jpg'
    ], [
        'ad_name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'ad_category' => $categories['boots'],
        'ad_price' => 10999, 
        'ad_pic' => 'img/lot-4.jpg'
    ], [
        'ad_name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'ad_category' => $categories['clothing'],
        'ad_price' => 7500,
        'ad_pic' => 'img/lot-5.jpg'
    ], [
        'ad_name' => 'Маска Oakley Canopy', 
        'ad_category' => $categories['others'], 
        'ad_price' => 5400, 
        'ad_pic' => 'img/lot-6.jpg'
    ]
];
