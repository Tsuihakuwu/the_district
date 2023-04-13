<?php

    include('header.php');
    include('nav.php');
    
    //Liste des pages
    if(isset($_REQUEST["page"])){
        switch($_REQUEST["page"]){
            case "categorie":
                include("content/user/categorie.php");
                break;
            case "plat":
                include("content/user/plat.php");
                break;
            case "contact":
                include("content/user/contact.php");
                break;
            case "detail":
                if(isset($_REQUEST["p_id"])){
                    include("content/user/d_plat.php");
                }
                if(isset($_REQUEST["c_id"])){
                    include("content/user/d_categorie.php");
                }
                else {
                    header("Location:index.php");
                }
        }
    }
    else {
        include("content/user/accueil.php");
    }

    include('footer.php');

?>