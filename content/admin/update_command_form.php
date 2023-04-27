<?php require_once('dao.php');
$plats = a_display_plat();
$commande = o_display_com($_GET['id_com']);
?>

<main>
  <div class="container mnb rounded">
    <h2 class="mb-4">Modifier une commande</h2>
    <form method="post" action="/content/admin/update_command_script.php">
      <input type="hidden" name="id_commande" value="<?= $commande->id_commande ?>">
      <div class="form-group">
        <label for="id_plat">Plat:</label>
        <select class="form-control" id="id_plat" name="id_plat">
          <?php foreach ($plats as $plat) { ?>
            <option value="<?= $plat->id_plat ?>" <?= $plat->id_plat == $commande->id_plat ? 'selected' : '' ?>><?= $plat->libelle ?></option>
          <?php } ?>
        </select>
      </div>
      <div class="form-group">
        <label for="quantite">Quantité:</label>
        <input type="number" class="form-control" id="quantite" name="quantite" value="<?= $commande->quantite ?>">
      </div>
      <div class="form-group">
        <label for="total">Total:</label>
        <input type="number" class="form-control" id="total" name="total" value="<?= $commande->total ?>">
      </div>
      <div class="form-group">
        <label for="date_commande">Date de commande:</label>
        <input type="text" class="form-control" id="date_commande" name="date_commande" value="<?= $commande->date_commande ?>">
      </div>
      <div class="form-group">
        <label for="etat">Etat:</label>
        <input type="text" class="form-control" id="etat" name="etat" value="<?= $commande->etat ?>">
      </div>
      <div class="form-group">
        <label for="nom_client">Nom du client:</label>
        <input type="text" class="form-control" id="nom_client" name="nom_client" value="<?= $commande->nom_client ?>">
      </div>
      <div class="form-group">
        <label for="telephone_client">Téléphone du client:</label>
        <input type="text" class="form-control" id="telephone_client" name="telephone_client" value="<?= $commande->telephone_client ?>">
      </div>
      <div class="form-group">
        <label for="email_client">Email du client:</label>
        <input type="email" class="form-control" id="email_client" name="email_client" value="<?= $commande->email_client ?>">
      </div>
      <div class="form-group">
        <label for="adresse_client">Adresse du client:</label>
        <input type="text" class="form-control" id="adresse_client" name="adresse_client" value="<?= $commande->adresse_client ?>">
      </div>
      <button type="submit" class="btn btn-primary mr-2">Modifier</button>
      <a href="/?page=admin&gest=com" class="btn btn-secondary">Annuler</a>
    </form>
  </div>
</main>