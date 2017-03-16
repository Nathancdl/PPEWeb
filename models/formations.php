<?php 
/********************** MODEL **************/

	function chercherFormation()
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT * FROM formation WHERE idformation = ".$_GET['idformation']."");
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
function chercherPrestataire()
	{
		global $bdd;
		
		$requete = $bdd -> prepare(" SELECT * FROM  formation f, salarie s  WHERE f.idformation = ".$_GET['idformation']." AND  f.idprestataire = s.idsalarie");
		
	
		
		$requete -> execute();
		
		return $requete -> fetch();
	}
function chercherCommune()
	{
		global $bdd;
		
		$requete = $bdd -> prepare(" SELECT * FROM commune, formation WHERE formation.idcommune = commune.idcommune AND formation.idformation = ".$_GET['idformation']."");
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}


?>