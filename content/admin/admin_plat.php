<?php
    require_once 'dao.php';
    $result = a_display_plat();

    echo '<table class="table table-bordered mx-3 mnb rounded">';
    echo '<thead class="thead-dark">';
    echo '<tr><th>id_plat</th><th>libelle</th><th>description</th><th>prix</th><th>image</th><th>id_categorie</th><th>active</th></tr></thead>';
    echo '<tbody>';
    foreach ($result as $row) {
        echo '<tr>';
        echo '<td>'.$row->id_plat.'</td>';
        echo '<td>'.substr($row->libelle, 0, 20) . (strlen($row->libelle) > 20 ? '[...]' : '').'</td>';
        echo '<td>'.substr($row->description, 0, 50) . (strlen($row->description) > 50 ? '[...]' : '').'</td>';
        echo '<td>'.$row->prix.'</td>';
        echo '<td>'.$row->image.'</td>';
        echo '<td>'.$row->id_categorie.'</td>';
        echo '<td>'.$row->active.'</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
?>