<?php
require_once 'dao.php';
$result = a_display_usr();
?>
<a href="/?page=admin&gest=user_create" class="btn btn-primary">Create User</a>
<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover rounded">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Mot de passe</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $row): ?>
                <tr>
                    <td><?php echo $row->id_utilisateur; ?></td>
                    <td><?php echo $row->nom; ?></td>
                    <td><?php echo $row->prenom; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><?php echo $row->password; ?></td>
                    <td>
                        <a href="?page=admin&gest=user_mod&id=<?php echo $row->id_utilisateur; ?>" class="btn btn-secondary btn-sm">Modifier</a>
                        <a href="?page=admin&gest=user_delete&id=<?php echo $row->id_utilisateur; ?>" class="btn btn-secondary btn-sm">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

