<?php 
include('nav_admin.php');
?>
<table id="list_articles_admin">
	<h1>Liste des articles</h1>
	<?php if (isset($_POST['error'])) {
		if($_POST['error'] == true)
			echo '<tr class="table_valide"><td colspan=5><span class="valide">L\'article a bien été supprimé</span></td></tr>'; 
		else
			echo '<tr class="table_error"><td colspan=5><span class="error">Erreur lors de la suppression</span></td></tr>'; 
	} ?>
	<tr>
       <th>Pseudo</th>
       <th>Email</th>
       <th>Rôle</th>
       <th>Inscrit le</th>
       <th>Actions</th>
   </tr>
	<?php foreach ($users as $user): ?>
	<tr>
       <td><a href="?p=single_user&id=<?= $user['id'] ?>"><?= $user['pseudo']; ?></a></td>
       <td><? echo $user['email']?></td>
       <td><select></select></td>
       <td><?= $user['created'] ?></td>
       <td><a href="?p=delete_user_admin&id=<?= $user['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Supprimer </a></td>
    </tr>
	<?php endforeach; ?>
</table>