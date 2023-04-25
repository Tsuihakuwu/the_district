<?php require_once('dao.php'); 
$plats = a_display_plat();
?>

<div class="container mnb">
  <h1 class="my-5">Ajouter une commande</h1>
  <form method="post" action="/content/admin/create_command_script.php">
    <div class="form-group">
      <label for="id_plat">Plat :</label>
      <select class="form-control" name="id_plat" required>
        <?php foreach ($plats as $plat): ?>
          <option value="<?= $plat->id_plat ?>"><?= $plat->libelle ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="form-group">
      <label for="quantite">Quantité :</label>
      <input type="number" class="form-control" name="quantite" required>
    </div>
    <div class="form-group">
      <label for="nom_client">Nom :</label>
      <input type="text" class="form-control" name="nom_client" required>
    </div>
    <div class="form-group">
      <label for="telephone_client">Téléphone :</label>
      <input type="text" class="form-control" name="telephone_client" required>
    </div>
    <div class="form-group">
      <label for="email_client">Email :</label>
      <input type="email" class="form-control" name="email_client" required>
    </div>
    <div class="form-group">
      <label for="adresse_client">Adresse :</label>
      <textarea class="form-control" name="adresse_client" rows="3" required></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Ajouter</button>
  </form>
</div>