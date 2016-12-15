<?php
require_once('model/article.php');

function check_signup () {
	$errors = [];

	if (empty($_POST['pseudo'])) {
		$errors['pseudo'] = 'Pseudo must be indicated.';
	} 

	$checkPseudo = selectUserByPseudo($_POST['pseudo']);
	if($checkPseudo){
		$errors['pseudo'] = 'Pseudo déjà utilisé !';
	}

	if (empty($_POST['email'])) {
		$errors['email'] = 'Email must be indicated.';
	} else if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
		$errors['email'] = 'Email not valide';
	}

	$checkEmail = selectUserByEmail ($_POST["email"]);
	if($checkEmail){
		$errors['email'] = 'Un compte existe déjà avec cet email !';
	}

	if (empty($_POST['password'])) {
		$errors['password'] = 'Password must be indicated.';
	}
	if (empty($_POST['repeat-password'])) {
		$errors['repeat-password'] = 'Repeat password must be indicated.';
	}
	if (! empty($_POST['password']) && ! empty($_POST['repeat-password']) && $_POST['password'] !== $_POST['repeat-password']) {
		$errors['password'] = 'Password and repeat password must be identical.';
		$errors['repeat-password'] = 'Password and repeat password must be identical.';
	}

	return $errors;
}

$errors = check_signup();

if (empty($errors)) {
	$fields = ['pseudo', 'email', 'password', 'id_role'];
	$values = [escapeVar($_POST['pseudo']), escapeVar($_POST['email']), sha1($_POST['password']), '1'];

	if (insert('user', $fields, $values)) {
		$message = 'Votre compte a bien été créé ! Connectez-vous dés maintenant !';
	} else {
		$message = 'Intern error.';
	}

	$template = 'home';
} else {
	foreach ($errors as $key => $error) {
		$_POST['err_' . $key] = $error;
	}

	$template = 'signup';
}