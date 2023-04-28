<?php
require_once 'dao.php';
$result = a_display_usr();
?>
<main>
    <div class="container">
        <div class="text-center">
            <h2>Liste des utilisateurs</h2>
            <a href="/?page=admin&gest=user_create" class="btn btn-light btn-sm text-black">Créer un utilisateur</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered rounded m-3 mnb">
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
    </div>
</main>