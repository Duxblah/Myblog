<?php
require_once('model/article.php');

$check = deleteArticle($_GET['id']);
$articles = selectAllArticles();
if($check == true){
	$_POST['error'] = true;
} else {
	$_POST['error'] = false;
}

$template ='admin_list_articles';