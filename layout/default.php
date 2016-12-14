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
			<li>
				<form action="?p=search_articles" method="POST" id="form_articles">
				<input id="input_search" name="search" type="text" placeholder="Recherche...">
				<button id="input_btn_search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
				</form>
			</li>
			<?php if (! isset($_SESSION['user']) || empty($_SESSION['user'])) { ?>
				<li>
					<a href="?p=signup">S'enregistrer</a>
				</li>
				<li>
					<?php include('views/login.php'); ?>
				</li>
			<?php } else { ?>
				<?php if (isset($_SESSION['role']) && !empty($_SESSION['role'] > 1)) { ?>
					<li><a href="?p=new_article">Nouveau</a></li>
				<?php } ?>
				<li id="nav_deco" ><a href="?p=logout">Déconnexion</a></li>
				<li id="nav_profil"><a href="<?php echo "?p=single_user&id=".$_SESSION['user']; ?>"><i class="fa fa-user-circle-o" aria-hidden="true"></i>Profil</a></li>
				<?php if ($_SESSION['user']) { ?>
					<li><a href="?p=admin">Admin</a></li>
				<?php } ?>
			<?php } ?>
		</ul>
	</div>
	<?php if (isset($_POST['err_password'])) { echo '<span class="error msg_login_error">' . $_POST['err_password'] . '</span>'; } ?>
	<?php if (isset($_POST['err_login'])) { echo '<span class="error msg_login_error">' . $_POST['err_login'] . '</span>'; } ?>
	<?php if (isset($_POST['err_pseudo'])) { echo '<span class="error msg_login_error">' . $_POST['err_pseudo'] . '</span>'; } ?>
	<?php if (isset($_POST['err_search'])) { echo '<span class="error msg_login_error">' . $_POST['err_search'] . '</span>'; } ?>
	<div id="container">
		<?php include('views/' . $template.'.php'); ?>
	</div>
</body>
</html>