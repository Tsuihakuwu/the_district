<?php 
require_once('session.php');
require_once('dao.php');
$categories = a_display_cat();
$plat = o_display_plat($_GET['id_plat'])
?>

<div class="container mnb">
  <h2>Modifier un plat</h2>
  <form method="post" action="/content/admin/update_plat_script.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nom_plat">Nom du plat :</label>
      <input type="text" class="form-control" id="nom_plat" name="nom_plat" value="<?= $plat->libelle ?>" required>
    </div>
    <div class="form-group">
      <label for="prix_plat">Prix du plat :</label>
      <input type="number" class="form-control" id="prix_plat" name="prix_plat" value="<?= $plat->prix ?>" required>
    </div>
    <div class="form-group">
      <label for="description_plat">Description du plat :</label>
      <textarea class="form-control" id="description_plat" name="description_plat" rows="3" required><?= $plat->description ?></textarea>
    </div>
    <div class="form-group">
      <label for="image_plat">Image du plat :</label>
      <input type="file" class="form-control" id="image_plat" name="image_plat" value="<?= $plat->image ?>" required>
    </div>
    <div class="form-group">
      <label for="categorie">Catégorie :</label>
      <select class="form-control" id="categorie_id" name="categorie_id" required>
        <?php foreach ($categories as $categorie) : ?>
          <option value="<?= $categorie->id_categorie ?>" <?php if ($plat->id_categorie == $categorie->id_categorie) echo 'selected' ?> > <?= $categorie->libelle ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <input type="hidden" name="id_plat" value="<?= $plat->id_plat ?>">
    <input type="hidden" name="old_plat_img" value="<?= $plat->image ?>">
    <button type="submit" class="btn btn-primary" name="submit">Modifier</button>
  </form>
</div>