<?php

require_once('../../session.php');
require_once('../../dao.php');

if (isset($_POST['submit'])) {
    $nom = $_POST['nom_categorie'];
    $image = $_FILES['image_cat']['name'];

    try {

        create_cat($nom, $image);

        if (!empty($image)) {
            $uploadPath = "../../asset/img/category/";
            $fileTemp = $_FILES['image_cat']['tmp_name'];
            $file = $_FILES['image_cat']['name'];
            move_uploaded_file($fileTemp, $uploadPath . $file);
        }

        $_SESSION['success_message'] = "La catégorie a été créée avec succès";
        // header('Location:/?page=admin&gest=cat');
        echo $_SESSION['success_message'];

        exit;
    } catch (PDOException $e) {
        $_SESSION['error_message'] = "Error: " . $e->getMessage();
        // header('Location:/?page=admin&gest=cat');
        echo $_SESSION['error_message'];
        exit;
    }
}