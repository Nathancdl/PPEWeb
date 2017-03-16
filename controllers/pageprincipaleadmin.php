<?php 

	/*********************     CONTROLLER  *****************************/
	

	// Appel du fichier SQL correspondant
	require_once ("models/pageprincipaleadmin.php");
	
	
    $lastmembre = chercherLastUser();
    $membres = chercherUser();
    $nombre = NombreUser();
	$nombreforma = NombreFormation();
    $nombreresa = NombreResa();
    $nombremessage = NombreMessage();
    $lastmessage = chercherLastMessage();
	$lastformation = chercherLastFormation();
    $lastresa = chercherLastFormationResa();
    $formation = chercherFormation();
	// Appel de la vue correspondante 
	require_once("views/pageprincipaleadmin.php");
 