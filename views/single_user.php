<h1>Profil de <?php echo $user['pseudo']; ?></h1>
<h2>Rôle: <?php echo $user['label']; ?></h2>
<?php if (isset($_SESSION['user']) && $user['id'] == $_SESSION['user']) { ?>
	<div id="delete_user"><a href="?p=delete_user&id=<?= $user['id'] ?>"><i class="fa fa-times" aria-hidden="true"></i>Supprimer mon compte </a></div>
<?php } ?>
if()
<h2></h2>

<table id="list-articles">
	<thead>
		<tr>
			<th>Title</th>
			<th>Content</th>
			<?php if (isset($_SESSION['user']) && $user['id'] == $_SESSION['user']) { ?>
				<th>Modifier</th>
				<th>Supprimer</th>
			<?php } ?>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($user['articles'] as $article): ?>
			<?php
				$content = $article['content'];
				if (strlen($content) > 400) {
					$content = substr($content, 0, 400) . '...';
				}
			?>
			<tr>
				<td><a href="?p=single_article&id=<?= $article['id'] ?>"><?= $article['title']; ?></a></td>
				<td><a href="?p=single_article&id=<?= $article['id'] ?>"><?= $content; ?></a></td>
				<?php if (isset($_SESSION['user']) && $user['id'] == $_SESSION['user']) { ?>
					<td class="fa_single_user"><a href="?p=modify_article&id=<?= $article['id'] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>

					<td class="fa_single_user"><a href="?p=delete_article&id=<?= $article['id'] ?>"><i class="fa fa-times" aria-hidden="true"></i></a></td>
				<?php } ?>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>