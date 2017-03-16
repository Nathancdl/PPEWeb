<?php 

/* ****************    MODEL **********************/

	
	function chercherVille($id)
	{
		global $bdd;
		
		$req = $bdd -> prepare(" SELECT libelle FROM commune, salarie WHERE salarie.idcommune = commune.idcommune AND salarie.idcommune = :id");
		$req -> bindValue(":id",$id,PDO::PARAM_INT);
		
		$req -> execute();
		
		return  $req -> fetch();
	}
	
	function modifierMotDePasse($mdp,$id)
	{
		$mdp = sha1($mdp);
		global $bdd;
		
		$req = $bdd -> prepare(" UPDATE salarie SET mdp = :mdp WHERE idsalarie = :id ");
		
		$req -> bindValue(":mdp",$mdp,PDO::PARAM_STR);
		$req -> bindValue(":id",$id,PDO::PARAM_INT);
		
		$req -> execute();
		
		return true;
	}

function modifierEmail($email,$id)
	{
	global $bdd;
        
		 $req = $bdd->prepare(" UPDATE salarie SET email = :email WHERE idsalarie = :id ");
        
         $req -> bindValue(":email",$email,PDO::PARAM_STR);
                           
         $req -> bindValue(":id",$id,PDO::PARAM_INT);
                           
         $req->execute();
		
		
		return true;
	}
	function modifierNomf($nomf,$id)
	{
        
        
		global $bdd;
        
		 $req = $bdd->prepare(" UPDATE salarie SET nomf = :nomf WHERE idsalarie = :id ");
        
         $req -> bindValue(":nomf",$nomf,PDO::PARAM_STR);
                           
         $req -> bindValue(":id",$id,PDO::PARAM_INT);
                           
         $req->execute();
		
		
		return true;
	}
function modifierPrenom($prenom,$id)
	{
	       global $bdd;
        
		 $req = $bdd->prepare(" UPDATE salarie SET prenom = :prenom WHERE idsalarie = :id ");
        
         $req -> bindValue(":prenom",$prenom,PDO::PARAM_STR);
                           
         $req -> bindValue(":id",$id,PDO::PARAM_INT);
                           
         $req->execute();
		
		
		return true;
	}
	
	
	
	
	
?>