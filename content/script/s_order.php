<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once '../../vendor/autoload.php';

// include database and session files
require_once '../../dao.php';
require_once '../../session.php';

//TODO: Pour la gestion de comptes user
// if (!isset($_SESSION['login'])) {
//   header('Location: login.php');
//   exit;
// }

if (isset($_POST['submit'])) {
  $nom = $_POST['nom'];
  $telephone = $_POST['tel'];
  $email = $_POST['email'];
  $adresse = $_POST['adresse'];
  $plat_id = $_POST['plat'];
  $quantite = $_POST['quantite'];

  $selected_plat = o_display_plat($plat_id);

  var_dump($selected_plat);

  $total = $selected_plat->prix * $quantite;

  new_order($plat_id,$quantite,$total,$nom,$telephone,$email,$adresse);

  $mail = new PHPMailer(true);

  // On va utiliser le SMTP
  $mail->isSMTP();

  // On configure l'adresse du serveur SMTP
  $mail->Host       = 'localhost';    

  // On désactive l'authentification SMTP
  $mail->SMTPAuth   = false;    

  // On configure le port SMTP (MailHog)
  $mail->Port       = 1025;                                   

  // Expéditeur du mail - adresse mail + nom (facultatif)
  $mail->setFrom('matthias@thedistrict.com', 'The District');

  // Destinataire(s) - adresse et nom (facultatif)
  $mail->addAddress($email,$nom);

  //Adresse de reply (facultatif)
  $mail->addReplyTo("matthias@thedistrict.com", "Reply");

  //CC & BCC
//   $mail->addCC("cc@example.com");
//   $mail->addBCC("bcc@example.com");

  // On précise si l'on veut envoyer un email sous format HTML 
  $mail->isHTML(true);

  // On ajoute la/les pièce(s) jointe(s)
  // $mail->addAttachment('/path/to/file.pdf');

  // Sujet du mail
  $mail->Subject = 'Votre commande The District';

  $message = '';
  //HEADER
  $message .= '<!DOCTYPE html>';
  $message .= '<html lang="fr"><head><meta charset="utf-8"><title>Votre commande The District</title>';
  //META
  $message .= '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
  //CSS
  $message .= '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
  //BODY
  $message .= '</head><body>';
  
  $message .= '<h1 class="text-center">Votre commande The District</h1>';
  
  $message .= '<p>Bonjour '.$nom.' et merci de votre commande !</p>';
  $message .= '<p>Voici un récapitulatif :</p>';
  $message .= '<table><thead><th>Produit</th><th>Quantité</th><th>Total</th><thead>';
  $message .= '<tbody><td>'.$selected_plat->prix.'</td><td>'.$quantite.'</td><td>'.$total.'</td></tbody>';
  $message .= '</table>';
  
  $message .= '<p>Votre adresse de livraison :</p>';
  $message .= '<p>'.$adresse.'</p>';
  
  $message .= '<p>En esperant vous revoir bientot sur notre site,</p>';
  $message .= '<img src="/asset/img/the_district_brand/logo_transparent.png" alt="Logo The District">';
  
  $message .= '</body></html>';

  // Corps du message
  $mail->Body = $message;

  // On envoie le mail dans un block try/catch pour capturer les éventuelles erreurs
  if ($mail){
      try {
          $mail->send();
          echo 'Email envoyé avec succès';
          } catch (Exception $e) {
          echo "L'envoi de mail a échoué. L'erreur suivante s'est produite : ", $mail->ErrorInfo;
          }
    }

    header('Location:/?page=order_confirm');
    exit;
}
?>