<?php
include('db.php');
include('fonction.php');
if(isset($_POST["id"]))
{
	$saida = array();
	
	$statement = $connection->prepare(
		"SELECT * FROM utilisateur 
		WHERE id = '".$_POST["id"]."' 
		LIMIT 1"
	);
	
	$statement->execute();
	$resultat = $statement->fetchAll();
	
	foreach($resultat as $linha)
	{
		$saida["Nom"] = $linha["Nom"];
		$saida["Prenom"] = $linha["Prenom"];
		$saida["CodePostal"] = $linha["CodePostal"];
		$saida["Ville"] = $linha["Ville"];
		$saida["Pseudo"] = $linha["Pseudo"];
		$saida["Password"] = $linha["Password"];
		$saida["Email"] = $linha["Email"];
		$saida["DateNaissance"] = $linha["DateNaissance"];
		$saida["role"] = $linha["role"];
	
	}
	echo json_encode($saida);
}
?>