<?php 

/* ****************    MODEL **********************/

		function chercherUser()
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT * FROM salarie ");
		
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
function chercherFormation()
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT * FROM formation ");
		
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
	function chercherLastUser()
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT * FROM salarie WHERE idsalarie = (SELECT MAX(idsalarie) FROM salarie)");
		
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
	
    function NombreUser()
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT COUNT(*) FROM salarie");
		
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
 function NombreMessage()
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT COUNT(*) FROM message");
		
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
function chercherLastMessage()
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT * FROM message WHERE idmessage = (SELECT MAX(idmessage) FROM message)");
		
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
	
function chercherLastFormation()
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT * FROM formation WHERE idformation = (SELECT MAX(idformation) FROM formation)");
		
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
	
    function NombreFormation()
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT COUNT(*) FROM formation");
		
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
 function NombreResa()
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT COUNT(*) FROM formavalid");
		
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
function chercherLastFormationResa()
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT * FROM formavalid v, formation f WHERE v.idformation = f.idformation AND v.idformation = (SELECT MAX(idformation) FROM formavalid)");
		
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
?>