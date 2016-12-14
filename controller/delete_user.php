<?php
if (! isset($_GET['id'])) {
	header('Location: ?');
}

require_once('model/user.php');

deleteUser($_GET['id']);

session_unset();
session_start();

header('Location: ?');