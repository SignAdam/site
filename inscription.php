<?php
	require_once "db.php";
	require_once "functions.php";
  		// if(!empty($_POST)){
		// 	extract($_POST);
		// 	$valid = (boolean) true;
		// 	if(isset($_POST['inscription'])){
		// 		$prenom = (String) trim($prenom);
		// 		$nom = (String) trim($nom);
		// 		$ville = (String) trim($ville);
		// 		$departement = (int) $departement;
		// 		$pseudo = (String) trim($pseudo);
		// 		$mail = (String) strtolower(trim($mail));
		// 		$password = (String) trim($password);
		// 		$jour = (int) $jour;
		// 		$mois = (int) $mois;
		// 		$annee = (int) $annee;
		// 		$date_naissance = (String) null;

		// 		if(empty($prenom)){
		// 			$valid = false;
		// 			$err_prenom = "Veuillez renseigner ce champ !";
		// 		}

		// 		if(empty($nom)){
		// 			$valid = false;
		// 			$err_nom = "Veuillez renseigner ce champ !";
		// 		}

		// 		if(empty($ville)){
		// 			$valid = false;
		// 			$err_ville = "Veuillez renseigner ce champ !";
		// 		}

		// 		if(empty($pseudo)){
		// 			$valid = false;
		// 			$err_pseudo = "Veuillez renseigner ce champ !";
		// 		} else{
		// 			$select = mysqli_query($mysqli, "SELECT * FROM utilisateur WHERE Pseudo = '".$_POST['pseudo']."'");
		// 			if(mysqli_num_rows($select)) {
		// 				$valid = false;
		// 				$err_pseudo = "Ce pseudo est déjà utilisé";
		// 			}
		// 		}	

		// 		if(empty($mail)){
		// 			$valid = false;
		// 			$err_mail = "Veuillez renseigner ce champ !";
		// 		} else{
		// 			$select = mysqli_query($mysqli, "SELECT * FROM utilisateur WHERE Email = '".$_POST['mail']."'");
		// 			if(mysqli_num_rows($select)) {
		// 				$valid = false;
		// 				$err_mail = "Ce mail est déjà utilisé";
		// 			}
		// 		}

		// 		if(empty($password)){
		// 			$valid = false;
		// 			$err_password = "Veuillez renseigner ce champ !";
		// 		}

		// 		if(empty($departement)){
		// 			$valid = false;
		// 			$err_departement = "Veuillez renseigner ce champ !";
		// 		} 

		// 		if($jour <= 0 || $jour > 31){
		// 			$valid = false;
		// 			$err_jour = "Veuillez entrer un jour valide.";
		// 		} 

		// 		$verif_mois = array(1,2,3,4,5,6,7,8,9,10,11,12);
		// 		if(!in_array($mois, $verif_mois)){
		// 			$valid = false;
		// 			$err_mois = "Veuillez entrer un mois valide.";
		// 		} 

				
		// 		if($annee <= 1959 || $annee > 2004){
		// 			$valid = false;
		// 			$err_annee = "Veuillez entrer une annee valide.";
		// 		} 

		// 		if(!checkdate($jour, $mois, $annee)){
		// 			$valid = false;
		// 			$err_date = "Date fausse";
		// 		} else {
		// 			$date_naissance = $annee . '-' . $mois . '-' . $jour;
		// 		}
 
		// 		if($valid){
		// 			$date_inscription = date("Y-m-d h:m:s");
		// 			//hash = password_hash($password, PASSWORD_DEFAULT);
		// 			$req = $mysqli->prepare("INSERT INTO utilisateur (Nom, Prenom, CodePostal, Ville, Pseudo, Email, Password, DateNaissance, DateCreation ) VALUES(?,?,?,?,?,?,?,?,?)");
		// 			$req->bind_param("ssissssss", $nom, $prenom, $departement, $ville, $pseudo, $mail, $password, $date_naissance, $date_inscription);
		// 			$req->execute();
		// 			header('Location: connexion.php');
		// 			exit;
		// 		}
		// 	}
		// }
?> 
<!doctype html>
<html lang="fr">
 
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<head>
    <meta charset="utf-8" />
    <title>Le Quai Antique</title>

    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--

Template 2076 Zentro

http://www.tooplate.com/view/2076-zentro

-->
   
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,500"
      rel="stylesheet"
      type="text/css"
    />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
		
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="loginstyle.css">
	
    <title>Inscription</title>
  </head>
  <body>
  	<div class="conteneur col-lg-offset-3 col-lg-6">
  		<h2>Inscription</h2>
	  	<form id="s_inscrire_form" method="post">
	  		<section>
	  			<div class="form-group">
	  				<label>Prénom :</label>
	  				<input type="text" id="prenom" name="prenom" class="form-control">
	  			</div>
	  			<div class="form-group">
	  				<label>Nom :</label>
	  				<input type="text" id="nom" name="nom" class="form-control">
	  			</div>
	  			<div class="form-group">
	  				<label>Ville :</label>
	  				<input type="text" id="ville" name="ville" class="form-control">
	  			</div>
	  			<div class="form-group">
	  				<label>Departement :</label>
	  				<input type="text" id="departement" name="departement" class="form-control">
	  			</div>
	  			<div class="form-group">
	  				<label> Pseudo (Vous apparaitrez avec ce nom) :</label>
	  				<input type="text" id="pseudo" name="pseudo"  class="form-control">
	  			</div>
	  			<div class="form-group">
	  				<label>Adresse mail :</label>
	  				<input type="text" id="mail" name="mail" class="form-control">
	  			</div>
	  			<div class="form-group">
	  				<label>Mot de passe :</label>
	  				<input type="password" id="password"  name="password" class="form-control">
	  			</div>
	  			<div>
	  			<label>Date de naissance  :</label>
	  			<input type="date" id="date_naissance" name="date_naissance" class="form-control"><br>
	  			</div>
	  		</section>
	  		<input class="btn btn-success" type="submit" id="inscription"  name="inscription" value="S'inscrire">
			
	  	</form>
	  </div>

<script type="text/javascript" language="javascript" >
    $(document).ready(function(){

		$(document).on('submit', '#s_inscrire_form', function(event){
          event.preventDefault();
          var prenom = $('#prenom').val();
          var nom = $('#nom').val();
          var ville = $('#ville').val();
		  var departement = $('#departement').val();
          var pseudo = $('#pseudo').val();
          var mail = $('#mail').val();
		  var password = $('#password').val();
          var date_naissance = $('#date_naissance').val();
        
          if(prenom != '' && nom != '' && ville != ''  && departement != '' && pseudo != ''  && mail != '' && password != '' && date_naissance != '')
          {
            $.ajax({
              url:"inscription_process.php",
              method:'POST',
              data:new FormData(this),
              contentType:false,
              processData:false,
              success:function(data)
              {
                alert(data);
                window.location.href = './connexion.php';
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>