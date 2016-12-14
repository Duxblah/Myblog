<?php
require_once('model/user.php');

function auth () {
	$errors = [];

	if (empty($_POST['pseudo'])) {
		$errors['pseudo'] = 'Pseudo must be indicated.';
	}
	if (empty($_POST['password'])) {
		$errors['password'] = 'Password must be indicated.';
	}

	if (empty($errors)){
		$errors = userAuth($_POST['pseudo'], $_POST['password']);
	}

	return $errors;
}

$errors = auth();
$template = 'home';

if (empty($errors)) {
	$message = 'Vous êtes maintenant connecté(e) !';
} else {
	foreach ($errors as $key => $error) {
		$_POST['err_' . $key] = $error;
	}
}