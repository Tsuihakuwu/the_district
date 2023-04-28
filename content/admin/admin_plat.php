<?php
require_once 'dao.php';
$result = a_display_plat();

?>
<main>
    <div class="container">
        <h2 class="text-center">Liste des plats</h2>
        <div class="text-center">
            <a href="/?page=admin&gest=plat_create" class="btn btn-light btn-sm text-black">Ajouter un plat</a>
        </div>
        <table class="table table-bordered mx-3 mnb rounded">
            <thead>
                <tr>
                    <th class="col-2">Nom du plat</th>
                    <th class="col-3">Description</th>
                    <th class="col-1">Prix</th>
                    <th class="col-2">Image</th>
                    <th class="col-1">Catégorie</th>
                    <th class="col-1">Active ?</th>
                    <th class="col-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result as $row) : ?>
                    <tr>
                        <td><?= substr($row->libelle, 0, 30) . (strlen($row->libelle) > 30 ? '[...]' : '') ?> </td>
                        <td><?= substr($row->description, 0, 250) . (strlen($row->description) > 250 ? '[...]' : '') ?> </td>
                        <td><?= $row->prix ?> </td>
                        <td><img class="image-fluid col-12" src="/asset/img/food/<?= $row->image ?> " alt="<?= $row->image ?> "></td>
                        <td><?= $row->id_categorie ?> </td>
                        <td><?= $row->active ?> </td>
                        <td>
                            <a href="?page=admin&gest=plat_mod&id_plat=<?= $row->id_plat ?> " class="btn btn-light btn-sm text-black">Modifier</a>
                            <a href="?page=admin&gest=plat_delete&id_plat=<?= $row->id_plat ?> " class="btn btn-light btn-sm text-black">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</main>