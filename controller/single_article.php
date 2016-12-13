<?php
if (! isset ($_GET['id'])) {
	header('Location: ?');
}

require_once('model/article.php');
require_once('model/comment.php');

$article = selectArticleById($_GET['id']);
$comments = selectCommentsByArticleId($article['id']);

$template = 'single_article';
