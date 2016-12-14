<h1>Register</h1>

<form action="?p=register" method="POST" id="form_register">
	<p>
		Afin de créer un compte, merci de remplir les renseignements suivants:
	</p>
	<p>
		<label class="label_register">Pseudo</label>
		<input name="pseudo" class="input_signup" type="text" <?php if (isset($_POST['pseudo'])) { echo 'value="' . $_POST['pseudo'] . '"'; } ?>>
		<?php if (isset($_POST['err_pseudo'])) { echo '<span class="error">' . $_POST['err_pseudo'] . '</span>'; } ?>
	</p>
	<p>
		<label class="label_register">Email</label>
		<input name="email" class="input_signup" type="text" <?php if (isset($_POST['email'])) { echo 'value="' . $_POST['email'] . '"'; } ?>>
		<?php if (isset($_POST['err_email'])) { echo'<span class="error">' .  $_POST['err_email'] . '</span>'; } ?>
	</p>
	<p>
		<label class="label_register">Password</label>
		<input name="password" class="input_signup" type="password" <?php if (isset($_POST['password'])) { echo 'value="' . $_POST['password'] . '"'; } ?>>
		<?php if (isset($_POST['err_password'])) { echo '<span class="error">' . $_POST['err_password'] . '</span>'; } ?>
	</p>
	<p>
		<label class="label_register">Repeat password</label>
		<input name="repeat-password" class="input_signup" type="password" <?php if (isset($_POST['repeat-password'])) { echo 'value="' . $_POST['repeat-password'] . '"'; } ?>>
		<?php if (isset($_POST['err_repeat-password'])) { echo '<span class="error">' . $_POST['err_repeat-password'] . '</span>'; } ?>
	</p>

	<p><input value="Valider" type="submit"></p>
</form>