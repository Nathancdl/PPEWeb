<?php 
/************************* CONTROLLER ****************/

	// Appel du fichier SQL correspondant
	require_once ("models/formations.php");
	
	$formation = chercherFormation();
    $commune = chercherCommune();
    $presta = chercherPrestataire();
	

	
	// Appel de la vue correspondante 
	require_once("views/formations.php");


?>