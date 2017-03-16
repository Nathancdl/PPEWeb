<?php 

	/*********************     CONTROLLER  *****************************/
	
	// Appel du fichier SQL correspondant
	require_once ("models/monprofil.php");
	
	$ville = chercherVille($_SESSION["salarie"][0]["idcommune"]);
	
	if (isset($_POST["submit_mdp"]))
	{
		extract($_POST);
		if(!empty($mdp1) && !empty($mdp2))
		{
			if ($mdp1 == $mdp2)
			{
				if (preg_match("#[a-bA-B0-9]#",$mdp1))
					{
						if(strlen($mdp1) >= 6)
						{
							if(modifierMotDePasse($mdp1,$_SESSION["salarie"][0]["idsalarie"]))
							{
								$infos = "Merci, la modification a bien été prise en compte";
							}
							else
							{
								$erreur = "Une erreur est survenue";
							}
						}
						else
						{
							$erreur = "Votre mot de passe doit comporter 6 caractères au minimum";
						}
						
					}
					else
					{
						$erreur = "Le nouveau mot de passe ne doit comporter que des lettres ou des chiffres";
					}
			}
			else
			{
				$erreur = "Les mots de passe renseignés ne sont pas identiques";
			}
		}
		else
		{
			$erreur = "Veuillez renseigner les deux champs";
		}
	}



    


             if(isset($_POST['modifuser']))
                {
               
                 
                 	extract($_POST);

                        //traitement
                        if(!empty($_POST['nomf']))
                        {
                            if (preg_match("#[a-zA-Z]#",$nomf))
                                {
                                    
                                if(modifierNomf($nomf,$_SESSION["salarie"][0]["idsalarie"]))
							{
								$infos = "Merci, la modification a bien été prise en compte";
							}
							else
							{
								$erreur = "Une erreur est survenue";
							}
                           
                                }
						      else
						          {
							$erreur = "Votre nom ne doit contenir que des lettres !";
                                  }
                      
                        }
                 
                  if(!empty($_POST['prenom']))
                        {
                             if (preg_match("#[a-zA-Z]#",$prenom))
                                {
                                    
                                if(modifierPrenom($prenom,$_SESSION["salarie"][0]["idsalarie"]))
							{
								$infos = "Merci, la modification a bien été prise en compte";
							}
							else
							{
								$erreur = "Une erreur est survenue";
							}
                           
                                }
						      else
						          {
							$erreur = "Votre prenom ne doit contenir que des lettres !";
                                  }
                        
                        }

                       


                        if(!empty($_POST['email']))
                        {
                            
                          if(preg_match("#[a-z0-9._-]+\.[a-z]{2,6}#",$email))
                                {
                                    
                                if(modifierEmail($email,$_SESSION["salarie"][0]["idsalarie"]))
							{
								$infos = "Merci, la modification a bien été prise en compte";
							}
							else
							{
								$erreur = "Une erreur est survenue";
							}
                           
                                }
						      else
						          {
							$erreur = "Caractère(s) incorrect(s) !";
                                  }
               
                        }
                
                           
                 }

                       



                                  
	// Appel de la vue correspondante 
	require_once("views/monprofil.php");

?>