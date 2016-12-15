<?php 

require_once('model/article.php');
function check_article () {
	$errors = [];
	if (empty($_POST['title'])) {
		$errors['title'] = 'Title must be indicated.';
	}
	if (empty($_POST['content'])) {
		$errors['content'] = 'Content must be indicated.';
	}

	return $errors;
}

$errors = check_article();

function valide_img() {
	$errors = [];
	$target_dir = "images/";
	$imageFileType = pathinfo($_FILES["imgArticle"]["name"],PATHINFO_EXTENSION);
	$id_image = selectMaxImageArticle();
	$target_file = $target_dir . basename("img_article_".($id_image['idImage']+1).".".$imageFileType);
	$uploadOk = 1;
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["imgArticle"]["tmp_name"]);
	    if($check !== false) {
	        $uploadOk = 1;
	    } else {
	        $errors['file'] = "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    $errors['file'] = "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	if ($_FILES["imgArticle"]["size"] > 50000000) {
	    $errors['file'] = "Sorry, your file is too large.";
	    $uploadOk = 0;
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    $errors['file'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	    $uploadOk = 0;
	}
	if($uploadOk ==1 ){
	    if (move_uploaded_file($_FILES["imgArticle"]["tmp_name"], $target_file)) {
	    } else {
	        $errors['file'] = "Sorry, there was an error uploading your file.";
	    } 
	}
	return $errors;
}
if(!empty($_FILES['imgArticle']['name']) && empty($errors)){
	$errors = valide_img();
}

if (empty($errors)) {
	$fields = ['title', 'content', 'id_user', 'id_image', 'ext_image'];
	if(empty($_FILES['imgArticle']['name'])){
		$id_image['idImage'] = -1;
		$ext = null;
	} else {
		$id_image = selectMaxImageArticle();
		$ext = pathinfo($_FILES["imgArticle"]["name"],PATHINFO_EXTENSION);
	}
	$values = [escapeVar($_POST['title']), escapeVar($_POST['content']), $_SESSION['user'], $id_image['idImage']+1, $ext];
	$id = insertUserArticle($fields, $values);
	if ($id) {
		$template = 'single_article';
		header('Location: ?p=single_article&id=' . $id);
	} else {
		$template = 'home';
		$_POST['err_internal'] = 'Internal error';
		header('Location: ?');
	}
} else {
	foreach ($errors as $key => $error) {
		$_POST['err_' . $key] = $error;
	}

	$template = 'new_article';
}