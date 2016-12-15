<?php
require_once('model/user.php');
require_once('model/role.php');
$users = selectUserBySearchPseudo($_POST['search']);

$roles = selectAllRoles();
$template = 'admin_list_users';

