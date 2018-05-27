<?php

require_once 'functions.php';
require_once 'data.php';

$id_category = intval($_GET['id_category']);


$categories = get_categories();

$category = get_categories($id_category);

$ads = get_ad(-1, $id_category);


if (count($ads)>0) { 
	$content = render_template('all-lots', [
		'ads' => $ads,
		'category' => $category
	]);

	$page_title = $category[0]['category_name'];

	$layout = render_template('layout', [
		'content' => $content,
	    'is_auth' => $is_auth, 
	    'page_title' => $page_title, 
	    'user_name' => $user_name, 
	    'user_avatar' => $user_avatar, 
	    'categories' => $categories   
	]);

	print($layout);
}


else {
    header('Location: error404.php'); exit;
}