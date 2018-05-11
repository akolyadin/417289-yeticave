<?php 
require_once ('functions.php');
require_once ('data.php');

$content = renderTemplate('templates/index.php', 
    ['categories' => $categories, 
    'ads' => $ads] );

$layout = renderTemplate('templates/layout.php', 
    ['is_auth' => $is_auth, 
    'title' => $title, 
    'user_name' => $user_name, 
    'user_avatar' => $user_avatar, 
    'categories' => $categories
]);
print($layout)

