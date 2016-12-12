<?php 

require_once('model/article.php');

function add_article () {
	$errors = [];
	if (empty($_POST['title'])) {
		$errors['title'] = 'Title must be indicated.';
	}
	if (empty($_POST['content'])) {
		$errors['content'] = 'Content must be indicated.';
	}

	if (empty($errors)){
		$errors = userAuth($_POST['pseudo'], $_POST['password']);
	}

	return $errors;
}

