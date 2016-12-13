<h1>Modifier un article</h1>
<div class="form_container">
	<form action="?p=edit_article&id=<?= $article['id'] ?>" method="POST" name="form_article">

			<label>Titre</label>
			<input name="title" type="text" value="<?= $article['title'] ?>">
			<?php if (isset($_POST['err_title'])) { echo '<span class="error">' . $_POST['err_title'] . '</span>'; } ?>
		
		<p>
			<label>Contenu</label>
			<textarea id="textarea_article" rows="4" cols="50" name="content"><?= $article['content'] ?></textarea>
			<?php if (isset($_POST['err_content'])) { echo '<span class="error">' . $_POST['err_content'] . '</span>'; } ?>
		</p>

		<?php if (isset($_POST['err_article'])) { echo '<span class="error">' . $_POST['err_article'] . '</span>'; } ?>

		<p><input value="Enregistrer" type="submit"></p>
	</form>
</div>