<table id="list-articles">
	<thead>
		<tr>
			<th>Title</th>
			<th>Content</th>
			<th>User</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($articles as $article): ?>
			<?php
				$content = $article['content'];
				if (strlen($content) > 30) {
					$content = substr($content, 27) . '...';
				}
			?>

			<tr>
				<td><a href="?p=single_article&id=<?= $article['id'] ?>"><?= $article['title']; ?></a></td>
				<td><a href="?p=single_article&id=<?= $article['id'] ?>"><?= $content; ?></a></td>
				<td><a href="?p=single_user&id=<?= $article['id_user'] ?>"><?= $article['user']; ?></a></td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>