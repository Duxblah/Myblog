<?php 
if (! isset($_GET['id'])) {
	header('Location: ?');
}

require_once('model/article.php');

$article = selectArticleById($_GET['id']);

if($article['id_user'] == $_SESSION['user']){
	$template = 'modify_article';
} else {
	$template = "home";
}

