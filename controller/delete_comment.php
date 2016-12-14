<?php 
if (! isset($_GET['id'])) {
	header('Location: ?');
}

require_once('model/comment.php');

deleteComment($_GET['id']);

header('Location: ?');