<?php
require_once('model/user.php');

$users = selectUserBySearchPseudo($_POST['search']);
$template = 'admin_list_users';

