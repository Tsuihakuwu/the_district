
<?php

if(session_status() !== PHP_SESSION_ACTIVE) session_start();

unset($_SESSION["login"]);
unset($_SESSION["prenom"]);

    if (ini_get("session.use_cookies"))
    {
        setcookie(session_name(), '', time()-42000);
    }

session_destroy();

header("Location:/index.php");

?>