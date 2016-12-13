<?php 
if (! isset($_GET['id'])) {
	header('Location: ?');
}

require_once('model/article.php');

$article = selectArticleById($_GET['id']);

$template = 'modify_article';