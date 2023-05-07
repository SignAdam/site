<?php
require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "db.php";
require_once "functions.php";
unset($_SESSION['user']);
if (!empty($_POST)) {
    $email=$_POST["mail"];
    $nom=$_POST["nom"];
    envoyerMessageConfirmation($email,$nom);

    $statement = $connection->prepare("
      INSERT INTO utilisateur (Nom,Prenom,CodePostal,Ville,Pseudo,Password,Email,DateNaissance,role) 
      VALUES (:nom,:prenom,:codepostal,:ville,:pseaudo,:password,:email,:datenaissance,:role)
    ");
    
    $resultat = $statement->execute(
      array(
        ':nom'	=>	$_POST["nom"],
        ':prenom'	=>	$_POST["prenom"],
        ':codepostal'	=>	$_POST["departement"],
        ':ville'	=>	$_POST["ville"],
        ':pseaudo'	=>	$_POST["pseudo"],
        ':password'	=>	$_POST["password"],
        ':email'	=>	$_POST["mail"],
        ':datenaissance'=>	$_POST["date_naissance"],
        ':role'	=>	"user",
      )
    );

    if ($resultat) {
       
        echo "Bravo vous êtes inscrit. Vous pouvez maintenant vous connecter ! <br>";
        
 

    } else {
        echo"Erreur lors de l'enregistrement <br>";
    }


}

function envoyerMessageConfirmation($email,$nom) {
    

  
  // Créer une nouvelle instance de PHPMailer
  $mail = new PHPMailer();
  
  // Paramètres du serveur SMTP
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com'; // Remplacez par le serveur SMTP souhaité
  $mail->SMTPAuth = true;
  $mail->Username = 'test@yopmail.com'; // Remplacez par votre adresse e-mail
  $mail->Password = ''; // Remplacez par votre mot de passe
  $mail->Port = 587; // Remplacez par le port SMTP approprié
  
  // Destinataire et expéditeur
  $mail->setFrom('', $nom);
  $mail->addAddress($email);
  
  // Contenu de l'e-mail
  $mail->Subject = 'Madame/Monsieur';
  $mail->Body = 'Merci de vous être inscrit chez farassos ! Nous vous tiendrons au courant pour les associations proches de chez vous.';
  
  // Envoyer l'e-mail
  if ($mail->send()) {
      echo 'E-mail envoyé avec succès !';
  } else {
      echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $mail->ErrorInfo;
  }
}

?>


