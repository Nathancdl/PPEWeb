<?php 
/********************** MODEL **************/

	function AjoutChef($nom,$nomf,$prenom,$mdp,$capital,$numero_rue,$rue,$ville,$mail,$id_chef,$chef,$presta)
	{
		global $bdd;
		$res = chercherIdVille($ville);
		
		if (!empty($res))
		{
				$sql = " INSERT INTO salarie VALUES ('',:nom,:nomf,:prenom,:mdp,:capital,:numero_rue,:rue,:salarie_chef,:commune,:mail,:chef,:presta,'0')";
				$req = $bdd -> prepare($sql);
				
				$req -> bindValue(":nom",strtolower($nom),PDO::PARAM_STR);
                $req -> bindValue(":nomf",$nomf,PDO::PARAM_STR);
				$req -> bindValue(":prenom",$prenom,PDO::PARAM_STR);
				$req -> bindValue(":mdp",$mdp,PDO::PARAM_STR);
				$req -> bindValue(":capital",$capital,PDO::PARAM_INT);
				$req -> bindValue(":numero_rue",$numero_rue,PDO::PARAM_INT);
				$req -> bindValue(":rue",$rue,PDO::PARAM_STR);
				$req -> bindValue(":salarie_chef",$id_chef,PDO::PARAM_INT);
				$req -> bindValue(":commune",$res["idcommune"],PDO::PARAM_INT);
				$req -> bindValue(":mail",$mail,PDO::PARAM_STR);
				$req -> bindValue(":chef",$chef,PDO::PARAM_STR);
                $req -> bindValue(":presta",$presta,PDO::PARAM_STR);
				
				$req -> execute();
				return true;
		}
		else
		{
			if(creerVille($ville))
			{
				AjoutChef($nom,$nomf,$prenom,$mdp,$capital,$numero_rue,$rue,$ville,$mail,$id_chef,$chef,$presta);
                return true;
			}
		}
		
		
		
		
	}
	
	
function AjoutPresta($nom,$nomf,$prenom,$mdp,$capital,$numero_rue,$rue,$ville,$mail,$id_chef,$chef,$presta)
	{
		global $bdd;
		$res = chercherIdVille($ville);
		
		if (!empty($res))
		{
				$sql = " INSERT INTO salarie VALUES ('',:nom,:nomf,:prenom,:mdp,:capital,:numero_rue,:rue,:salarie_chef,:commune,:mail,:chef,:presta,'0')";
				$req = $bdd -> prepare($sql);
				
				$req -> bindValue(":nom",strtolower($nom),PDO::PARAM_STR);
                $req -> bindValue(":nomf",$nomf,PDO::PARAM_STR);
				$req -> bindValue(":prenom",$prenom,PDO::PARAM_STR);
				$req -> bindValue(":mdp",$mdp,PDO::PARAM_STR);
				$req -> bindValue(":capital",$capital,PDO::PARAM_INT);
				$req -> bindValue(":numero_rue",$numero_rue,PDO::PARAM_INT);
				$req -> bindValue(":rue",$rue,PDO::PARAM_STR);
				$req -> bindValue(":salarie_chef",$id_chef,PDO::PARAM_INT);
				$req -> bindValue(":commune",$res["idcommune"],PDO::PARAM_INT);
				$req -> bindValue(":mail",$mail,PDO::PARAM_STR);
                $req -> bindValue(":chef",$chef,PDO::PARAM_STR);
				$req -> bindValue(":presta",$presta,PDO::PARAM_STR);
				
				$req -> execute();
				return true;
		}
		else
		{
			if(creerVille($ville))
			{
				AjoutPresta($nom,$nomf,$prenom,$mdp,$capital,$numero_rue,$rue,$ville,$mail,$id_chef,$chef,$presta);
                return true;
			}
		}
		
		
		
		
	}
	
	function creerVille($ville)
	{
		global $bdd;
		
		$requete = $bdd -> prepare("INSERT INTO commune VALUES ('',:ville)");
		$requete -> bindValue(":ville",$ville,PDO::PARAM_STR);
		
		$requete -> execute();
		
		return true;
		
	}
	function genererMdp()
	{
				$mdp = "";
				$choix = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_.;/^*";
				$mdp .= $choix[rand(0,25)];
				$mdp .= $choix[rand(0,25)];
				$mdp .= $choix[rand(26,51)];
				$mdp .= $choix[rand(26,51)];
				$mdp .= $choix[rand(52,61)];
				$mdp .= $choix[rand(52,61)];
				$mdp .= $choix[rand(61,67)];
				$mdp .= $choix[rand(61,67)];
				$mdp = str_shuffle($mdp);
				
				return $mdp;
	}
	
	
	function chercherIdVille($ville)
	{
		global $bdd;
		
		$requete = $bdd -> prepare("SELECT idcommune FROM commune WHERE libelle = :ville");
		
		$requete -> bindValue(":ville",$ville,PDO::PARAM_STR);
		
		$requete -> execute();
		
		return $requete -> fetch();
	}
	
	
	function verificationMail($mail)
	{
		global $bdd;
		
		$requete = $bdd -> prepare(" SELECT * FROM salarie WHERE email = :email");
		
		$requete -> bindValue(":email",$mail,PDO::PARAM_STR);
		
		$requete -> execute();
		
		$res = $requete -> fetchAll();
		
		if(!empty($res))
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

?>