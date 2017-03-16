<?php 
/************************* CONTROLLER ****************/

	// Appel du fichier SQL correspondant
	require_once ("models/monequipe.php");
	
	$membres = chercherMembresEquipe($_SESSION["salarie"][0]["idsalarie"]);
	
	
	// Appel de la vue correspondante 
	require_once("views/monequipe.php");


?>