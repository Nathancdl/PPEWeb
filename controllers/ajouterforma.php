<?php 
/************************ CONTROLLER ***************/

 // Appel du fichier SQL correspondant
 require_once ("models/ajouterforma.php");
 
 if (isset($_POST["submit_ajout_forma"]))
 {
  extract($_POST);
     
     
           
       /* $ville = "villetktmgl";
        $idtypeFormation = "phptkzqddzqtmgl";
   
     echo "<br>";
    
     $idc = getIDtypeFormation($idtypeFormation);
     echo $idc['idtypeFormation']; */
    
     

     /*  $idvill = (int)$idvilles['idcommune'];
    $idforma = (int)$idformas['idtypeFormation'];
     $nb_jour = (int)$nb_jour;
     $numero = (int)$numero;*/
     
        
/* $ntm=creerVille("vielellelele");
     echo $ntm;
      var_dump(creerVille("vielegdtllelele"));echo "<br>";*/
   /*  
    echo "<br>"; echo $contenu; echo": detail forma<br>";
     echo $date; echo":date<br>";
     echo $nb_jour; echo":nbjour<br>";
     echo $prerequis; echo":prerequis<br>";
     echo $numero; echo": numero<br>";
     echo $rue; echo":rue<br>";
     echo $idvilles['idcommune']; echo": ville<br>";
     echo $idprestataire; echo": idpresta<br>";
     echo $idforma; echo":formation <br>";
     echo $idp; echo":formation <br>";
     echo $idp['idprestataire']; echo":formation <br>";
 
      var_dump($contenu);echo "<br>";
     var_dump($date);echo "<br>";

     var_dump($nb_jour);echo "<br>";

     var_dump($prerequis);echo "<br>";
     var_dump($rue);echo "<br>";
     var_dump($numero);echo "<br>";
     var_dump($idvilles['idcommune']);echo "<br>";

     var_dump($idprestataire);echo "<br>";
     var_dump($idformas['idtypeFormation']);echo "<br>";
*/

  if (!empty($contenu)  && !empty($date) && !empty($nb_jour) && !empty($prerequis) && !empty($numero) && !empty($ville) && !empty($idtypeFormation))
  {
   if(preg_match("#^[a-zA-Z\s-]+$#",$contenu) && preg_match("#^[a-zA-Z\s-]+$#",$prerequis))
   {
    if (preg_match("#^[0-9]+$#",$nb_jour))
    {
     if(preg_match("#^[0-9]+$#",$numero))
     {
      if(preg_match("#^[a-zA-Z\s-]+$#",$ville))
      {
          if(preg_match("#^[a-zA-Z\s-]+$#",$rue))
          {

                               $i = 0;
         if(checkVille($ville))
                  {
                    $idvilles = getIDville($ville);
                     foreach ($idvilles as $idville)
                             {

                                 $idville = $idville;
                             }
                  $cidtypeFormation= true;
                  $cville= true;
                   $i++;
                }
        elseif(creerVille($ville))
                {
                    $idvilles = getIDville($ville);
            foreach ($idvilles as $idville)
                     {

                         $idville = $idville;
                     }
                    $cville= true;
                    $i++;
                }
         else
            {
                $cville= false;
                $i=0;
            }
     
          if(checktypeFormation($idtypeFormation))
                  {
                 $idformas = getIDtypeFormation($idtypeFormation);
                  foreach ($idformas as $idforma)
                     {

                         $idforma = $idforma;
                     }
                  $cidtypeFormation= true;
                   $i++;
                }
            elseif(creertypeFormation($idtypeFormation))
                {
                   $idformas = getIDtypeFormation($idtypeFormation);
                      foreach ($idformas as $idforma)
                         {
                            
                             $idforma = $idforma;
                         }
                    $cidtypeFormation= true;
                    $i++;
                }
            else
                {
                    $cidtypeFormation= false;
                    $i=0;
                }
          
          $idp = getIDpresta();
                  if($i == 2)
                     {
                         if(AjoutForma($contenu,$date,$nb_jour,$prerequis,$numero,$rue,$idvilles['idcommune'],$idp['idsalarie'],$idformas['idtypeFormation']))
                         {
                          
                             
                              $infos = "Formation ".$contenu." à bien été crée !";
                         }else{  $erreur = "Erreur lors de la création !";}
                     }
                else
                {echo "Oups, il y a eu une erreur";}
         }
      else
      {
       $erreur = "ruesres";
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
     $erreur = "Le nombre de jours doit être exprimé en nombres uniquement positifs";
    }
   }
   else
   {
    $erreur = "Le contenu et les prerequis doivent etre au format texte";
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
 require_once("views/ajouterforma.php");


?>