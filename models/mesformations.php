<?php 

/* ****************    MODEL **********************/

	function  chercherFormationsHistorique($id_salarie)
	{
		global $bdd;
		
		$sql = "SELECT * from formation, participer WHERE formation.idformation = participer.idformation
				AND participer.idsalarie = :id ORDER BY date DESC ";
		$req = $bdd -> prepare($sql);
		
		$req -> bindValue(":id",$id_salarie,PDO::PARAM_INT);
		
		$req -> execute();
		
		return $req -> fetchAll();
		
		 
	}
	
	function chercherEtatFormation($idformation,$id_salarie)
	{
		global $bdd;
		$sql = "SELECT etat FROM participer WHERE idformation = :id and idsalarie = :id_salarie";
		
		$req = $bdd -> prepare($sql);
		
		$req -> bindValue(":id",$idformation,PDO::PARAM_INT);
		$req -> bindValue(":id_salarie",$id_salarie,PDO::PARAM_INT);
		
		$req -> execute();
		
		return $req -> fetch();
	}
	
	
	

?>