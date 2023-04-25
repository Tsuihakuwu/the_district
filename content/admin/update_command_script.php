<?php
require_once('../../session.php');
require_once('../../dao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_commande = $_POST['id_commande'];
    $id_plat = $_POST['id_plat'];
    $quantite = $_POST['quantite'];
    $total = $_POST['total'];
    $date_commande = $_POST['date_commande'];
    $etat = $_POST['etat'];
    $nom_client = $_POST['nom_client'];
    $telephone_client = $_POST['telephone_client'];
    $email_client = $_POST['email_client'];
    $adresse_client = $_POST['adresse_client'];

    update_command($id_commande, $id_plat, $quantite, $total, $date_commande, $etat, $nom_client, $telephone_client, $email_client, $adresse_client);
    header('Location:/?page=admin&gest=com');
    exit;
}
?>