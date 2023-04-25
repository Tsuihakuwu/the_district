<?php
require_once('../../session.php');
require_once('../../dao.php');

if (isset($_POST['delete'])) {
    $id_commande = $_POST['id_commande'];

    $status= delete_command($id_commande);

    var_dump($status);

    // Redirect to display com page
    header('Location:/?page=admin&gest=com');
    exit;
}
?>
