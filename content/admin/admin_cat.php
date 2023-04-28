<?php
require_once('dao.php');
require_once("session.php");
$categories = a_display_cat();
?>
<main>
    <div class="container">
        <h2 class="text-center">Liste des catégories</h2>
        <div class="text-center mb-2">
            <a href="?page=admin&gest=cat_create" class="btn btn-light btn-sm text-black">Ajouter une catégorie</a>
        </div>
        <table class="table table-bordered mx-3 mnb rounded">
            <thead>
                <tr>
                    <th class="col-3">Nom de la catégorie</th>
                    <th class="col-3">Image</th>
                    <th class="col-3">Active</th>
                    <th class="col-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category) : ?>
                    <tr>
                        <td><?= $category->libelle ?></td>
                        <td><img class="image-fluid col-12" src="../../asset/img/category/<?= $category->image ?>" alt="<?= $category->image ?>"></td>
                        <td><?= $category->active ?></td>
                        <td>
                            <a href="?page=admin&gest=cat_mod&id_categorie=<?= $category->id_categorie ?>" class="btn btn-light btn-sm text-black">Modifier</a>
                            <a href="?page=admin&gest=cat_delete&id_categorie=<?= $category->id_categorie ?>" class="btn btn-light btn-sm text-black">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>