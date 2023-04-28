<?php
require_once('session.php');
require_once('dao.php');
$categorie = o_display_cat($_GET['id_categorie'])
?>

<main>
    <h2 class="text-center mb-5">Modifier la catégorie</h2>
    <hr>
    <div class="container my-5 mnb-nm rounded">
        <?php if (isset($error) && !empty($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="post" action="/content/admin/update_cat_script.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom_categorie" class="mt-3 mb-1">Nom de la catégorie</label>
                <input type="text" class="form-control mb-4" id="nom_categorie" name="nom_categorie" value="<?= $categorie->libelle ?>" required>
            </div>
            <div class="form-group">
                <label for="image" class="mb-1">Image de la catégorie</label><br>
                <img src="../../asset/img/category/<?= $categorie->image ?>" class="rounded" alt="<?= $categorie->image ?>">
                <input type="file" class="form-control-file" id="image_cat" name="image_cat">
            </div>
            <input type="hidden" name="old_cat_img" value="<?= $categorie->image ?>">
            <input type="hidden" name="id_categorie" value="<?= $categorie->id_categorie ?>">
            <div class="form-group d-flex justify-content-center">
                <input type="submit" name="submit" class="btn btn-light btn-sm text-black mt-4 mb-3 mx-2" value="Modifier"></input>
                <a href="/?page=admin&gest=cat" class="btn btn-light btn-sm text-black mt-4 mb-3">Retour</a>
            </div>
        </form>
    </div>
</main>