<?php

include_once("db.php");

function disp_cat(){
    $db = connexionBase();
    $query = $db->query('SELECT * FROM (SELECT categorie.libelle, categorie.image, categorie.id_categorie FROM commande
    JOIN plat ON commande.id_plat = plat.id_plat
    JOIN categorie ON plat.id_categorie = categorie.id_categorie
    WHERE commande.etat = "Livrée" AND LOWER(categorie.active) = "yes" AND LOWER(plat.active) = "yes"
    GROUP BY categorie.libelle
    ORDER BY COUNT(*)
    DESC) AS T1
    UNION
    SELECT categorie.libelle, categorie.image, categorie.id_categorie
    FROM categorie
    WHERE LOWER(categorie.active) = "yes"
    LIMIT 6');
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

function mp_plat(){
    $db = connexionBase();        
    $query = $db->query('SELECT COUNT(*) AS nbr_vente, plat.libelle, plat.image, plat.id_plat, plat.prix 
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

function all_plat(){
    $db = connexionBase();        
    $query = $db->query('SELECT * FROM plat WHERE LOWER(plat.active) = "yes"');
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

function detail_plat($id){
    $db = connexionBase();        
    $query = $db->query('SELECT * FROM plat WHERE LOWER(plat.active) = "yes" AND plat.id_plat = '.$id.' LIMIT 1');
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

function all_cat(){
    $db = connexionBase();        
    $query = $db->query('SELECT categorie.libelle, categorie.image, categorie.id_categorie FROM categorie WHERE LOWER(categorie.active) = "yes"');
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

function detail_cat($id){
    $db = connexionBase();        
    $query = $db->query('SELECT * FROM plat WHERE LOWER(plat.active) = "yes" AND plat.id_categorie = '.$id.';');
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

function get_cat($id){
    $db = connexionBase();
    $query = $db->query('SELECT * FROM categorie WHERE LOWER(categorie.active) = "yes" AND categorie.id_categorie = '.$id.';');
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

function search_cat($search){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM categorie WHERE libelle LIKE "%"?"%" AND LOWER(categorie.active) = "yes";');
    $query->execute(array($search));
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;

}

function search_plat($search){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM plat WHERE (libelle LIKE "%":search1"%" OR plat.description LIKE "%":search2"%") AND LOWER(plat.active) = "yes";');
    $query->bindValue(":search1", $search, PDO::PARAM_STR);
    $query->bindValue(":search2", $search, PDO::PARAM_STR);
    $query->execute();
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

?>