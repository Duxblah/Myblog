<?php
if (isset($_SESSION['role']) && !empty($_SESSION['role'] == 3)) { 
	require_once('model/user.php');
	require_once('model/role.php');

	$users = selectAllUsers();
	$roles = selectAllRoles();

	$template = 'admin_list_users';
} else {
	$message = "Vous n'avez pas l'autorisation d'accéder a cette page !";
	$template = "home";
}