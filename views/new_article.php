<h1>Ecrire un article</h1>

<form action="?p=do_article" method="POST" name="form_article">
	<p>
		<label>Titre</label>
		<input name="title" type="text" <?php if (isset($_POST['title'])) { echo 'value="' . $_POST['title'] . '"'; } ?>>
		<?php if (isset($_POST['err_title'])) { echo '<span class="error">' . $_POST['err_title'] . '</span>'; } ?>
	</p>
	<p>
		<label>Contenu</label>
		<textarea rows="4" cols="50" name="content" form="form_article">
			<?php if (isset($_POST['content'])) { echo $_POST['content']; } ?>
		</textarea>
		<?php if (isset($_POST['err_content'])) { echo '<span class="error">' . $_POST['err_content'] . '</span>'; } ?>
	</p>

	<?php if (isset($_POST['err_article'])) { echo '<span class="error">' . $_POST['err_article'] . '</span>'; } ?>

	<p><input value="Créer" type="submit"></p>
</form>