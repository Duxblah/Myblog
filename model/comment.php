<?php 

function selectCommentById ($id) {
	return select('comment', [], 'WHERE id = ' . $id)[0];
}

function selectCommentsByPseudo ($pseudo) {
	return select('comment', [], 'WHERE pseudo = "' . $pseudo . '"')[0];
}

function selectCommentsByUserId ($id) {
	return select('comment', ['comment.*'], 'JOIN user ON user.id = comment.id_user WHERE user.id = ' . $id);
}

function selectCommentsByArticleId ($id) {
	return select('comment', ['comment.*', 'user.pseudo'], 'JOIN user ON user.id = comment.id_user JOIN article ON article.id = comment.id_article WHERE article.id = ' . $id );
}

function insertUserComment ($values, $fields) {
	return insert('comment', $values, $fields);
}
