<?php

function selectAllArticles () {
	return select('article', ['article.*, user.pseudo as user'], 'JOIN user ON user.id = article.id_user');
}

function selectArticleById ($id) {
	return select('article', ['article.*, user.pseudo as user'], 'JOIN user ON user.id = article.id_user WHERE article.id = ' . $id)[0];
}

function selectArticleByTitle ($title) {
	return select('article', [], 'WHERE title = "' . $pseudo . '"')[0];
}

function selectArticleByCreationDate ($date) {
	return select('article', [], 'WHERE created = "' . $date . '"')[0];
}

function selectArticleByUpdatedDate ($date) {
	return select('article', [], 'WHERE updated = "' . $date . '"')[0];
}

function selectUserArticles ($id) {
	return select('user', ['article.*'], 'JOIN article ON user.id = article.id_user WHERE user.id = ' . $id);
}

function insertUserArticle ($values, $fields) {
	return insert('article', $values, $fields);
}
