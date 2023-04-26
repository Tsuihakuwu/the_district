<?php

require_once('../../session.php');
require_once('../../dao.php');

if(isset($_POST['submit'])) {
  $libelle = $_POST['nom_plat'];
  $description = $_POST['description_plat'];
  $prix = $_POST['prix_plat'];
  $image = $_POST['image_plat'];
  $id_categorie = $_POST['categorie_plat'];


   // Create new plat
if (create_plat($libelle,$description,$prix,$image,$id_categorie)) {
    $_SESSION['success_message'] = "Le plat a été créé avec succès";
    header('Location:/?page=admin&gest=plat');
    exit;
  } else {
    $_SESSION['error_message'] = "Erreur durant la création du plat";
    header('Location:/?page=admin&gest=plat');
    exit;
  }
}
