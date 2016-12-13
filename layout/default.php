<!DOCTYPE html>
<html>
<head>
	<title>SuperBlog | <?= ucfirst($title) ?></title>
	<link href="styles/style.css" rel="stylesheet">
</head>
<body>
	<div id="header">
		<ul id="nav_blog">
			<li><a href="?p=home.php">Home</a></li>
			<li><a href="?p=list_articles">Articles</a></li>

			<?php if (! isset($_SESSION['user']) || empty($_SESSION['user'])) { ?>
				<li><a href="?p=signup">Register</a></li>
				<?php include('views/login.php'); ?>
			<?php } else { ?>
				<li><a href="?p=new_article">Write</a></li>
				<li><a href="?p=logout">Logout</a></li>
				<?php if ($_SESSION['user']) { ?>
					<li><a href="?p=admin.php">Admin</a></li>
				<?php } ?>
			<?php } ?>
		</ul>
	</div>
	<div id="container">
		<?php include('views/' . $template.'.php'); ?>
	</div>
</body>
</html>