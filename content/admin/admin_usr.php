<?php
require_once 'dao.php';
$result = a_display_usr();
?>
<main>
    <div class="">
        <div class="text-center mb-5">
            <h2>Liste des utilisateurs</h2>
            <hr class="w-75 mx-auto mt-3 mb-3"><a href="/?page=admin&gest=user_create" class="btn btn-light btn-sm text-black">Créer un utilisateur</a>
            <hr class="w-75 mx-auto mt-3 mb-3">
        </div>
        <table class="table_c table-bordered mx-3">
            <thead>
                <tr>
                    <th class="col-1">ID</th>
                    <th class="col-1">Nom</th>
                    <th class="col-1">Prénom</th>
                    <th class="col-1">Email</th>
                    <th class="col-4">Mot de passe</th>
                    <th class="col-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr>
                        <td><?php echo $row->id_utilisateur; ?></td>
                        <td><?php echo $row->nom; ?></td>
                        <td><?php echo $row->prenom; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->password; ?></td>
                        <td>
                            <a href="?page=admin&gest=user_mod&id=<?php echo $row->id_utilisateur; ?>" class="btn btn-light btn-sm text-black">Modifier</a>
                            <a href="?page=admin&gest=user_delete&id=<?php echo $row->id_utilisateur; ?>" class="btn btn-light btn-sm text-black">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>