<?php 
/********************** MODEL **************/
	
function chercherMembre()
	{
		global $bdd;
		
		$requete = $bdd -> prepare( "SELECT * FROM salarie WHERE idsalarie = ".$_GET['idsalarie']."");
		
		
		$requete -> execute();
		
		return $requete -> fetchAll();
	}
function chercherValidation($id_salarie)
	{
		global $bdd;
		
		$sql = "SELECT * FROM formation WHERE idformation in ( SELECT idformation FROM participer WHERE idsalarie= :id_salarie AND etat= 'en cours de validation')";
		
		$req = $bdd -> prepare($sql);
		$req -> bindValue(":id_salarie",$id_salarie,PDO::PARAM_INT);
		
		$req -> execute();
		
		return $req -> fetchAll();
	}

function chercherActValidation($id_salarie)
	{
		global $bdd;
		
		$sql = "SELECT * FROM formation WHERE idformation in ( SELECT idformation FROM participer WHERE idsalarie= :id_salarie AND etat= 'validee')";
		
		$req = $bdd -> prepare($sql);
		$req -> bindValue(":id_salarie",$id_salarie,PDO::PARAM_INT);
		
		$req -> execute();
		
		return $req -> fetchAll();
	}
	
	
function chercherCommune()
	{
		global $bdd;
		
		$requete = $bdd -> prepare(" SELECT * FROM commune, salarie WHERE salarie.idcommune = commune.idcommune AND salarie.idsalarie = ".$_GET['idsalarie']."");
		
		
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
?>