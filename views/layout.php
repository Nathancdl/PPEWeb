<!-- VUE ----------------------------------->
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Maison des Ligues</title>
<link rel="stylesheet" href="materialize/css/materialize.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
	rel="stylesheet">
<link rel="stylesheet" href="css/formation.css">
 <link rel="shortcut icon" href="images/ico.ico">

</head>
<body>
   

	<header class="container">
	
		<nav>
			<ul id="dropdown1" class="dropdown-content">
				<li><a href="#!">Où suis-je ?</a></li>
			</ul>
			<div class="nav-wrapper">
				<a href="pageprincipale" class="brand-logo">Maison des Ligues</a> <a href="pageprincipale"
					data-activates="mobile-demo" class="button-collapse"><i
					class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li class="mes_credits"><i class="material-icons left">shopping_cart</i>
					Mes Crédits : <?php echo $_SESSION["salarie"][0]["capital_formation"];?> jours</li>
					<li><a href="monprofil"><i
							class="material-icons left">perm_identity</i>Mon profil</a></li>
					<li class="active"><a href="pageprincipale"><i
							class="material-icons left">home</i>Accueil</a></li>
							
					<li><a href="deconnexion"><i
							class="material-icons left">highlight_off</i>Deconnexion</a></li>
					<li><a  target="_blank" href="images/portail_utilisateur_formation.pdf"><i class="material-icons left">help_outline</i>Aides</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li class="active"><a href="pageprincipale"><i
							class="material-icons left">home</i>Accueil</a></li>
					<li><a href="monprofil"><i class="material-icons left">perm_identity</i>Mon
							profil</a></li>
					<li><a href="deconnexion"><i
							class="material-icons left">highlight_off</i>Deconnexion</a></li>
					<li><a  target="_blank" href="images/portail_utilisateur_formation.pdf"><i class="material-icons left">help</i>Aide</a></li>
				</ul>
				
		 
			</div>
		</nav>
	</header>
    <div style="margin-top:15px"><br>
		
     
         <?= $contenu?>
      
      
      </div>
       
       
       <div class="panel panel-chat" style="z-index:99999;">
            <div class="panel-heading">
                <a href="#" class="chatMinimize" onclick="return false"><span>Tchat</span></a>
                <a href="#" class="chatClose" onclick="return false"><i class="glyphicon glyphicon-remove"></i></a>
            <div class="clearFix"></div>
        </div>
        <div class="panel-body">
            <div class="messageMe">
               <?php 
     if($_SESSION["salarie"]["statut"] == "nonChef" ){
                $requetesalachef = $bdd -> query("SELECT * from salarie WHERE idsalarie =".$_SESSION["salarie"][0]["idsalarie"]);
                $resultchannel = $requetesalachef -> fetch();
         
                $requete = $bdd -> prepare("SELECT * from message WHERE channel = ".$resultchannel['salarie_chef']." ORDER BY date DESC LIMIT 15");}

        elseif($_SESSION["salarie"]["statut"] == "chef"){
                $requete = $bdd -> prepare("SELECT * from message WHERE channel = ".$_SESSION["salarie"][0]["idsalarie"]." ORDER BY date DESC LIMIT 15");}
     
    
        elseif($_SESSION["salarie"]["statut"] == "presta" ){
                $requete = $bdd -> prepare("SELECT * from message  WHERE channel = 1 ORDER BY date DESC LIMIT 15");}
       
        elseif($_SESSION["salarie"]["statut"] == "admin" ){
                $requete = $bdd -> prepare("SELECT * from message  WHERE channel = 1 ORDER BY date DESC LIMIT 15");}
     
        else{$requete = $bdd -> prepare("SELECT * from message  WHERE channel = 1 ORDER BY date DESC LIMIT 15");}

  
              
                $requete -> execute();
                $v = 0;
                $d = array();
                $k = 0;
               
               while( $result = $requete -> fetch())
               {
                   $k++;
                     $requetee = $bdd -> query("SELECT * from salarie where idsalarie = ".$result['idsalarie']);
                        $resultt = $requetee->fetch();
               
                        for($ii = count($k)-1;$ii >= 0;$ii--) 
                        {
                           
                         $d[$v] = array('monid' => $resultt['idsalarie'],'monnom' => $resultt['nom'], 'monmessage' => $result['message'], 'madate' => $result['date']);
                            
                           
                            $v++;
                        }
                    
               }
     
                echo "<div id='tchat'>";
        
                    for($i=count($d)-1;$i>=0;$i--) 
                    {
                        echo "<strong><a href='membre&idsalarie=".$d[$i]['monid']."'>".$d[$i]['monnom']."</a> </strong> (".date("d/m/Y à H:i:s",$d[$i]['madate']).") say : <br> " .htmlentities($d[$i]['monmessage'])."<br><br>";
                    }
                echo"</div>";?>
   
   
   
                
             </div>
            <div class="clearFix"></div>
         </div>
        <div class="panel-footer">
           <div id="tchatForm">
               <form method="post" action="#">
                <input style="background:white; width:100%;" type="submit" value="envoyer">
               <textarea style="background:white; width:100%; height:100%;" name="message"></textarea>
              
		    </div>
        </div>
    </div>
		<script src="js/jquery.js"></script>
		<script src="materialize/js/materialize.js"></script>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdczzsHX24nIf4I_6giOPezBCnZfHUJgM&sensor=false&language=fr"></script>
		<script src="js/search.js"></script>
        <script src="js/tchat.js"></script>
        <script src="js/searchsalarie.js"></script>
	    <script src="js/script.js"></script>
        <script type="text/javascript">
           
            <?php 
             $requetee = $bdd -> query("SELECT idmessage FROM message ORDER BY idmessage DESC LIMIT 1");
             $data = $requetee->fetch(PDO::FETCH_ASSOC);?>
                
                var lastid = <?php echo $data["idmessage"]; ?>
    
        </script>
    
   
 
   
       
    </body>
</html>
