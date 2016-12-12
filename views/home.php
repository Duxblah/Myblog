<?php
	$title = 'home';

	if (isset($message) && ! empty($message)) {
		echo $message;
	}
?>

<a href="?p=list_articles">Articles</a>
<?php if (! isset($_SESSION['user']) || empty($_SESSION['user'])) { ?>
	<a href="?p=signup">Register</a>
	<?php include('views/login.php'); ?>
<?php } else { ?>
	<a href="?p=logout">Logout</a>
<?php } ?>
