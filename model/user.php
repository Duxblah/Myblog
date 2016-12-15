<?php
require_once('article.php');

function selectAllUsers () {
	return select('user', [], '');
}

function selectUserById ($id) {
	return select('user', ['user.* , role.label as label'], 'LEFT JOIN role ON role.id = user.id_role WHERE user.id = ' . $id)[0];
}

function selectUserByPseudo ($pseudo) {
	return select('user', [], 'WHERE pseudo = "' . $pseudo . '"');
}

function selectUserBySearchPseudo ($search) {
	return select('user', [], 'WHERE pseudo LIKE "%' . $search . '%"');
}

function selectUserByEmail ($email) {
	return select('user', [], 'WHERE email = "' . $email . '"');
}

function selectUserByArticleId ($id) {
	return select('user', ['user.*'], 'LEFT JOIN article ON user.id = article.id_user WHERE article.id = ' . $id)[0];
}

function selectUserByCommentId ($id) {
	return select('user', ['user.*'], 'LEFT JOIN comment ON user.id = comment.id_user WHERE comment.id = ' . $id)[0];
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
	if (! isset($_SESSION['user']) || 
		(
			$_SESSION['user'] != selectUserById($id)['id'] 
			&& (! isset($_SESSION['role']) || $_SESSION['role'] != 3))
		) {
		header('Location: ?');
	} else {
		deleteUserArticles($id);
		deleteUserComments($id);
		return delete('user', 'WHERE id = ' . $id);
	}
}
