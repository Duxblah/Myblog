<h1>Profil de <?= $user['pseudo'] ?></h1>

<?php if (isset($_SESSION['user']) && $user['id'] == $_SESSION['user']) { ?>
	<div id="delete_user"><a href="?p=delete_user&id=<?= $user['id'] ?>"><i class="fa fa-times" aria-hidden="true"></i>Supprimer mon compte </a></div>
<?php } ?>

<div></div>

<table id="list-articles">
	<thead>
		<tr>
			<th>Title</th>
			<th>Content</th>
			<?php if (isset($_SESSION['user']) && $user['id'] == $_SESSION['user']) { ?>
				<th>Actions</th>
			<?php } ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($user['articles'] as $article): ?>
			<?php
				$content = $article['content'];
				if (strlen($content) > 30) {
					$content = substr($content, 27) . '...';
				}
			?>

			<tr>
				<td><a href="?p=single_article&id=<?= $article['id'] ?>"><?= $article['title']; ?></a></td>
				<td><a href="?p=single_article&id=<?= $article['id'] ?>"><?= $content; ?></a></td>
				<?php if (isset($_SESSION['user']) && $user['id'] == $_SESSION['user']) { ?>
					<td><a href="?p=modify_article&id=<?= $article['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Modifier </a><a href="?p=delete_article&id=<?= $article['id'] ?>"><i class="fa fa-times" aria-hidden="true"></i>Supprimer </a></td>
				<?php } ?>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>