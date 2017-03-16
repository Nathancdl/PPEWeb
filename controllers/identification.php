<?php 

	/*********************     CONTROLLER  *****************************/
	
	// Appel du fichier SQL correspondant
	require_once ("models/identification.php");
	
	
	// Gestion formulaire de connexion 
	if(isset($_POST["submit"]))
	{
		extract($_POST);
		
		if(!empty($nom) && !empty($password))
		{
			$donnees = identification($nom,$password);
			if(!empty($donnees))
			{
				$_SESSION["salarie"] = $donnees;
				
				if(estUnChef($_SESSION["salarie"][0]["idsalarie"]))
				{
					$_SESSION["salarie"]["statut"] = "chef";
					//header("location:pageprincipalechef");
				}
                elseif(estUnPresta($_SESSION["salarie"][0]["idsalarie"]))
				{
					$_SESSION["salarie"]["statut"] = "presta";
					//header("location:pageprincipalechef");
				}
                  elseif(estUnAdmin($_SESSION["salarie"][0]["idsalarie"]))
				{
					$_SESSION["salarie"]["statut"] = "admin";
					//header("location:pageprincipalechef");
				}
				else
				{
					$_SESSION["salarie"]["statut"] = "nonChef";
					//header("location:pageprincipale");
				}
				header("location:pageprincipale");
				
			}
			else{
				$erreur = "Nom ou mot de pass incorrect";
			}
		}
		else
		{
			$erreur = "Veuillez remplir tous les champs";
		}
	}
	
	
	if (isset($_POST["submit_mdp"]))
	{
		extract($_POST);
		
		if(isset($email) && !empty($email))
		{
			if (verifierEmail($email))
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
				
				if (modifierMdp($mdp,$email))
				{
					
                   

    
                        $subject = 'Mot de passe oublie [M2L]';

                        // message
                        $message = '<body><style>.black{backgroud-color:black;}</style>
                                    <div="black"> Bonjour,<br>
                                    Voici votre nouveau mot de passe : (copier/coller ce mot de passe) : <strong>'.$mdp.'</strong><br>
                                    Si vous rencontrez dautres problemes nous repondre directement sur cette adresse mail.<br>
                                    Nathan.C</div></body>';

    
                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    
    
                   
                    mail($email, $subject, $message, $headers);
                   
					header("location:index.php?infos=Un email avec votre nouveau mot de passe vous a été envoyé ! (pensez à vérifier vos spams)");
				}
				else
				{
					$erreur = "Une erreur est survenue";
				}
			}
			else
			{
				$erreur = "Adresse mail non reconnue";
			}
		}
		else
		{
			$erreur = "Veuillez renseigner votre adresse e-mail";
		}
	}
	
	if(isset($_GET["erreur"]))
	{
		$erreur = $_GET["erreur"];
	}
	
	if (isset($_GET["infos"]))
	{
		$infos = $_GET["infos"];
	}
	
	// Appel de la vue correspondante 
	require_once("views/identification.php");

?>