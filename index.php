<?php
session_start();

// Conf
$p = (isset($_GET['p']) && ! empty($_GET['p'])) ? $_GET['p'] : '';
$layout = 'default';

// Init
require_once('includes/sql.php');
startConnection();

// Router
if (
	($p === 'article' && ! isset($_GET['id']))
	|| ! $p
	) {
	$p = 'home';
}

$template = $p;


// Controller
if ($p !== 'home') {
	if (file_exists('controller/' . $p . '.php')) {
		include('controller/' . $p . '.php');
	} else {
		header('Location: ?');
	}
} 

// View
if (file_exists('views/' . $template.'.php')) {
	include('layout/' . $layout . '.php');
} else {
	header('Location: ?');
}