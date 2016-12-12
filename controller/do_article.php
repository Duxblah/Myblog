<?php 

require_once('model/article.php');
var_dump($_POST);
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

if (empty($errors)){
	$fields = ['title', 'content', 'user_id'];
	$values = [escapeVar($_POST['title']), escapeVar($_POST['content']), '10'];
	$errors = insertUserArticle($fields, $values);
	var_dump($errors);
	$template = 'home';
} else {
	foreach ($errors as $key => $error) {
		$_POST['err_' . $key] = $error;
	}

	$template = 'new_article';
}