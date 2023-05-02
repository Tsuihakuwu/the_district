<?php
require_once 'dao.php';
$result = j_plat_com();

?>
<main>
  <div class="">
    <div class="text-center mb-5">
      <h2>Liste des commandes</h2><hr class="w-75 mx-auto mt-3 mb-3">
      <a href="/?page=admin&gest=com_create" class="btn btn-light btn-sm text-black">Ajouter une commande</a>
      <hr class="w-75 mx-auto mt-3 mb-3">
    </div>
    <table class="table_c table-bordered mx-3">
      <thead>
        <tr>
          <th class="col-1">Plat</th>
          <th class="col-1">Quantité</th>
          <th class="col-1">Total</th>
          <th class="col-1">Date</th>
          <th class="col-1">etat</th>
          <th class="col-1">Nom client</th>
          <th class="col-1">Téléphone</th>
          <th class="col-1">Email</th>
          <th class="col-2">Adresse</th>
          <th class="col-2">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($result as $row) : ?>
          <tr>
            <td><?= $row->libplat ?> </td>
            <td><?= $row->quantite ?> </td>
            <td><?= $row->total ?>€ </td>
            <td><?= $row->date_commande ?> </td>
            <td><?= $row->etat ?> </td>
            <td><?= $row->nom_client ?> </td>
            <td><?= $row->telephone_client ?> </td>
            <td><?= $row->email_client ?> </td>
            <td><?= $row->adresse_client ?> </td>
            <td>
              <a href="/?page=admin&gest=com_mod&id_com=<?= $row->id_commande ?> " class="btn btn-light btn-sm text-black">Modifier</a>
              <a href="/?page=admin&gest=com_delete&id_com=<?= $row->id_commande ?> " class="btn btn-light btn-sm text-black">Supprimer</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>