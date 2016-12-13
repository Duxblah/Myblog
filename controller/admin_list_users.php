<?php
require_once('model/user.php');
require_once('model/role.php');

$users = selectAllUsers();
$roles = selectAllRoles();

$template = 'admin_list_users';