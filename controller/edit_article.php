<?php 
if (! isset($_POST)) {
	header('Location: ?');
}

require_once('model/article.php');

function check_article () {
	$errors = [];
	if (empty($_POST['title'])) {
		$errors['title'] = 'Title must be indicated.';
	}
	if (empty($_POST['content'])) {
		$errors['content'] = 'Content must be indicated.';
	}

	return $errors;
}

$errors = check_article();

if (empty($errors)) {
	$fields = ['id', 'title', 'content', 'id_user'];
	$values = [escapeVar($_GET['id']), escapeVar($_POST['title']), escapeVar($_POST['content']), $_SESSION['user']];
	updateArticle($fields, $values);

	$template = 'single_article';
	header('Location: ?p=single_article&id=' . $_GET['id']);
} else {
	foreach ($errors as $key => $error) {
		$_POST['err_' . $key] = $error;
	}

	$template = 'modify_article';
}