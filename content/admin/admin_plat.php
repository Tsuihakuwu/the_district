<?php
require_once 'dao.php';
$result = j_plat_cat();

?>
<main>
    <div>
        <div class="text-center mb-5">
            <h2>Liste des plats</h2>
            <hr class="w-75 mx-auto mt-3 mb-3">
            <a href="/?page=admin&gest=plat_create" class="btn btn-light btn-sm text-black">Ajouter un plat</a>
            <hr class="w-75 mx-auto mt-3 mb-3">
        </div>
        <table class="table_c table-bordered mx-3">
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
                        <td><?= $row->prix ?>€ </td>
                        <td><img class="image-fluid col-12" src="/asset/img/food/<?= $row->image ?> " alt="<?= $row->image ?> "></td>
                        <td><?= $row->libcat ?> </td>
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