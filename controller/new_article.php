<?php 

if (isset($_SESSION['role']) && !empty($_SESSION['role'] > 1)) { 
	$template = 'new_article';
} else {
	$template = 'home';
}
