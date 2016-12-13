<?php
if (! isset($_GET['id'])) {
	header('Location: ?');
}

require_once('model/article.php');

deleteArticle($_GET['id']);

header('Location: ?');