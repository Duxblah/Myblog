<form action="?p=do_login" method="POST" id="form-login">
	<label>Pseudo</label>
	<input name="pseudo" type="text" <?php if (isset($_POST['pseudo'])) { echo 'value="' . $_POST['pseudo'] . '"'; } ?>>
	<?php if (isset($_POST['err_pseudo'])) { echo '<span class="error">' . $_POST['err_pseudo'] . '</span>'; } ?>
	<label>Password</label>
	<input name="password" type="password" <?php if (isset($_POST['password'])) { echo 'value="' . $_POST['password'] . '"'; } ?>>
	<?php if (isset($_POST['err_password'])) { echo '<span class="error">' . $_POST['err_password'] . '</span>'; } ?>

	<?php if (isset($_POST['err_login'])) { echo '<span class="error">' . $_POST['err_login'] . '</span>'; } ?>

	<input value="Login" type="submit">
</form>