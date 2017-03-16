<?php 
/********************** MODEL **************/

	/* function AjoutForma($contenu,$date,$nb_jour,$prerequis,$numero,$ville,$idprestataire,$idtypeFormation)
	{
		global $bdd;
		$res = chercherIdVille($ville);
        $ress = chercherIdTypeForma($idtypeFormation);
		
		if (!empty($res))
		{
				$sql = " INSERT INTO formation VALUES ('',:contenu,:date,:nb_jour,:prerequis,:numero,:idcommune,:idprestataire,:idtypeFormation)";
				$req = $bdd -> prepare($sql);
				
				$req -> bindValue(":contenu",$contenu,PDO::PARAM_STR);
                $req -> bindValue(":date",$date,PDO::PARAM_STR);
				$req -> bindValue(":nb_jour",$nb_jour,PDO::PARAM_INT);
				$req -> bindValue(":prerequis",$prerequis,PDO::PARAM_STR);
				$req -> bindValue(":numero",$numero,PDO::PARAM_INT);
				$req -> bindValue(":commune",$res["idcommune"],PDO::PARAM_INT);
				$req -> bindValue(":idprestataire",$idprestataire,PDO::PARAM_INT);
				$req -> bindValue(":idtypeFormation",$ress["idtypeFormation"],PDO::PARAM_INT);
				$req -> execute();
				return true;
		}
		else
		{
			if(creerVille($ville))
			{
				AjoutForma($contenu,$date,$nb_jour,$prerequis,$numero,$ville,$idprestataire,$idtypeFormation);
			}
		}			
	} */


	function AjoutForma($contenu,$date,$nb_jour,$prerequis,$numero,$rue,$ville,$idprestataire,$idtypeFormation)
	{
		global $bdd;

        
  $sql = " INSERT INTO formation(contenu,date,nb_jour,prerequis,numero,rue,idcommune,idprestataire,idtypeFormation) VALUES (:contenu,:date,:nb_jour,:prerequis,:numero,:rue,:idcommune,:idprestataire,:idtypeFormation)";

				$req = $bdd -> prepare($sql);
				
				$req -> bindValue(":contenu",$contenu,PDO::PARAM_STR);
                $req -> bindValue(":date",$date,PDO::PARAM_STR);
				$req -> bindValue(":nb_jour",$nb_jour,PDO::PARAM_INT);
				$req -> bindValue(":prerequis",$prerequis,PDO::PARAM_STR);
                $req -> bindValue(":rue",$rue,PDO::PARAM_STR);
				$req -> bindValue(":numero",$numero,PDO::PARAM_INT);
				$req -> bindValue(":idcommune",$ville,PDO::PARAM_INT);
				$req -> bindValue(":idprestataire",$idprestataire,PDO::PARAM_INT);
				$req -> bindValue(":idtypeFormation",$idtypeFormation,PDO::PARAM_INT);
                $req -> execute();
        
                    $req -> fetch();
				if($req)
                    {return true;}
                else
                    {return false;}
		
	}

        function checktypeFormation($idtypeFormation)
            {
                global $bdd;

                $requete = $bdd -> prepare("SELECT libelle from typeformation where libelle = :idtypeFormation");
                $requete -> bindValue(":idtypeFormation",$idtypeFormation,PDO::PARAM_STR);
                $requete -> execute();
                if($requete -> fetch())
                    {return true;}
                else
                    {return false;}

            }


        function checkVille($ville)
            {
                global $bdd;

                $requete = $bdd -> prepare("SELECT libelle from commune where libelle = :ville");
                $requete -> bindValue(":ville",$ville,PDO::PARAM_STR);
                $requete -> execute();
            
                if($requete -> fetch())
                    {return true;}
                else
                    {return false;}

            }
	
        function creerVille($ville)
        {
            global $bdd;

            $requete = $bdd -> prepare("INSERT INTO `commune` (`idcommune`, `libelle`) VALUES (NULL, :ville)");
                                        
            $requete -> bindValue(":ville",$ville,PDO::PARAM_STR);

            $requete -> execute();

            $requete -> fetch();
            
            if($requete)
                    {return true;}
                else
                    {return false;}

        }

        function creertypeFormation($idtypeFormation)
        {
            global $bdd;

            $requete = $bdd -> prepare("INSERT INTO typeformation(idtypeFormation,libelle) VALUES (NULL,:idtypeFormation)");
            $requete -> bindValue(":idtypeFormation",$idtypeFormation,PDO::PARAM_STR);

            $requete -> execute();

            $requete -> fetch();
            
            if($requete)
                    {return true;}
                else
                    {return false;}

        }
	
	
	
	   function getIDville($ville)
       {
           global $bdd;

                $requete = $bdd -> prepare("SELECT idcommune from commune where libelle = :ville");
                $requete -> bindValue(":ville",$ville,PDO::PARAM_STR);
                $requete -> execute();
                $result = $requete -> fetch();
                    return $result;

       }

        function getIDtypeFormation($idtypeFormation)
       {
           global $bdd;

                $requete = $bdd -> prepare("SELECT idtypeFormation from typeformation where libelle = :idtypeFormation");
                $requete -> bindValue(":idtypeFormation",$idtypeFormation,PDO::PARAM_STR);
                $requete -> execute();
                $result = $requete -> fetch();
                    return $result;

       }

        function getIDpresta()
       {
           global $bdd;

                $requete = $bdd -> prepare("SELECT idsalarie from salarie where idsalarie = ".$_SESSION['salarie'][0]["idsalarie"]);
                $requete -> execute();
                $result = $requete -> fetch();
                    return $result;

       }
	
?>