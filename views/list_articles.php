<?php 
	if (! isset($_GET['id']) || empty($_GET['id'])) {
		header('Location: ?');
	}
	$title = 'article';
	echo 'ID : ' . $_GET['id'];
?>

<table>
<thead>
</thead>
<tbody>
	<?php foreach ($articles as $article): ?>
		<tr>
			<td><?= $article->title; ?></td>
			<td><?= $article->title; ?></td>
			<td><?= $article->title; ?></td>
		</tr>
	<?php endforeach; ?>
</tbody>