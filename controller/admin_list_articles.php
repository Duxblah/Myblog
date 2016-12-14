<?php
if (isset($_SESSION['role']) && !empty($_SESSION['role'] == 3)) { 
	require_once('model/article.php');

	$articles = selectAllArticles();

	$template = 'admin_list_articles';
} else {
	$message = "Vous n'avez pas l'autorisation d'accéder a cette page !";
	$template = "home";
}