<?php var_dump($_REQUEST); 

$name = $_REQUEST['userName'];
$mail = $_REQUEST['userEmail'];
$subject = $_REQUEST['subject'];
$content = $_REQUEST['content'];

// Destinataires
$destinataires = "administrateur@thedistrict.fr";

$objet = $subject; 

$aHeaders = array('MIME-Version' => '1.0',
'Content-Type' => 'text/html; charset=utf-8',
'From' => '<'.$_REQUEST['userEmail'].'>',
'Reply-To' => $_REQUEST['userEmail'],
'X-Mailer' => 'PHP/' . phpversion()
);

$message = '';

//HEADER
$message .= '<!DOCTYPE html>';
$message .= '<html lang="fr"><head><meta charset="utf-8"><title>Réinitialisation Mot de passe</title>';
//META
$message .= '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
//CSS
$message .= '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
//BODY
$message .= '</head><body>';

$message .= '<p>'.$content.'</p>';
$message .= '</body></html>';

try {
$bEnvoie = mail($destinataires, $objet, $message, $aHeaders);
echo 'Email bien envoy&eacute; &agrave; ' . $destinataires;
}catch (Exception $e){
    echo 'erreur';
}

header('Location:/index.php');