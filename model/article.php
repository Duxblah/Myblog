<?php
require_once('user.php');
require_once('comment.php');

function selectAllArticles () {
	return select('article', ['article.*, user.pseudo as user, count(comment.id) as nbr'], 'JOIN user ON user.id = article.id_user LEFT JOIN comment ON article.id = comment.id_article GROUP BY article.id ORDER BY article.created DESC ');
}

function selectArticleById ($id) {
	return select('article', ['article.*, user.pseudo as user'], 'JOIN user ON user.id = article.id_user WHERE article.id = ' . $id)[0];
}

function selectArticleIdByComment ($id) {
	return select('article', ['article.id'], 'JOIN comment ON comment.id = article.id_user WHERE article.id = ' . $id)[0];
}
function selectArticleByTitle ($title) {
	return select('article', [], 'WHERE title = "' . $title . '"')[0];
}

function selectArticleBySearchTitle ($search) {
	return select('article', ['article.*, user.pseudo as user, count(comment.id) as nbr'], 'JOIN user ON user.id = article.id_user LEFT JOIN comment ON article.id = comment.id_article WHERE title LIKE "%' . $search . '%" OR article.content LIKE "%' . $search . '%" GROUP BY article.id ORDER BY article.created DESC ');
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

function selectArticleUser ($id) {
	return select('article', ['article.id_user'], 'WHERE article.id = ' . $id);
}

function selectMaxImageArticle () {
	return select('article', ['max(article.id_image) as idImage'], '')[0];
}

function insertUserArticle ($values, $fields) {
	return insert('article', $values, $fields);
}

function updateArticle ($fields, $values) {
	$association = array();
	$id = 0;

	for ($i = 0; $i < count ($values); $i++) {
		if ($fields[$i] == 'id') {
			$id = $values[$i];
		} else {
			$association[$fields[$i]] = $values[$i];
		}
	}

	if ($id) {
		return update('article', $association, 'WHERE id = ' . $id);
	} else {
		echo $id;
		die;
	}
}

function deleteArticle ($id) {
	$conditions = 'WHERE id';

	if (is_array($id)) {
		$conditions .= ' IN (';

		foreach ($id as $index => $i) {
			if (! isset($_SESSION['user']) || 
				(
					$_SESSION['user'] != selectUserByArticleId($i)['id'] 
					&& (! isset($_SESSION['role']) || $_SESSION['role'] != 3))
				) {
				header('Location: ?');
			} else {
				if ($index != 0) {
					$conditions .= ', ';
				}

				$conditions .= $i;
				$article = selectArticleById($i);
				if(isset($article['id_image']) && $article['id_image'] != 0 && file_exists("images/img_article_".$article['id_image'].".".$article['ext_image'])){
					unlink("images/img_article_".$article['id_image'].".".$article['ext_image']);
				}
			}
		}

		$conditions .= ')';
	} else {
		if (! isset($_SESSION['user']) || 
			(
				$_SESSION['user'] != selectUserByArticleId($id)['id'] 
				&& (! isset($_SESSION['role']) || $_SESSION['role'] != 3))
			) {
			header('Location: ?');
		} else {
			$conditions .= ' = ' . $id;
			$article = selectArticleById($id);
			if(isset($article['id_image']) && $article['id_image'] != 0 && file_exists("images/img_article_".$article['id_image'].".".$article['ext_image'])){
				unlink("images/img_article_".$article['id_image'].".".$article['ext_image']);
			}
		}
	}

	deleteCommentsOfArticle($id);
	return delete('article', $conditions);
}

function deleteUserArticles ($id) {
	$articles = selectUserArticles($id);

	$ids = array();

	foreach ($articles as $article) {
		$ids[] = $article['id'];
	}

	return deleteArticle($ids);
}
