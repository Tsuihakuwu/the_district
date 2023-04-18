<?php
require_once('dao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the values from the form
    $id_utilisateur = $_POST['id_utilisateur'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Update the user in the database
    update_user($id_utilisateur, $nom, $prenom, $email, $password);

    // Redirect to the list of users
    header('Location: users.php');
    exit;
}

if (isset($_GET['id'])) {
    // Retrieve the user from the database
    $user = get_user($_GET['id']);
} else {
    // Redirect to the list of users if no user ID was provided
    header('Location: users.php');
    exit;
}
?>