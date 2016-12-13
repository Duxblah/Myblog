<?php 
include('nav_admin.php');
?>
<table id="list_articles_admin">
	<h1>Liste des articles</h1>
	<tr>
       <th>Titre</th>
       <th>Contenu</th>
       <th>Auteur</th>
       <th>Créé le</th>
       <th>Actions</th>
   </tr>
	<?php foreach ($articles as $article): ?>
		<?php
			$content = $article['content'];
			if (strlen($content) > 20) {
				$content = substr($content, 0, 100) . '...';
			}
		?>
	<tr>
       <td><a href="?p=single_article&id=<?= $article['id'] ?>"><?= $article['title']; ?></a></td>
       <td><?= $content; ?><a href="?p=single_article&id=<?= $article['id'] ?>"></td>
       <td><a class="link_author" href="?p=single_user&id=<?= $article['id_user'] ?>"><?= $article['user']; ?></a></td>
       <td><?= $article['created'] ?></td>
       <td><a href="?p=delete_article&id=&id=<?= $article['id'] ?>"><i class="fa fa-trash trash_admin" aria-hidden="true"></i></td>
    </tr>
	<?php endforeach; ?>
</table>