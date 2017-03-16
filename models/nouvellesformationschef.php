<?php 

/* ****************    MODEL **********************/

	
	function chercherFormations()
	{
		
		global $bdd;
		
        $requete = $bdd -> prepare("SELECT * FROM formation
        WHERE idformation NOT IN (SELECT idformation FROM formavalid WHERE salarie_chef = :id )");
		$requete -> bindValue(":id",$_SESSION["salarie"][0]["idsalarie"],PDO::PARAM_INT);
		$requete -> execute();
		
		return $requete -> fetchAll();

	}
	
	
	function chercherPrestataire($id)
	{
		global $bdd;
		
		$requete = $bdd -> prepare(" SELECT nom FROM salarie WHERE idsalarie = :id");
		
		$requete -> bindValue(":id",$id,PDO::PARAM_INT);
		
		$requete -> execute();
		
		return $requete -> fetch();
	}
	
	function ajouterPropositionFormation($id_formation,$id_salarie)
	{
        
		global $bdd;
		
				$sql = "INSERT INTO formavalid (idformation,salarie_chef) VALUES(:idformation,:idsalarie)";
        			
                $req = $bdd -> prepare($sql);
        
                $req -> bindValue(":idformation",$id_formation,PDO::PARAM_INT);
                $req -> bindValue(":idsalarie",$id_salarie,PDO::PARAM_INT);
                $req -> execute();			
                $req -> fetch();
        
        if($req)
        {
            return true;
        }else {
            return false;
        }
        
		
	}

?>