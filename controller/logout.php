<?php
if (isset($_SESSION['user'])) {
	unset($_SESSION['user']);
	unset($_SESSION['role']);
}

header('Location: ?');