<?php

    include('header.php');
    
    include('nav.php');
    
    //Liste des pages
    if (isset($_POST["page"])){
        switch($_POST['page']){
            case 'tmp':
                include('tmp.php');
                break;
        }
    }
    
    include('footer.php');

?>