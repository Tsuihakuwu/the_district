<?php
require_once("../../session.php");
require_once("../../dao.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_categorie = $_REQUEST['id_categorie'];
    $nom_categorie = $_REQUEST['nom_categorie'];
    $photo_cat = $_FILES['image_cat']['name'];

    if (empty($photo_cat)) {
        $photo_cat = $_REQUEST['old_cat_img'];
    }

    try {

        update_cat($id_categorie,$nom_categorie,$photo_cat);

        if (!empty($photo_cat)) {
            $uploadPath = "../../asset/img/category/";
            $fileTemp = $_FILES['image_cat']['tmp_name'];
            $file = $_FILES['image_cat']['name'];
            move_uploaded_file($fileTemp, $uploadPath.$file);
        }

        header("Location:/?page=admin&gest=cat");

        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
}

if (!isset($_REQUEST['id_categorie'])) {
    header("Location:/?page=admin&gest=cat");
    exit;
}

?>