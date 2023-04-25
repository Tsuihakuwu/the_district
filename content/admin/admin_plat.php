<?php
    require_once 'dao.php';
    $result = a_display_plat();

    echo '<h2 class="text-center">Liste des plats</h2>
    <div class="text-center">
        <a href="create_plat_form.php" class="btn btn-primary btn-sm">Ajouter un plat</a>
    </div>';
    echo '<table class="table table-bordered mx-3 mnb rounded">';
    echo '<thead class="thead-dark">';
    echo '<tr><th>id_plat</th><th>libelle</th><th>description</th><th>prix</th><th>image</th><th>id_categorie</th><th>active</th></tr></thead>';
    echo '<tbody>';
    foreach ($result as $row) {
        echo '<tr>';
        echo '<td>'.$row->id_plat.'</td>';
        echo '<td>'.substr($row->libelle, 0, 30) . (strlen($row->libelle) > 30 ? '[...]' : '').'</td>';
        echo '<td>'.substr($row->description, 0, 70) . (strlen($row->description) > 70 ? '[...]' : '').'</td>';
        echo '<td>'.$row->prix.'</td>';
        echo '<td>'.$row->image.'</td>';
        echo '<td>'.$row->id_categorie.'</td>';
        echo '<td>'.$row->active.'</td>';
        echo '                        <td>
        <a href="update_plat_form.php?id_plat='.$row->id_plat.'" class="btn btn-secondary btn-sm">Modifier</a>
        <a href="delete_plat_form.php?id_plat='.$row->id_plat.'" class="btn btn-secondary btn-sm">Supprimer</a>
    </td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
?>