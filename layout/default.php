<!DOCTYPE html>
<html>
<head>
	<title>SuperBlog | <?= ucfirst($p) ?></title>
	<link href="styles/g.css" rel="stylesheet">
</head>
<body>
	<div id="container">
		<?php include('views/' . $template.'.php'); ?>
	</div>
</body>
</html>