<?php

    include('header.php');
    include('nav.php');
    
    //Liste des pages
    if(isset($_REQUEST["page"])){
        switch($_REQUEST["page"]){
            case "tmp":
                include("tmp.php");
                break;
        }
    }
    else {
        include("content/user/accueil.php");
    }

    include('footer.php');
?>