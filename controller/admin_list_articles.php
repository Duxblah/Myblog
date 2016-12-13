<?php
require_once('model/article.php');

$articles = selectAllArticles();

$template = 'admin_list_articles';