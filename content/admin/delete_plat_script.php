<?php
require_once('../../session.php');
require_once('../../dao.php');

if (isset($_POST['delete'])) {
    $id_plat = $_POST['id_plat'];

    $status = delete_plat($id_plat);

    if($status){
        $_SESSION['delete_success'] = "Le plat a été supprimé";
        echo 'deleted';
    }
    else {
        $_SESSION['delete_error'] = "Erreur suppression";
        echo 'error';
    }

    echo $status;

    // Redirect to display com page
    header('Location:/?page=admin&gest=plat');
    exit;
}
?>
