<?php
require_once('model/article.php');

$articles = selectArticleBySearchTitle($_POST['search']);
$template = 'list_articles';

