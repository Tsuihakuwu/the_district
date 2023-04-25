<?php
require_once('../../session.php');
require_once('../../db.php');
require_once('../../dao.php');

$prix_plat = detail_cat($_POST['id_plat']);

if(isset($_POST['submit'])) {

    
    echo 'submit ok<br>';
  // Get input data
  $id_plat = $_POST['id_plat'];
  $quantite = $_POST['quantite'];
  $total = ($quantite*$prix_plat->prix);
  $date_commande = date("Y-m-d H:i:s");
  $nom_client = $_POST['nom_client'];
  $telephone_client = $_POST['telephone_client'];
  $email_client = $_POST['email_client'];
  $adresse_client = $_POST['adresse_client'];

  // Validate input data
  if(empty($id_plat) || empty($quantite) || empty($date_commande) || empty($nom_client) || empty($telephone_client) || empty($email_client) || empty($adresse_client)) {
    // Input validation failed, redirect back to form with error message
    $_SESSION['error'] = 'Veuillez remplir tous les champs du formulaire.';
    echo '<br>error';
    header('Location:/?page=admin&gest=com');
    exit();
  }

  create_command($id_plat,$quantite,$date_commande,$total,$nom_client,$telephone_client,$email_client,$adresse_client);

  // Redirect to display command page with success message
  $_SESSION['success'] = 'La commande a été créée avec succès.';
  echo '<br>success';
  header('Location:/?page=admin&gest=com');
  exit();
}
?>