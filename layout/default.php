<!DOCTYPE html>
<html>
<head>
	<title>SuperBlog | <?= ucfirst($title) ?></title>
	<link href="styles/style.css" rel="stylesheet">
	<link href="styles/font-awesome.min.css" rel="stylesheet">
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	<script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
	<div id="header">
		<ul id="nav_blog">
			<li><a href="?p=home.php">Accueil</a></li>
			<li><a href="?p=list_articles">Articles</a></li>

			<?php if (! isset($_SESSION['user']) || empty($_SESSION['user'])) { ?>
				<li>
					<a href="?p=signup">S'enregistrer</a>
				</li>
				<li>
					<?php include('views/login.php'); ?>
				</li>
			<?php } else { ?>
				<li><a href="?p=new_article">Nouveau</a></li>
				<li><a href="?p=logout">Déconnexion</a></li>
				<?php if ($_SESSION['user']) { ?>
					<li><a href="?p=admin">Admin</a></li>
				<?php } ?>
			<?php } ?>
		</ul>
	</div>
	<?php if (isset($_POST['err_password'])) { echo '<span class="error msg_login_error">' . $_POST['err_password'] . '</span>'; } ?>
	<?php if (isset($_POST['err_login'])) { echo '<span class="error msg_login_error">' . $_POST['err_login'] . '</span>'; } ?>
	<?php if (isset($_POST['err_pseudo'])) { echo '<span class="error msg_login_error">' . $_POST['err_pseudo'] . '</span>'; } ?>
	<div id="container">
		<?php include('views/' . $template.'.php'); ?>
	</div>
</body>
</html>