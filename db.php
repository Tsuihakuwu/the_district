<?php

function connexionBase(){
    
    $db="the_district";
    $dbhost="localhost";
    $dbport=8080;
    $dbuser="admin";
    $dbpasswd="mdpbdd1";
    $charset="utf8";
    
    try 
    {
        $pdo = new PDO('mysql:host='.$dbhost.';port='.$dbport.';dbname='.$db.';charset=utf8'.'', $dbuser, $dbpasswd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
    catch (Exception $e)
    {
        echo 'Erreur : ' . $e->getMessage() . '<br />';
        echo 'N° : ' . $e->getCode();
        die('Fin du script');
    }
}

function disp_cat(){
    $db = connexionBase();        
    $query = $db->query('SELECT * FROM categorie');
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

function rd_plat(){
    $db = connexionBase();        
    $query = $db->query('SELECT * FROM plat ORDER BY RAND() LIMIT 3;');
    $tab = $query->fetchAll(PDO::FETCH_OBJ);
    $query->closeCursor();
    return $tab;
}

?>