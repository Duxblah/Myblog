<?php
require_once('article.php');

function selectAllUsers () {
	return select('user', [], '');
}

function selectUserById ($id) {
	return select('user', ['user.* , role.label as label'], 'JOIN role ON role.id = user.id_role WHERE user.id = ' . $id)[0];
}

function selectUserByPseudo ($pseudo) {
	return select('user', [], 'WHERE pseudo = "' . $pseudo . '"');
}

function selectUserByEmail ($email) {
	return select('user', [], 'WHERE email = "' . $email . '"')[0];
}

function selectUserByArticleId ($id) {
	return select('user', ['user.*'], 'JOIN article ON user.id = article.user_id WHERE article.id = ' . $id);
}

function userAuth ($pseudo, $password) {
	$errors = [];

	if (! $user = selectUserByPseudo(escapeVar($pseudo))) {
		$errors['pseudo'] = 'User doesn\'t exist.';
	} else {
		if (! $user = select('user', [], 'WHERE pseudo = "' . escapeVar($pseudo) . '" AND password = "' . sha1($password) . '"')) {
			$errors['pseudo'] = 'Incorrect pseudo/password combinaison.';
		} else {
			$_SESSION['user'] = $user[0]['id'];
			$_SESSION['role'] = $user[0]['id_role'];
		}
	}

	return $errors;
}

function updateUser ($fields, $values) {
	$association = array();
	$id = 0;

	for ($i = 0; $i < count ($values); $i++) {
		if ($fields[$i] == 'id') {
			$id = $values[$i];
		} else {
			$association[$fields[$i]] = $values[$i];
		}
	}

	if ($id) {
		return update('user', $association, 'WHERE id = ' . $id);
	} else {
		echo $id;
		die;
	}
}
function deleteUser ($id) {
	deleteUserArticles($id);
	return delete('user', 'WHERE id = ' . $id);
}
