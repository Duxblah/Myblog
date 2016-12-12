<a href="?">Home</a>

<h1>Inscription</h1>

<form action="?p=register" method="POST">
	<p>
		<label>Pseudo</label>
		<input name="pseudo" type="text" <?php if (isset($_POST['pseudo'])) { echo 'value="' . $_POST['pseudo'] . '"'; } ?>>
		<?php if (isset($_POST['err_pseudo'])) { echo '<span class="error">' . $_POST['err_pseudo'] . '</span>'; } ?>
	</p>
	<p>
		<label>Email</label>
		<input name="email" type="text" <?php if (isset($_POST['email'])) { echo 'value="' . $_POST['email'] . '"'; } ?>>
		<?php if (isset($_POST['err_email'])) { echo'<span class="error">' .  $_POST['err_email'] . '</span>'; } ?>
	</p>
	<p>
		<label>Password</label>
		<input name="password" type="password" <?php if (isset($_POST['password'])) { echo 'value="' . $_POST['password'] . '"'; } ?>>
		<?php if (isset($_POST['err_password'])) { echo '<span class="error">' . $_POST['err_password'] . '</span>'; } ?>
	</p>
	<p>
		<label>Repeat password</label>
		<input name="repeat-password" type="password" <?php if (isset($_POST['repeat-password'])) { echo 'value="' . $_POST['repeat-password'] . '"'; } ?>>
		<?php if (isset($_POST['err_repeat-password'])) { echo '<span class="error">' . $_POST['err_repeat-password'] . '</span>'; } ?>
	</p>

	<p><input value="Register" type="submit"></p>
</form>