<?php 
/************************* CONTROLLER ****************/

	// Appel du fichier SQL correspondant
	require_once ("models/mesformationsp.php");
	
	$membres = chercherMesForma();
	
	
	// Appel de la vue correspondante 
	require_once("views/mesformationsp.php");


?>