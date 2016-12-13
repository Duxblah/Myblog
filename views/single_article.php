<a href="?p=list_articles"><< Retour aux articles</a>

<h1 class="title_article"><?= $article['title'] ?></h1>

<div class="info_single_article">
	Posté le <?= $article['created'] ?><br>
</div>

<div><?= $article['content'] ?></div>
<div id="author_signature">Auteur: <a href="?p=single_user&id=<?= $article['id'] ?>"> <?= $article['user'] ?> </a></div>
<hr>

<div id="comments_container">
	<div id="add_comment_container">
		<h3>Commentaires</h3>
		<form action="?p=do_comment" method="POST" name="form_comment">
			<input type="hidden" name="article_id" value="<?php echo $article['id'] ?>">
			<textarea id="textarea_comment" rows="4" cols="50" name="content"><?php if (isset($_POST['content'])) { echo $_POST['content']; } ?></textarea>
			<?php if (isset($_POST['err_content'])) { echo '<span class="error">' . $_POST['err_content'] . '</span>'; } ?>
			<?php if (isset($_POST['err_comment'])) { echo '<span class="error">' . $_POST['err_comment'] . '</span>'; } ?>

			<p><input value="Ajouter" type="submit"></p>
		</form>
	</div>
	<hr>
	<div id="list_comments_container">
		<?php foreach ($comments as $comment): ?>
			<div class="comments_infos">
				<div class="comment_info_author">Posté par <a class="link_author" href="?p=single_user&id=<?= $comment['id_user'] ?>"><?= $comment['pseudo'] ?></a></div>
				<div class="comment_info_created">Le <?=  $comment['created']; ?></a></div>
			</div>
			<div class="comment_content"><?= $comment['content'] ?></a></div>
			<hr class="comment_separator">
		<?php endforeach; ?>
	</div>

</div>