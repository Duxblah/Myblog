<?php 

require_once('model/comment.php');
function check_comment () {
	$errors = [];
	if (empty($_POST['content'])) {
		$errors['content'] = 'Content must be indicated.';
	}
	return $errors;
}

$errors = check_comment();

if (empty($errors)) {
	$fields = ['content', 'id_user', 'id_article'];
	$values = [escapeVar($_POST['content']), $_SESSION['user'], $_POST['article_id']];
	$id = insertUserComment($fields, $values);
	if ($id) {
		$template = 'single_article';
		header('Location: ?p=single_article&id=' . $_POST['article_id']);
	} else {
		$template = 'home';
		$_POST['err_internal'] = 'Internal error';
		header('Location: ?');
	}
} else {
	foreach ($errors as $key => $error) {
		$_POST['err_' . $key] = $error;
	}
	$template = 'single_article';
	header('Location: ?p=single_article&id=' . $_POST['article_id']);
}