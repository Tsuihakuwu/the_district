<?php

include_once("db.php");

//------------------------------ FRONT ------------------------------//

//------------------------------ DISPLAY MOST POP CAT LIMIT 6 ------------------------------//

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

//------------------------------ DISPLAY MOST POPULAR PLAT LIMIT 3 ------------------------------//

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

//------------------------------ ALL PLAT ------------------------------//

function all_plat(){
    $db = connexionBase();        
    $query = $db->query('SELECT * FROM plat WHERE LOWER(plat.active) = "yes"');
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

//------------------------------ ONE PLAT WITH ID PARAM ------------------------------//

// function detail_plat($id){
//     $db = connexionBase();        
//     $query = $db->query('SELECT * FROM plat WHERE LOWER(plat.active) = "yes" AND plat.id_plat = ? LIMIT 1');
//     $query->execute(array($id));
//     $tab = $query->fetch(PDO::FETCH_OBJ);
//     $query->closeCursor();
//     return $tab;
// }

//------------------------------ ALL CAT ------------------------------//

function all_cat(){
    $db = connexionBase();        
    $query = $db->query('SELECT categorie.libelle, categorie.image, categorie.id_categorie FROM categorie WHERE LOWER(categorie.active) = "yes"');
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

//------------------------------ ONE CAT WITH ID PARAM ------------------------------//

function get_cat($id){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM categorie WHERE LOWER(categorie.active) = "yes" AND categorie.id_categorie = :id;');
    $query->bindValue(":id", $id, PDO::PARAM_STR);
    $query->execute();
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

//------------------------------ PLAT FROM CAT WITH ID PARAM ------------------------------//

function detail_cat($id){
    $db = connexionBase();        
    $query = $db->prepare('SELECT * FROM plat WHERE LOWER(plat.active) = "yes" AND plat.id_categorie = :id');
    $query->bindValue(":id", $id, PDO::PARAM_STR);
    $query->execute();
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

function detail_cat2($id){
    $db = connexionBase();        
    $query = $db->prepare('SELECT * FROM plat WHERE LOWER(plat.active) = "yes" AND plat.id_categorie = :id');
    $query->bindValue(":id", $id, PDO::PARAM_STR);
    $query->execute();
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

//------------------------------ BARRE DE RECHERCHE ------------------------------//
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

//------------------------------ CONNEXION ------------------------------//

function user_co($user){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM utilisateur WHERE email=?;');
    $query->execute(array($user));
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

//------------------------------ ADMIN QUERY ------------------------------//

//------------------------------ CATEGORIE ------------------------------//

//CREATE
function create_cat($lib,$img){
    $active = "Yes";
    $db = connexionBase();
    $query = $db->prepare('INSERT INTO categorie (libelle,image,active) VALUES (?,?,?);');
    $query->execute([$lib,$img,$active]);
    $query->closeCursor();
    return true;  
}

//READ ALL
function a_display_cat(){
    $db = connexionBase();
    $query = $db->query('SELECT * FROM categorie');
    $query->execute();
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

//READ ONE WITH ID PARAMETER
function o_display_cat($id){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM categorie WHERE id_categorie = ?;');
    $query->execute(array($id));
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

//UPDATE
function update_cat($id_categorie,$libelle,$img){
    $active = "Yes";
    $db = connexionBase();
    $query = $db->prepare("UPDATE categorie SET 
                libelle=:libelle, 
                image=:image, 
                active=:active
            WHERE id_categorie=:id_categorie");
    $query->bindValue(":libelle", $libelle, PDO::PARAM_STR);
    $query->bindValue(":image", $img, PDO::PARAM_STR);
    $query->bindValue(":active", $active, PDO::PARAM_STR);
    $query->bindValue(":id_categorie", $id_categorie, PDO::PARAM_STR); 
    $query->execute();
    $query->closeCursor();
}

//DELETE
function delete_cat($id){
    $db = connexionBase();
    $query = $db->prepare('DELETE FROM categorie WHERE id_categorie = ?');
    $query->execute(array($id));
    $query->closeCursor();
    return true;
}


//------------------------------ PLAT ------------------------------//

//CREATE
function create_plat($libelle,$description,$prix,$image,$id_categorie){
    $active = "Yes";
    $db = connexionBase();
    $query = $db->prepare('INSERT INTO plat (libelle,description,prix,image,id_categorie,active) VALUES (?,?,?,?,?,?);');
    $query->execute([$libelle,$description,$prix,$image,$id_categorie,$active]);
    $query->closeCursor();
    return true;  
}

//READ ALL
function a_display_plat(){
    $db = connexionBase();
    $query = $db->query('SELECT * FROM plat');
    $query->execute();
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

//READ ONE WITH ID PARAMETER
function o_display_plat($id){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM plat WHERE id_plat = ?;');
    $query->execute(array($id));
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

//UPDATE
function update_plat($id_plat,$libelle, $description, $prix, $image,$id_categorie){
    $active = "Yes";
    $db = connexionBase();
    $query = $db->prepare("UPDATE plat SET 
                libelle=:libelle, 
                description=:description, 
                prix=:prix, 
                image=:image, 
                id_categorie=:id_categorie, 
                active=:active
            WHERE id_plat=:id_plat");
    $query->bindValue(":id_plat", $id_plat, PDO::PARAM_STR);
    $query->bindValue(":libelle", $libelle, PDO::PARAM_STR);
    $query->bindValue(":description", $description, PDO::PARAM_STR);
    $query->bindValue(":prix", $prix, PDO::PARAM_STR);
    $query->bindValue(":image", $image, PDO::PARAM_STR);
    $query->bindValue(":id_categorie", $id_categorie, PDO::PARAM_STR);
    $query->bindValue(":active", $active, PDO::PARAM_STR);
    
    $query->execute();
    $query->closeCursor();

}

//DELETE
function delete_plat($id){
    $db = connexionBase();
    $query = $db->prepare('DELETE FROM plat WHERE id_plat = ?');
    $query->execute(array($id));
    $query->closeCursor();
    return true;
}

//------------------------------ COMMANDE ------------------------------//

//CREATE
function create_command($id_plat, $quantite, $date_commande, $total,$nom_client, $telephone_client, $email_client, $adresse_client){
    $etat="En préparation";
    $db = connexionBase();
    $query = $db->prepare('INSERT INTO commande (id_plat, quantite, date_commande, total, nom_client, telephone_client, email_client, adresse_client, etat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);');
    $query->execute([$id_plat, $quantite, $date_commande, $total, $nom_client, $telephone_client, $email_client, $adresse_client, $etat]);
    $query->closeCursor();
    return true;  
}

//READ ALL
function a_display_com(){
    $db = connexionBase();
    $query = $db->query('SELECT * FROM commande');
    $query->execute();
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

//READ ONE WITH ID PARAMETER
function o_display_com($id){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM commande WHERE id_commande = ?;');
    $query->execute(array($id));
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

//UPDATE
function update_command($id_commande,$id_plat, $quantite, $total, $date_commande, $etat, $nom_client, $telephone_client,$email_client,$adresse_client){
    $db = connexionBase();
    $query = $db->prepare("UPDATE commande SET 
                id_plat=:id_plat, 
                quantite=:quantite, 
                total=:total, 
                date_commande=:date_commande, 
                etat=:etat, 
                nom_client=:nom_client, 
                telephone_client=:telephone_client, 
                email_client=:email_client,
                adresse_client=:adresse_client
            WHERE id_commande=:id_commande");
    $query->bindValue(":id_plat", $id_plat, PDO::PARAM_STR);
    $query->bindValue(":quantite", $quantite, PDO::PARAM_STR);
    $query->bindValue(":total", $total, PDO::PARAM_STR);
    $query->bindValue(":date_commande", $date_commande, PDO::PARAM_STR);
    $query->bindValue(":etat", $etat, PDO::PARAM_STR);
    $query->bindValue(":nom_client", $nom_client, PDO::PARAM_STR);
    $query->bindValue(":telephone_client", $telephone_client, PDO::PARAM_STR);
    $query->bindValue(":email_client", $email_client, PDO::PARAM_STR);
    $query->bindValue(":adresse_client", $adresse_client, PDO::PARAM_STR);
    $query->bindValue(":id_commande", $id_commande, PDO::PARAM_STR);
    
    $query->execute();
    $query->closeCursor();

}

function delete_command($id){
    $db = connexionBase();
    $query = $db->prepare('DELETE FROM commande WHERE id_commande = ?');
    $query->execute(array($id));
    $query->closeCursor();
    return true;
}

//------------------------------ USER ------------------------------//

//CREATE
function create_user($nom, $prenom, $email, $hashed_password){
    $db = connexionBase();
    $query = $db->prepare(' INSERT INTO utilisateur (nom, prenom, email, password) VALUES (:nom, :prenom, :email, :hashed_password);');
    $query->bindValue(":nom", $nom, PDO::PARAM_STR);
    $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->bindValue(":hashed_password", $hashed_password, PDO::PARAM_STR);
    $query->execute();
    $query->closeCursor();
    return true;
}
//READ ALL
function a_display_usr(){
    $db = connexionBase();
    $query = $db->query('SELECT * FROM utilisateur');
    $query->execute();
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}
//READ ONE WITH ID PARAMETER
function o_display_usr($id){
    $db = connexionBase();
    $query = $db->prepare('SELECT * FROM utilisateur WHERE id_utilisateur = ?;');
    $query->execute(array($id));
    $tab = $query->fetch(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}
//UPDATE
function update_user($id, $nom, $prenom, $email){
    $db = connexionBase();
    $query = $db->prepare('UPDATE utilisateur SET nom = :nom, prenom = :prenom, email = :email WHERE id_utilisateur = :id;');
    $query->bindValue(":nom", $nom, PDO::PARAM_STR);
    $query->bindValue(":prenom", $prenom, PDO::PARAM_STR);
    $query->bindValue(":email", $email, PDO::PARAM_STR);
    $query->bindValue(":id", $id, PDO::PARAM_STR);
    $query->execute();
    $query->closeCursor();
}
//DELETE
function delete_user($id){
    $db = connexionBase();
    $query = $db->prepare('DELETE FROM utilisateur WHERE id_utilisateur = ?');
    $query->execute(array($id));
    $query->closeCursor();
    return true;
}

?>