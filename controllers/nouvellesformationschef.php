<?php 

	/*********************     CONTROLLER  *****************************/
	

	// Appel du fichier SQL correspondant
	require_once ("models/nouvellesformationschef.php");
	
	
	// Si le salarié valide l'inscription à une formation, nous nous assurons que celle-ci soit possible
	if (isset ( $_GET ["idformation"] )) 
	{
        echo $_GET["idformation"];
        echo $_SESSION["salarie"][0]["idsalarie"];
        
		if(ajouterPropositionFormation($_GET["idformation"],$_SESSION["salarie"][0]["idsalarie"]))
		{
			echo "c'est bon";    
		}
		else
		{
			echo "c'est pas bon";
			
		}
	}
	
	
	
	// Permet de gérer les erreurs et informations
	function gestionErreursGet()
	{
		if(isset($_GET["erreur"])){
			echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>".$_GET["erreur"]."</div>";
		}
		else if (isset($_GET["infos"])){
			echo "<div class='infos valign'><i class='material-icons left medium '>check</i>".$_GET["infos"]."</div>";
		}
	}
	
	// nous allons chercher toutes les formations disponibles 
	$formations = chercherFormations();
	
	// Pour chaque formation, nous allons récupérer le nom du prestataire
	function chercherNomPrestataire($id)
	{
		return chercherPrestataire($id);
	}
	
	
	

	
	
	// Appel de la vue correspondante 
	require_once("views/nouvellesformationschef.php");

?>