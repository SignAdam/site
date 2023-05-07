<?php
require_once "db.php";
require_once "functions.php";

if(isset($_POST["password"]))
{
  if(isset($_POST["mail"])){
      $mdp=$_POST["password"];
      $email=$_POST["mail"];

      $requete = $connection->prepare("SELECT * FROM utilisateur WHERE Email = :email");
      $requete->execute([':email' => $email]);
          if ( $requete->rowCount() == 1 ) {
          
            $membre = $requete->fetch(PDO::FETCH_ASSOC);
            //debug($membre);

            $dbpwd = $membre['Password'];

            if ($mdp == $membre['Password']) {
               $_SESSION['user'] = $membre;
            //   $_SESSION['nom'] = $membre['nom'];
            //   $_SESSION['id'] = $membre['id'];
              echo "Vous etes connectez  ".$membre['Nom'];
            } else {
              
                echo "Identifiants incorrects ";
            }
        } 
  }
}


?>