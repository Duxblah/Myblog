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

function deleteComment ($id) {
	$conditions = 'WHERE id';

	if (is_array($id)) {
		$conditions .= ' IN (';

		foreach ($id as $index => $i) {
			if ($index != 0) {
				$conditions .= ', ';
			}

			$conditions .= $i;
		}

		$conditions .= ')';
	} else {
		$conditions .= ' = ' . $id;
	}
	
	return delete('comment', $conditions);
}

function deleteCommentsOfArticle ($id) {
	$ids = array();

	if (is_array($id)) {
		foreach ($id as $index => $i) {
			$comments = selectCommentsByArticleId($i);

			foreach ($comments as $comment) {
				$ids[] = $comment['id'];
			}
		}
	} else {
		$comments = selectCommentsByArticleId($id);

		foreach ($comments as $comment) {
			$ids[] = $comment['id'];
		}
	}

	return deleteComment($ids);
}
