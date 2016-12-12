<?php
require_once('model/article.php');

$articles = selectAllArticles();

$template = 'list_articles';
