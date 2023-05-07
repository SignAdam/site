<?php
  // error_reporting(E_ALL);
	// ini_set('display_errors', 1);
  require_once "db.php";
  require_once "functions.php";


  		// if(!empty($_POST)){
      //     extract($_POST);
      //     $valid = (boolean) true;
      //     if(isset($_POST['connexion'])){
      //       $mail = (String) strtolower(trim($mail));
      //       $password = (String) trim($password);

      //       if(empty($mail)){
      //         $valid = false;
      //         $err_mail = "Veuillez renseigner ce champ !";
      //       } else{
      //         $select = mysqli_query($mysqli, "SELECT * FROM utilisateur WHERE Email = '".$_POST['mail']."'");
      //         if(!mysqli_num_rows($select)) {
      //           $valid = false;
      //           $err_mail = "Ce mail n'existe pas";
      //         }
      //       }
    
      //       if(empty($password)){
      //         $valid = false;
      //         $err_password = "Veuillez renseigner ce champ !";
      //       }

      //       $verif_utilisateur = mysqli_query($mysqli, "SELECT id FROM utilisateur WHERE Email = '".$_POST['mail']."' AND Password = '".$_POST['password']."' ");
      //       if(!isset($verif_utilisateur)['id']){
      //         $valid = false;
      //         $err_mail = "Mail non existant";
      //       }

          
      //         if($valid){
      //           $req = $mysqli->prepare("INSERT INTO utilisateur (DateConnexion) VALUES(?)");
      //           $req->bind_param("s", date('Y-m-d h:m:s'));
      //           $req->execute();

      //           $verif_utilisateur = mysqli_query($mysqli, "SELECT * FROM utilisateur WHERE Id = ?");
      //           $_SESSION['id'] = $verif_utilisateur['id'];
      //           $_SESSION['pseudo'] = $verif_utilisateur['pseudo'];
      //           $_SESSION['mail'] = $verif_utilisateur['mail'];
          
      //           header('Location: /');
      //           exit;
      //         }
      //       }
      // }
?>

<!doctype html> 
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="loginstyle.css">

    <title>Connexion</title>
  </head>
  <body>
  	<div class="conteneur col-lg-offset-3 col-lg-6">
  		<h2>Connexion</h2>
	  	<form method="post" id="se_connecter_form" >
	  		<section>
	  			<div class="form-group">
	  				<label>Email :</label>
	  				<input type="text" id="mail" name="mail" placeholder="Entrez ici..." class="form-control">
	  			</div>
	  			<div class="form-group">
	  				<label>Mot de passe :</label>
	  				<input type="text" id="password" name="password" placeholder="Entrez ici..." class="form-control">
	  			</div>
	  		</section>
	  		<input class="btn btn-success" type="submit" name="connexion" value="Se connecter">
	  	</form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){

      $(document).on('submit', '#se_connecter_form', function(event){
        event.preventDefault();
          var email = $('#mail').val();
          var mdp = $('#password').val();
        
          if(email != '' && mdp != '' )
          {
            $.ajax({
              url:"connexion_process.php",
              method:'POST',
              data:new FormData(this),
              contentType:false,
              processData:false,
              success:function(data)
              {
                alert(data);
                window.location.href = './index.php';
              }
            });
          }
          else
          {
            alert("Obligatoire de remplir tout le formulaire");
          }
        });

    });
</script>