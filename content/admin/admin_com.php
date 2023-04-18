<?php
    require_once 'dao.php';
    $result = a_display_com();

    echo '<table class="table table-bordered rounded m-3 mnb">';
    echo '<thead class="thead-dark">';
    echo '<tr><th>id_commande</th><th>id_plat</th><th>quantite</th><th>total</th><th>date_commande</th><th>etat</th><th>nom_client</th><th>telephone_client</th><th>email_client</th><th>adresse_client</th></tr></thead>';
    echo '<tbody>';
    foreach ($result as $row) {
        echo '<tr>';
        echo '<td>'.$row->id_commande.'</td>';
        echo '<td>'.$row->id_plat.'</td>';
        echo '<td>'.$row->quantite.'</td>';
        echo '<td>'.$row->total.'</td>';
        echo '<td>'.$row->date_commande.'</td>';
        echo '<td>'.$row->etat.'</td>';
        echo '<td>'.$row->nom_client.'</td>';
        echo '<td>'.$row->telephone_client.'</td>';
        echo '<td>'.$row->email_client.'</td>';
        echo '<td>'.$row->adresse_client.'</td>';
        echo '</tr>';
    }
    echo '</tbody></table>';
?>