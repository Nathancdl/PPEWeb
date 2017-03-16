<?php
include_once 'cnx.php';
if(isset($_GET['motclef'])){
    $motclef = $_GET['motclef'];
    $q = array('motclef'=>$motclef.'%');
    $sql = "SELECT contenu,idformation,nb_jour,date,prerequis,numero,rue FROM formation WHERE contenu like :motclef OR date like :motclef OR rue like :motclef OR numero like :motclef  ";
    $req = $cnx->prepare($sql);
    $req->execute($q);
    $count = $req->rowCount($sql);
    if($count){
       
    if($count <= 4){
        while ($result = $req->fetch(PDO::FETCH_OBJ)){
            
            
    
    echo "
     <a style='width:100%;' href='formations&idformation=".$result->idformation."'>
   <div class='col s12 m6'>
          <div class='card blue-grey darken-1'>
            <div class='card-content white-text'>
              <span class='card-title'>".$result->contenu." </span>
              <p>".$result->nb_jour." jour(s) </p>
               <p>".$result->numero.", ".$result->rue."</p>
               <p> ".$result->date." </p>
            </div>
            <div class='card-action'>
              
              <a href='formations&idformation=".$result->idformation."'>Voir plus</a>
            </div>
          </div>
          </div>
          </a>";
        }
        
        
       }if($count >= 5)
            {
        $result = $req->fetch(PDO::FETCH_OBJ);
        
        {
            echo "<div class='well'><p>Précisez votre recherche, trop de résultats</p></div>";
            
        }
    
    }}else {
            echo "<div class='well'>Aucun resultat pour : <b>".$motclef."</b></div>";
        }
}
    

?>


