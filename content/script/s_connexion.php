<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

require "../../dao.php";
$usr_info = user_co($_REQUEST['userEmail']);

if($usr_info == false){
    header("Location:/?page=c");
    $_SESSION['error_login']=1;
}
else {
    echo '<br>ok<br>';

    
echo 'valeur request :';
echo $_REQUEST["userPassword"];
echo '<br>';

echo 'valeur bdd :';
echo $usr_info->password;
echo '<br>';

if(!password_verify($_REQUEST['userPassword'],$usr_info->password))
{
    header("Location:/?page=c");
    $_SESSION['error_login']= 2;
}
else
{
    $_SESSION['login'] = $usr_info->email;
    $_SESSION['prenom'] = $usr_info->prenom;
    header("Location:/?page=admin");
}

}

?>