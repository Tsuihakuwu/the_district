<?php

require_once('../../dao.php');
if (session_status() !== PHP_SESSION_ACTIVE) session_start();

if(isset($_SESSION['login']) && isset($_REQUEST['id_utilisateur'])){
  $user = o_display_usr($_REQUEST['id_utilisateur']);
  echo $user->email;
  echo $_SESSION['login'];
  if($user && $user->email == $_SESSION['login']){
    $_SESSION['error'] = "Vous ne pouvez pas supprimer votre propre compte.";
    echo 'error';
    // header("Location:/?page=admin&gest=usr");
    exit();
  }
}

if(isset($_REQUEST['id_utilisateur'])){
  delete_user($_REQUEST['id_utilisateur']);
  $_SESSION['success'] = "Utilisateur supprimé avec succès.";
  echo 'ok';
}
// header("Location:/?page=admin&gest=usr");
exit();
?>