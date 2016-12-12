<?php 
	if (! isset($_GET['id']) || empty($_GET['id'])) {
		header('Location: ?');
	}
	$title = 'article';
	echo 'ID : ' . $_GET['id'];
?>