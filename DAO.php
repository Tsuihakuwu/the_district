<?php

include_once("db.php");

function disp_cat(){
    $db = connexionBase();        
    $query = $db->query('SELECT * FROM (SELECT categorie.libelle, categorie.image FROM commande
    JOIN plat ON commande.id_plat = plat.id_plat
    JOIN categorie ON plat.id_categorie = categorie.id_categorie
    WHERE commande.etat = "Livrée" AND LOWER(categorie.active) = "yes" AND LOWER(plat.active) = "yes"
    GROUP BY categorie.libelle
    ORDER BY COUNT(*)
    DESC) AS T1
    UNION
    SELECT categorie.libelle, categorie.image
    FROM categorie
    WHERE LOWER(categorie.active) = "yes"
    LIMIT 6');
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

function mp_plat(){
    $db = connexionBase();        
    $query = $db->query('SELECT COUNT(*) AS nbr_vente, plat.libelle, plat.image 
    FROM commande
    JOIN plat ON plat.id_plat = commande.id_plat
    WHERE commande.etat = "Livrée" AND LOWER(plat.active) = "yes"
    GROUP BY plat.libelle
    ORDER BY nbr_vente
    DESC
    LIMIT 3');
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

?>