<?php 
/********************** MODEL **************/

	function chercherMesForma()
	{
        
		global $bdd;
		
	
        $requete = $bdd -> prepare ("SELECT * FROM formation f,salarie s WHERE f.idprestataire = s.idsalarie AND s.idsalarie = ".$_SESSION["salarie"][0]["idsalarie"]);
		 
	    $requete -> execute();
		
        return $requete -> fetchAll();
	}

	

?>