<?php
require_once('../../dao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the values from the form
    $id_utilisateur = $_POST['id_utilisateur'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    // Update the user in the database
    update_user($id_utilisateur, $nom, $prenom, $email);

    // Redirect to the list of users
    header('Location:/?page=admin&gest=usr');
    exit;
}

if (isset($_GET['id'])) {
    // Retrieve the user from the database
    $user = o_display_usr($_GET['id']);
} else {
    // Redirect to the list of users if no user ID was provided
    header('Location:/?page=admin&gest=usr');
    exit;
}
?>