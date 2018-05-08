<?php

function f_price_format ($price_value)
	{
		$price = number_format(ceil($price_value), 0, ',', ' ') ;
		$price_value_format = $price .= '<b class="rub">р</b>';
		return $price_value_format;
	}

function renderTemplate ($path, $data) {
	$content = '';
	if (file_exists($path)) {
		ob_start();
		extract ($data);
		require ($path);
		$content = ob_get_clean();
	}

	return $content;
}
?>