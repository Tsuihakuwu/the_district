<?php
    require_once 'dao.php';
    $result = a_display_cat();

    echo '<table class="table table-bordered mx-3 mnb rounded">';
    echo '<thead class="thead-dark">';
    echo '<tr><th>id_categorie</th><th>libelle</th><th>image</th><th>active</th></tr></thead>';
    echo '<tbody>';
    foreach ($result as $row) {
        echo '<tr>';
        echo '<td>'.$row->id_categorie.'</td>';
        echo '<td>'.$row->libelle.'</td>';
        echo '<td>'.$row->image.'</td>';
        echo '<td>'.$row->active.'</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
?>