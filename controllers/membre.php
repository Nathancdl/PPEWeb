<?php 
/************************* CONTROLLER ****************/

	// Appel du fichier SQL correspondant
	require_once ("models/membre.php");
	
	
	$membre = chercherMembre();
    $commune = chercherCommune();
	
	// Appel de la vue correspondante 
	require_once("views/membre.php");


?>