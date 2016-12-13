<h1>Ecrire un article</h1>
<div class="warning_form">Tous les champs sont nécessaires afin d'enregistrer un nouvel article !</div>
<div class="form_container">
	<form action="?p=do_article" method="POST" name="form_article">

			<label>Titre</label>
			<input name="title" type="text" <?php if (isset($_POST['title'])) { echo 'value="' . $_POST['title'] . '"'; } ?>>
			<?php if (isset($_POST['err_title'])) { echo '<span class="error">' . $_POST['err_title'] . '</span>'; } ?>
		
		<p>
			<label>Contenu</label>
			<textarea id="textarea_article" rows="4" cols="50" name="content"><?php if (isset($_POST['content'])) { echo $_POST['content']; } ?></textarea>
			<?php if (isset($_POST['err_content'])) { echo '<span class="error">' . $_POST['err_content'] . '</span>'; } ?>
		</p>

		<?php if (isset($_POST['err_article'])) { echo '<span class="error">' . $_POST['err_article'] . '</span>'; } ?>

		<p><input value="Enregistrer" type="submit"></p>
	</form>
</div>