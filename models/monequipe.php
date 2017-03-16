<?php 
/********************** MODEL **************/

	function chercherMembresEquipe($id_chef)
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT * FROM salarie WHERE salarie_chef = :id");
		
		$requete -> bindValue(":id",$id_chef,PDO::PARAM_INT);
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}

	
	
?>