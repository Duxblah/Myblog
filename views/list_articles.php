<table id="list-articles">
	<h1>Derniers actualités</h1>
	<?php foreach ($articles as $article): ?>
		<?php
			$content = $article['content'];
			if (strlen($content) > 450) {
				$content = substr($content, 0, 450) . '...';
			}
		?>
		<h3><a href="?p=single_article&id=<?= $article['id'] ?>"><?= $article['title']; ?></a></h3>
		<div class="article_resume"><?= $content; ?><a href="?p=single_article&id=<?= $article['id'] ?>"><span class="see_more">En savoir plus.</a> </span></div>
		<h4>Informations sur l'article</h4>
		<div class="article_info" >
			<i class="fa fa-user" aria-hidden="true"></i>
			<div class="article_info_author">Ecrit par <a class="link_author" href="?p=single_user&id=<?= $article['id_user'] ?>"><?= $article['user']; ?></a></div>
			<i class="fa fa-calendar" aria-hidden="true"></i>
			<div class="article_info_created">Le <a class="link_date" href="?p=single_user&id=<?= $article['id_user'] ?>"><?= $article['created']; ?></a></div>
			<i class="fa fa-commenting-o" aria-hidden="true"></i>
			<div class="article_info_comments"><?php echo "Commentaires (".$article['nbr'].")"; ?></div>
		</div>
		<hr>
	<?php endforeach; ?>
</table>