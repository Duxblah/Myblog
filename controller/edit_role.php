<?php 
if (! isset($_POST)) {
	header('Location: ?');
}

require_once('model/role.php');
require_once('model/user.php');

function check_role () {
	$errors = [];
	if (empty($_POST['role'])) {
		$errors['role'] = 'Title must be indicated.';
	}

	return $errors;
}

$errors = check_role();
$roles = selectAllRoles();
if (empty($errors)) {
	$fields = ['id','id_role'];
	$values = [escapeVar($_GET['id']),escapeVar($_POST['role'])];
	updateUser($fields, $values);

	include('controller/admin_list_users.php');
} else {
	foreach ($errors as $key => $error) {
		$_POST['err_' . $key] = $error;
	}

	$template = 'admin_list_users';
}