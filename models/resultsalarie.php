<?php
include_once 'cnx.php';
if(isset($_GET['motclef'])){
    $motclef = $_GET['motclef'];
    $q = array('motclef'=>$motclef.'%');
    $sql = "SELECT nom,nomf,prenom,idsalarie,capital_formation,numeroRue,rue,email FROM salarie WHERE nom like :motclef OR nomf like :motclef OR prenom like :motclef ";
    $req = $cnx->prepare($sql);
    $req->execute($q);
    $count = $req->rowCount($sql);
    if($count){
       
    if($count <= 4){
        while ($resultt = $req->fetch(PDO::FETCH_OBJ)){
   
    echo "
    <div class='container'>
      <a  href='membre&idsalarie=".$resultt->idsalarie."'>
   <div class='col s12 m6'>
          <div class='card blue-grey darken-1'>
            <div class='card-content white-text'>
              <span class='card-title'>".$resultt->nomf."</span>
              <p>".$resultt->prenom."</p>
               <p>".$resultt->capital_formation." jour(s) </p>
               <p>".$resultt->numeroRue.", ".$resultt->rue." </p>
               <p>".$resultt->email." </p>
            </div>
            <div class='card-action'>
              
              <a  href='membre&idsalarie=".$resultt->idsalarie."'>Voir plus</a>
            </div>
          </div>
          </div>
          </a></div>";
    
    
  
        }
        
        
       }if($count >= 5){
        $resultt = $req->fetch(PDO::FETCH_OBJ);{
            echo "<div class='well'><p>Précisez votre recherche, trop de résultats</p></div>";
            
        }
    
    }}else {
            echo "<div class='well'>Aucun resultat pour : <b>".$motclef."</b></div>";
        }
}
    

?>


