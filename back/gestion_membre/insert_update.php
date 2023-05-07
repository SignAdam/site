<?php
include('db.php');
include('fonction.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
	$statement = $connection->prepare("
      INSERT INTO utilisateur (Nom,Prenom,CodePostal,Ville,Pseudo,Password,Email,DateNaissance,role) 
      VALUES (:nom,:prenom,:codepostal,:ville,:pseaudo,:password,:email,:datenaissance,:role)
    ");
    
    $resultat = $statement->execute(
      array(
        ':nom'	=>	$_POST["nom"],
        ':prenom'	=>	$_POST["prenom"],
        ':codepostal'	=>	$_POST["codepostal"],
        ':ville'	=>	$_POST["ville"],
        ':pseaudo'	=>	$_POST["pseudo"],
        ':password'	=>	$_POST["password"],
        ':email'	=>	$_POST["email"],
        ':datenaissance'=>	$_POST["datenaissance"],
        ':role'	=>	"user",
      )
    );
		if(!empty($resultat))
		{
			echo 'l utilisateur entré avec succès !';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE utilisateur 
			SET Nom = :nom, Prenom = :prenom, CodePostal = :codepostal, Ville = :ville,Pseudo = :pseudo,Password = :password, Email = :email, DateNaissance = :datenaissance, role = :role
			WHERE id = :id
			"
		);
		$resultat = $statement->execute(
			array(
				':nom'	=>	$_POST["nom"],
				':prenom'	=>	$_POST["prenom"],
				':codepostal'	=>	$_POST["codepostal"],
				':ville'	=>	$_POST["ville"],
				':pseudo'	=>	$_POST["pseudo"],
				':password'	=>	$_POST["password"],
				':datenaissance'	=>	$_POST["datenaissance"],
				':email'	=>	$_POST["email"],
				':role'	=>	$_POST["role"],
				':id'=>	$_POST["id"]
			)
		);
		if(!empty($resultat))
		{
			echo 'le membre a été modifié avec succès !';
		}
	}
}

?>