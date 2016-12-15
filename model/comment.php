<?php 
require_once('user.php');

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
			if (! isset($_SESSION['user']) || 
				(
					$_SESSION['user'] != selectUserByCommentId($i)['id'] 
					&& (! isset($_SESSION['role']) || $_SESSION['role'] != 3))
				) {
				echo 'comment ' . $i;
				var_dump(selectUserByCommentId($i)['id']);die;
				header('Location: ?');
			} else {
				if ($index != 0) {
					$conditions .= ', ';
				}

				$conditions .= $i;
			}
		}

		$conditions .= ')';
	} else {
		if (! isset($_SESSION['user']) || 
			(
				$_SESSION['user'] != selectUserByCommentId($id)['id'] 
				&& (! isset($_SESSION['role']) || $_SESSION['role'] != 3))
			) {
			echo 'comment ' . $i;
			var_dump(selectUserByCommentId($id)['id']);die;
			header('Location: ?');
		} else {
			$conditions .= ' = ' . $id;
		}
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

function deleteUserComments ($id) {
	$comments = selectCommentsByUserId($id);
	$ids = '';
	echo 'i';

	foreach ($comments as $index => $comment) {
		if ($index != 0) {
			$ids .= ', ';
		}

		$ids .= $comment['id'];
	}

	return delete('comment', 'WHERE id IN (' . $ids . ')');
}

