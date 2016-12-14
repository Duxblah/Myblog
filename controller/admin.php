<?php 
if (isset($_SESSION['role']) && !empty($_SESSION['role'] == 3)) { 
	$template = 'admin';
} else {
	$message = "Vous n'avez pas l'autorisation d'accéder a cette page !";
	$template = 'home';
}
