<?php 

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
	$fields = ['title', 'content', 'id_user'];
	$values = [escapeVar($_POST['title']), escapeVar($_POST['content']), $_SESSION['user']];
	$id = insertUserArticle($fields, $values);

	if ($id) {
		$template = 'single_article';
		header('Location: ?p=single_article&id=' . $id);
	} else {
		$template = 'home';
		$_POST['err_internal'] = 'Internal error';
		header('Location: ?');
	}
} else {
	foreach ($errors as $key => $error) {
		$_POST['err_' . $key] = $error;
	}

	$template = 'new_article';
}