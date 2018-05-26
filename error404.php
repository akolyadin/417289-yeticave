<?php

require_once 'functions.php';
require_once 'data.php';

$categories = get_categories();

$page_title = 'Упс';

$content_404 = render_template('error404', [
]);

$layout = render_template('layout', [
	'content' => $content_404,
    'is_auth' => $is_auth, 
    'page_title' => $page_title, 
    'user_name' => $user_name, 
    'user_avatar' => $user_avatar, 
    'categories' => $categories   
]);


print($layout);