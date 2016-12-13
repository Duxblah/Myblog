<?php 
include('nav_admin.php');
?>
<table id="list_articles_admin">
	<h1>Liste des articles</h1>
	<?php if (isset($_POST['error'])) {
		if($_POST['error'] == true)
			echo '<tr class="table_valide"><td colspan=5><span class="valide">L\'article a bien été supprimé</span></td></tr>'; 
		else
			echo '<tr class="table_error"><td colspan=5><span class="error">Erreur lors de la suppression</span></td></tr>'; 
	} ?>
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
       <td><a href="?p=delete_article_admin&id=<?= $article['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Supprimer </a></td>
    </tr>
	<?php endforeach; ?>
</table>