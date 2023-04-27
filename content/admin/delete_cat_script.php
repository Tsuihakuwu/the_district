<?php
require_once('../../session.php');
require_once('../../dao.php');

if (isset($_POST['delete'])) {
    
    $id_cat = $_POST['id_cat'];

    $status = delete_cat($id_cat);

    if($status){
        $_SESSION['delete_success'] = "La catégorie a été supprimée";
        echo 'deleted';
    }
    else {
        $_SESSION['delete_error'] = "Erreur suppression";
        echo 'error';
    }

    echo $status;

    // Redirect to display com page
    header('Location:/?page=admin&gest=cat');
    exit;
}
?>
