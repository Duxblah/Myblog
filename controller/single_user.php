<?php
if (! isset ($_GET['id'])) {
	header('Location: ?');
}

require_once('model/user.php');
require_once('model/article.php');

$user = selectUserById($_GET['id']);
$user['articles'] = selectUserArticles($_GET['id']);

$template = 'single_user';
