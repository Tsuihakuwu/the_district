<?php
require_once('session.php');
require_once('dao.php');
$categorie = o_display_cat($_GET['id_categorie'])
?>

<main>
    <div class="container">
        <h1>Modifier la catégorie</h1>
        <?php if (isset($error) && !empty($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        <form method="post" action="/content/admin/update_cat_script.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nom_categorie">Nom de la catégorie</label>
                <input type="text" class="form-control" id="nom_categorie" name="nom_categorie" value="<?= $categorie->libelle ?>" required>
            </div>
            <div class="form-group">
                <img src="../../asset/img/category/<?= $categorie->image ?>" alt="<?= $categorie->image ?>">
                <label for="image">Image de la catégorie</label>
                <input type="file" class="form-control-file" id="image_cat" name="image_cat">
            </div>
            <input type="hidden" name="old_cat_img" value="<?= $categorie->image ?>">
            <input type="hidden" name="id_categorie" value="<?= $categorie->id_categorie ?>">
            <button type="submit" name="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
</main>