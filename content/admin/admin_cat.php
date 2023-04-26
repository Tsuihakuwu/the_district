<?php
    require_once('dao.php');
    require_once("session.php");
    $categories = a_display_cat();
?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2>Liste des catégories</h2>
        <a href="create_cat_form.php" class="btn btn-primary btn-sm">Ajouter une catégorie</a>
    </div>
    <table class="table table-bordered mx-3 mnb rounded">
        <thead>
            <tr>
                <th>ID</th>
                <th>libelle</th>
                <th>image</th>
                <th>active</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category) : ?>
                <tr>
                    <td><?= $category->id_categorie ?></td>
                    <td><?= $category->libelle ?></td>
                    <td><?= $category->image ?></td>
                    <td><?= $category->active ?></td>
                    <td>
                        <a href="update_cat_form.php?id_categorie=<?= $category->id_categorie ?>" class="btn btn-sm btn-secondary">Modifier</a>
                        <a href="delete_cat_form.php?id_categorie=<?= $category->id_categorie ?>" class="btn btn-sm btn-secondary">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>