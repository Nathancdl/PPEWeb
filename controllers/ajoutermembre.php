<?php 
/************************ CONTROLLER ***************/

 // Appel du fichier SQL correspondant
 require_once ("models/ajoutermembre.php");
 
 if (isset($_POST["submit_ajout_membre"]))
 {
  extract($_POST);
  
  if (!empty($nom)  && !empty($nomf) && !empty($prenom) && !empty($capital) && !empty($numero_rue) && !empty($rue) && !empty($ville) && !empty($mail) && !empty($choix))
  {
   if(preg_match("#^[a-zA-Z]+$#",$nom) && preg_match("#^[a-zA-Z]+$#",$nomf) && preg_match("#^[a-zA-Z]+$#",$prenom))
   {
    if (preg_match("#^[0-9]+$#",$capital))
    {
     if(preg_match("#^[0-9]+$#",$numero_rue))
     {
      if(preg_match("#^[a-zA-Z\s-]+$#",$rue) && preg_match("#^[a-zA-Z\s-]+$#",$ville))
      {
       if(preg_match("#[a-z0-9._-]+\.[a-z]{2,6}#",$mail))
        {
         $mdp = genererMdp();
                                    $mdpf = $mdp;
                                        $mdp = sha1($mdp);
         if(verificationMail($mail))
         {
           if($choix == "on")
            $chef = true;
           else
            $chef = false;
           
           if(AjoutMembre($nom,$nomf,$prenom,$mdp,$capital,$numero_rue,$rue,$ville,$mail,$_SESSION["salarie"][0]["idsalarie"],$chef))
           {
            
                        $infos = "Membre bien ajouté à votre équipe ! ";
                                                
                                                
                        $subject = 'Portail M2L formations';

                        // message
                        $message = '<body><style>.black{backgroud-color:black;}</style>
                                    <div="black"> Bonjour,<br>
                                   Votre chef dequipe vous a inscri au portail de gestion des formations de la M2L. Voici votre nouveau mot de passe : '.$mdpf.'       Il vous est possible de le modifier dans votre espace mon profil une fois connecte !</div></body>';

    
                        $headers  = 'MIME-Version: 1.0' . "\r\n";
                        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                    
                                                
                                        mail($mail, $subject, $message, $headers); }
                                        
                                        
             else{echo"Erreur Fatal";}
         }
         else
         {
          $erreur = "Cette adresse mail est déjà utilisée";
         }
        }
        else
        {
         $erreur = "Adresse mail invalide";
        }
      }
      else
      {
       $erreur = "Les noms des rues et villes ne doivent être composés que de lettres";
      }
     }
     else
     {
      $erreur = "Le numéro de la rue doit être un nombre";
     }
    }
    else
    {
     $erreur = "Le capital de jours pour un salarié doit être exprimé en nombres uniquement positifs";
    }
   }
   else
   {
    $erreur = "Les noms et prénoms ne doivent comporter que des lettres ";
   }
  }
  else
  {
   $erreur = "Tous les champs doivent être remplis";
  }
  
 }
 
 function value($name)
 {
  if(isset($_POST[$name]) && !empty($_POST[$name]))
  {
   echo $_POST[$name];
  }
 }
 
 // Appel de la vue correspondante 
 require_once("views/ajoutermembre.php");


?>