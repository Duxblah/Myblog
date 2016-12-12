<?php 

function selectCommentById ($id) {
	return select('comment', [], 'WHERE id = ' . $id)[0];
}

function selectCommentsByPseudo ($pseudo) {
	return select('comment', [], 'WHERE pseudo = "' . $pseudo . '"')[0];
}

function selectCommentsByUserId ($id) {
	return select('comment', ['comment.*'], 'JOIN user ON user.id = comment.user_id WHERE user.id = ' . $id);
}

function selectCommentsByArticleId ($id) {
	return select('comment', ['comment.*'], 'JOIN article ON article.id = comment.article_id WHERE article.id = ' . $id);
}

