<h1><?= $user['pseudo'] ?></h1>

<div></div>

<table id="list-articles">
	<thead>
		<tr>
			<th>Title</th>
			<th>Content</th>
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
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>