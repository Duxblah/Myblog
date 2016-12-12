<h1>Connexion</h1>

<form action="?p=do_login" method="POST">
	<p>
		<label>Pseudo</label>
		<input name="pseudo" type="text" <?php if (isset($_POST['pseudo'])) { echo 'value="' . $_POST['pseudo'] . '"'; } ?>>
		<?php if (isset($_POST['err_pseudo'])) { echo '<span class="error">' . $_POST['err_pseudo'] . '</span>'; } ?>
	</p>
	<p>
		<label>Password</label>
		<input name="password" type="password" <?php if (isset($_POST['password'])) { echo 'value="' . $_POST['password'] . '"'; } ?>>
		<?php if (isset($_POST['err_password'])) { echo '<span class="error">' . $_POST['err_password'] . '</span>'; } ?>
	</p>

	<?php if (isset($_POST['err_login'])) { echo '<span class="error">' . $_POST['err_login'] . '</span>'; } ?>

	<p><input value="Login" type="submit"></p>
</form>