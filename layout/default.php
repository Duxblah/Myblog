<!DOCTYPE html>
<html>
<head>
	<title>SuperBlog | <?= ucfirst($p) ?></title>
	<link href="styles/style.css" rel="stylesheet">
</head>
<body>
	<ul id="nav_blog">
		<li><a href="?p=home.php">Accueil</a></li>
		<li><a href="?p=list_articles">Articles</a></li>
		<li><a href="?p=new_article">Nouveau</a></li>
		<li><a href="?p=admin.php">Admin</a></li>
	</ul>
	<div id="container">
		<?php include('views/' . $template.'.php'); ?>
	</div>
</body>
</html>