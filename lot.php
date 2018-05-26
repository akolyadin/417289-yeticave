<?php

require_once 'functions.php';
require_once 'data.php';

$id_ad = intval($_GET['id_ad']);

$ads = get_ad($id_ad);

$categories = get_categories();

if (count($ads)>0) {
	$bets = get_bets($id_ad);

	$lot = render_template('lot', [
	'ads' => $ads,
	'bets' => $bets
	]);
	
	$page_title = $ads[0]['ad_name'];

	$layout = render_template('layout', [
	'content' => $lot,
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



