
<form action="?p=do_login" method="POST" id="form-login">
	<label>Pseudo</label>
	<input id="input_login" name="pseudo" type="text" <?php if (isset($_POST['pseudo'])) { echo 'value="' . $_POST['pseudo'] . '"'; } ?>>
	<label>Password</label>
	<input id="input_password" name="password" type="password" <?php if (isset($_POST['password'])) { echo 'value="' . $_POST['password'] . '"'; } ?>>
	<input id="input_login" value="Connexion" type="submit">
</form>