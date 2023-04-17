<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

require "../../dao.php";
$usr_info = user_co($_REQUEST['userEmail']);

// var_dump($usr_info);
var_dump($_REQUEST);

if($usr_info == false){
    echo '<br>pas trouvé dans la base';
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



// if(!password_verify($_REQUEST['userPassword'],$usr_info->password))
// {
    // header("Location:/?page=c");
    // $_SESSION['error_login']=2;
// }
// else
// {
// 
    // echo 'auth ok';
    // $_SESSION['login'] = $_POST['log'];
    // $_SESSION['auth_lvl'] = $user->auth_level;
// 
    // echo $_SESSION['auth_lvl'];
// 
    // header("Location:/index.php");
//  }
// 

}
?>