<?php 
include('nav_admin.php');
?>
<table id="list_users_admin">
	<h1>Liste des utilisateurs</h1>
	<?php if (isset($errors)) {
		if(empty($errors))
			echo '<tr class="table_valide"><td colspan=5><span class="valide">Le rôle a bien été changé</span></td></tr>'; 
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
       <td><?php echo $user['email']; ?></td>
       <td>
       		<form action="?p=edit_role&id=<?= $user['id'] ?>" method="POST" name="form_role">
		        <select name="role">
			       	<?php foreach ($roles as $role): ?>
			       	<option value="<?php echo $role['id']?>" <?php if($user['id_role'] == $role['id']) echo "selected" ?>><?php echo $role['label'] ?></option>
			       	<?php endforeach; ?>
		        </select>
		        <button type="submit" class="change_role_btn">
    				<i class="fa fa-check fa-role-admin"></i>
				</button>
		    </form>
       </td>
       <td><?= $user['created'] ?></td>
       <td class="column_delete"><a href="?p=delete_user_admin&id=<?= $user['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i>Supprimer </a></td>
    </tr>
	<?php endforeach; ?>
</table>