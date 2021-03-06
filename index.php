<?php

require_once 'functions.php';
require_once 'data.php';

$page_title = 'Главная';

$categories = get_categories();

$ads = get_ad();


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
