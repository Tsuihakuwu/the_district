<?php

    if(session_status() !== PHP_SESSION_ACTIVE) session_start();

    include('header.php');
    include('nav.php');
    
    //Liste des pages
    if(isset($_REQUEST["page"])){
        switch($_REQUEST["page"]){
            case "c":
                include("content/admin/connexion.php");
                break;
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
            case "admin":
                if(isset($_SESSION['login'])&&$_SESSION['login']!=""){
                    include("content/admin/admin_panel.php");
                    if(isset($_REQUEST['gest'])){
                        switch($_REQUEST['gest']){
                            case "cat":
                                include("content/admin/admin_cat.php");
                                break;
                            case "plat":
                                include("content/admin/admin_plat.php");
                                break;
                            case "com":
                                include("content/admin/admin_com.php");
                                break;
                            case "usr":
                                include("content/admin/admin_usr.php");
                                break;
                            case "user_mod":
                                include("content/admin/update_user_form.php");
                                break;
                            case "user_create":
                                include("content/admin/create_user_form.php");
                                break;
                            case "user_delete":
                                include("content/admin/delete_user_form.php");
                                break;
                            case "com_create":
                                include("content/admin/create_command_form.php");
                                break;
                            case "com_mod":
                                include("content/admin/update_command_form.php");
                                break;
                            case "com_delete":
                                include("content/admin/delete_command_form.php");
                                break;
                        }
                    }
                }
                else{
                    header("Location:index.php");
                }
                break;
        }
    }
    else {
        include("content/user/accueil.php");
    }

    include('footer.php');

?>