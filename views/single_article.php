<a href="?p=list_articles"><< Retour aux articles</a>
<?php if($article['id_image'] != 0){ ?>
	<div id="img_article">
		<img src="<?php echo "images/img_article_".$article['id_image'].".".$article['ext_image']; ?>">
	</div>
<?php } ?>
<h1 class="title_article"><?= $article['title'] ?></h1>
<div class="info_single_article">
	Posté le <?= $article['created'] ?><br>
</div>

<div><?= $article['content'] ?></div>
<div class="info_single_article">
	<?php if(isset($_SESSION['user']) && $article['id_user'] == $_SESSION['user']){?>
		<div id="modif_article"><a href="?p=modify_article&id=<?= $article['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Modifier </a></div>
		<div id="delete_article"><a href="?p=delete_article&id=<?= $article['id'] ?>"><i class="fa fa-times" aria-hidden="true"></i>Supprimer </a></div>
	<?php } ?>
	<div id="author_signature">Auteur: <a href="?p=single_user&id=<?= $article['id_user'] ?>"> <?= $article['user'] ?> </a></div>
</div>
<hr>

<div id="comments_container">
	<?php if (isset($_SESSION['user'])) {?>
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
	<?php } ?>
	<hr>
	<div id="list_comments_container">
		<?php foreach ($comments as $comment): ?>
			<div class="comments_infos">
				<div class="comment_info_author">Posté par <a class="link_author" href="?p=single_user&id=<?= $comment['id_user'] ?>"><?= $comment['pseudo'] ?></a></div>
				<div class="comment_info_created">Le <?= $comment['created']; ?></a></div>
			</div>
			<div class="comment_content"><?= $comment['content'] ?></a></div>
			<?php if(isset($_SESSION['user']) && $comment['id_user'] == $_SESSION['user']){?>
				<div id="delete_comment"><a href="?p=delete_comment&id=<?= $comment['id'] ?>"><i class="fa fa-times" aria-hidden="true"></i>Supprimer </a></div>
			<?php } ?>
			<hr class="comment_separator">
		<?php endforeach; ?>
	</div>

</div>