<?php
require_once('model/user.php');

$users = selectAllUsers();

$template = 'admin_list_users';