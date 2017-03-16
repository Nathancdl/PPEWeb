<?php
session_start();
	try
	{
		$bdd = new PDO("mysql:host=localhost;dbname=m2l;charset=utf8","root","");
	}
	catch (Exception $e)
	{
		die("erreur de connection");
	}
	

$d = array();
if(!isset($_SESSION["salarie"][0]["nom"]) || empty($_SESSION["salarie"][0]["nom"]) || !isset($_POST["action"])){
  
     $d["erreur"] ="Problème de connexion !";}else{
   extract($_POST);
     $pseudo = $_SESSION["salarie"][0]["idsalarie"];
    
    /**
    action addMessage
    ajout d'un message
    **/
    if($_POST["action"]=="addMessage"){
      
        $message = $message;
        
        if($_SESSION["salarie"]["statut"] == "chef"){
            $channel = $_SESSION["salarie"][0]["idsalarie"];
        }
        elseif($_SESSION["salarie"]["statut"] == "nonChef" ){
            $requetesalachef = $bdd -> query("SELECT * from salarie WHERE idsalarie =".$_SESSION["salarie"][0]["idsalarie"]);
            $resultchannel = $requetesalachef -> fetch();
            $channel = $resultchannel["salarie_chef"];
            
        }
         elseif($_SESSION["salarie"]["statut"] == "presta" ){
              $channel = "1";
         }
         elseif($_SESSION["salarie"]["statut"] == "admin" ){
              $channel = "1";
         }
        else{
            $channel = "1";
        }
        
             $requete = $bdd -> prepare("INSERT INTO message(message,date,idsalarie,channel) VALUES ('$message',".time().",'$pseudo','$channel')");
             $requete -> execute();
                
       
        $d["erreur"] ="ok";
    }
      /**
    action getMessages
    affichage des derniers message
    **/
       if($_POST["action"]=="getMessages"){
          
       $lastid = floor($lastid);
        $requetee = $bdd -> query("SELECT * FROM message WHERE idmessage>$lastid ORDER BY date ASC");
           
            
            $d["result"] = "";
            $d["lastid"] = $lastid;
          
           while($data = $requetee->fetch(PDO::FETCH_ASSOC)){
               
                   $requeta = $bdd -> query("SELECT * FROM salarie WHERE idsalarie = ".$data['idsalarie']);
                    $dato = $requeta->fetch();
                
                        $d["result"].= '<strong><a href="membre&idsalarie='.$dato["idsalarie"].'">'.$dato["nom"].'</a></strong> ('.date("d/m/Y à H:i:s",$data['date']).') say :<br> '.htmlentities($data["message"]).'<br><br>';
               
               $d["lastid"] = $data["idmessage"];
               
       
        
            }
         
           $d["erreur"]="ok";
    
    
    
        }   
    }

echo json_encode($d);

?>