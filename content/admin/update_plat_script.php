<?php
require_once("../../session.php");
require_once("../../dao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_plat = $_REQUEST['id_plat'];
    $nom_plat = $_REQUEST['nom_plat'];
    $prix_plat = $_REQUEST['prix_plat'];
    $description_plat = $_REQUEST['description_plat'];
    $categorie_id = $_REQUEST['categorie_id'];
    $photo_plat = $_FILES['image_plat']['name'];

    if (empty($photo_plat)) {
        $photo_plat = $_POST['old_plat_img'];
    }

    try {

        update_plat($id_plat,$nom_plat,$description_plat,$prix_plat,$photo_plat,$categorie_id);

        if (!empty($photo_plat)) {
            $uploadPath = "../../asset/img/food/";
            $fileTemp = $_FILES['image_plat']['tmp_name'];
            $file = $_FILES['image_plat']['name'];
            move_uploaded_file($fileTemp, $uploadPath.$file);
        }

        header("Location:/?page=admin&gest=plat");

        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}

if (!isset($_REQUEST['id_plat'])) {
    header("Location:/?page=admin&gest=plat");
    exit;
}

?>