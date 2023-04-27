<?php
require_once('session.php');
require_once('dao.php');
$categories = a_display_cat();
?>

<main>
  <div class="container">
    <div class="row mnb">
      <div class="col-md-6 offset-md-3">
        <h2 class="text-center mb-4">Ajouter un plat</h2>
        <form action="/content/admin/create_plat_script.php" method="POST">
          <div class="form-group">
            <label for="nom_plat">Nom du plat:</label>
            <input type="text" class="form-control" id="nom_plat" name="nom_plat" required>
          </div>
          <div class="form-group">
            <label for="description_plat">Description:</label>
            <textarea class="form-control" id="description_plat" name="description_plat" required></textarea>
          </div>
          <div class="form-group">
            <label for="prix_plat">Prix:</label>
            <input type="text" class="form-control" id="prix_plat" name="prix_plat" required>
          </div>
          <div class="form-group">
            <label for="image_plat">Image:</label>
            <input type="text" class="form-control" id="image_plat" name="image_plat" required>
          </div>
          <div class="form-group">
            <label for="categorie_plat">Catégorie:</label>
            <select class="form-control" id="categorie_plat" name="categorie_plat" required>
              <?php foreach ($categories as $categorie) : ?>
                <option value="<?= $categorie->id_categorie ?>"><?= $categorie->libelle ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
          <a href="/?page=admin&gest=plat" class="btn btn-secondary">Retour</a>
        </form>
      </div>
    </div>
  </div>
</main>