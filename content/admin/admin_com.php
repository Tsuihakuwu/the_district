<?php
require_once 'dao.php';
$result = a_display_com();

?>
<main>
  <div class="container mt-4">
    <div class="text-center">
      <h2>Liste des commandes</h2><a href="/?page=admin&gest=com_create" class="btn btn-light btn-sm text-black">Ajouter une commande</a>
    </div>
    <table class="table">
      <table class="table table-bordered rounded m-3 mnb">
        <thead class="thead-dark">
          <tr>
            <th>id_commande</th>
            <th>id_plat</th>
            <th>quantite</th>
            <th>total</th>
            <th>date_commande</th>
            <th>etat</th>
            <th>nom_client</th>
            <th>telephone_client</th>
            <th>email_client</th>
            <th>adresse_client</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($result as $row) : ?>
            <tr>
              <td><?= $row->id_commande ?> </td>
              <td><?= $row->id_plat ?> </td>
              <td><?= $row->quantite ?> </td>
              <td><?= $row->total ?> </td>
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