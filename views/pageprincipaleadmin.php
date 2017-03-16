	<?php if($_SESSION["salarie"]["statut"] == "admin"){?>
	<div class="container">
		<div class="row">
		 <?php
					if (isset($_GET['infos'] )) 
					{
						echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>".$_GET['infos']."</div><br><br>";
					} 
					else 
					{
						
					}
                    if(isset($_GET['del']))
	                   {
		                  $delete = $bdd->query("DELETE FROM salarie where idsalarie=".(int)$_GET['del']);
                            header("Location:pageprincipale");
	                   }
                     if(isset($_GET['delforma']))
	                   {
		                  $delete = $bdd->query("DELETE FROM formation where idformation=".(int)$_GET['delforma']);
                            header("Location:pageprincipale");
	                   }
					
                    echo"Bonjour, ".strtoupper($_SESSION['salarie'][0]['nomf'])."<br>";
                    echo"Type de compte : admin"; ?>
   
        <div class="col-md-10">

		  	<div class="row">
  				 <div><a href="ajouteruser"><button
				    class="waves-effect waves-light btn blue accent-1 right " >Ajouter un utilisateur
                    <i class="material-icons right">add</i>
			        </button></a></div>

  		

  			<div class="content-box-large">
  				<h1>Les Salariés</h1>
  				<div class="panel-body">
  					<div class="table-responsive">
  						<table class="table">
			              <thead>
			                <tr>
			                  <td>#</td>
			                 
			                 
			                  <TD>Login</TD>
			                  <td>Nom</td>
			                  <td>Prenom</td>
			                  <td>Capital formation</td>
			                  <td>Numero rue</td>
			                  <td>Rue</td>
			                  <td>Mail</td>
			                  <td>Supprimer</td>
			                  
			                </tr>
			              </thead>
			              <tbody>
                         <?php

    
    foreach($membres as $donn)
                {
                    ?>
                    <TR>
                    <TD align="center"> <?php echo $donn['idsalarie']; ?></TD>
                    <TD align="center"> <?php echo $donn['nom']; ?></TD>
                    <TD align="center"> <?php echo $donn['nomf']; ?></TD>
                    <TD align="center"> <?php echo $donn['prenom']; ?></TD>
                    <TD align="center"> <?php echo $donn['capital_formation']; ?></TD>
                    <TD align="center"> <?php echo $donn['numeroRue']; ?></TD>
                    <TD align="center"> <?php echo $donn['rue']; ?></TD>
                    <TD align="center"> <?php echo $donn['email']; ?></TD>
                     
                     <?php
                        echo "<TD align='center'><a href='pageprincipale&del=".$donn['idsalarie']."' "?>onclick='return confirm("êtes-vous sûr de vouloir supprimer cet utilisateur ?")' <?php echo"'><button class='btn btn-danger btn-sm'>X</button></a></TD>"; }?>

			                
			              </tbody>
			            </table>
  					</div>
  				</div>
  			</div>
       <div class="content-box-large">
  				<h1>Les Formations</h1>
  				<div class="panel-body">
  					<div class="table-responsive">
  						<table class="table">
			              <thead>
			                <tr>
			                  <td>#</td>
			                 
			                 
			                  <TD>Contenu</TD>
			                  <td>Date</td>
			                  <td>Nombre de jour</td>
			                  <td>Prerequis</td>
			                  <td>Numero rue</td>
			                  <td>Rue</td>
			                  <td>Commune</td>
			                  <td>Prestataire</td>
			                  <td>Type de la Formation</td>
			                  <td>Supprimer</td>
			                  
			                </tr>
			              </thead>
			              <tbody>
                         <?php

    
    foreach($formation as $donn)
                {
                    ?>
                    <TR>
                    <TD align="center"> <?php echo $donn['idformation']; ?></TD>
                    <TD align="center"> <?php echo $donn['contenu']; ?></TD>
                    <TD align="center"> <?php echo $donn['date']; ?></TD>
                    <TD align="center"> <?php echo $donn['nb_jour']; ?></TD>
                    <TD align="center"> <?php echo $donn['prerequis']; ?></TD>
                    <TD align="center"> <?php echo $donn['numero']; ?></TD>
                    <TD align="center"> <?php echo $donn['rue']; ?></TD>
                    <?php $requetecommune = $bdd -> query( "SELECT * FROM commune WHERE idcommune = ".$donn['idcommune']);
                           $commune = $requetecommune->fetch();         
                        ?>
                    <TD align="center"> <?php echo $commune['libelle']; ?></TD>
                     <?php $requetepresta = $bdd -> query( "SELECT * FROM prestataire WHERE idprestataire = ".$donn['idprestataire']);
                           $presta = $requetepresta->fetch();         
                        ?>
                    <TD align="center"> <?php echo $presta['nom']." "; echo $presta['prenom']; ?></TD>
                     <?php $requeteforma = $bdd -> query( "SELECT * FROM typeformation WHERE idtypeFormation = ".$donn['idtypeFormation']);
                           $typeformation = $requeteforma->fetch();         
                        ?>
                    <TD align="center"> <?php echo $typeformation['libelle']; ?></TD>
                     
                     <?php
                        echo "<TD align='center'><a href='pageprincipale&delforma=".$donn['idformation']."' "?>onclick='return confirm("êtes-vous sûr de vouloir supprimer cette formation ?")' <?php echo"'><button class='btn btn-danger btn-sm'>X</button></a></TD>"; }?>

			                
			              </tbody>
			            </table>
  					</div>
  				</div>
  			</div>
        </div>	
     </div>
            <h1>Les Stats</h1>
             <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content  green white-text">
                                        <p class="card-stats-title"><i class="mdi-social-group-add"></i>Salarie</p>
                                        <h4 class="card-stats-number"><?php  foreach($nombre as $count){echo $count['0'];} ?></h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> Dernier inscrit : <br><span class="green-text text-lighten-5"><?php foreach($lastmembre as $afficher){ echo $afficher["nomf"];} ?></span>
                                        </p>
                                    </div>
                                    <div class="card-action  green darken-2">
                                        <div id="clients-bar"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Formations</p>
                                        <h4 class="card-stats-number"><?php  foreach($nombreforma as $count){echo $count['0'];} ?></h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i><span class="purple-text text-lighten-5">Dernière formation : <br><?php foreach($lastformation as $afficher){ echo $afficher["contenu"];} ?></span>
                                        </p>
                                    </div>
                                    <div class="card-action purple darken-2">
                                        <div id="sales-compositebar"></div>

                                    </div>
                                </div>
                            </div>                            
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content blue-grey white-text">
                                        <p class="card-stats-title"><i class="mdi-action-trending-up"></i>Messages</p>
                                        <h4 class="card-stats-number"><?php foreach($nombremessage as $count) {echo $count['0'];} ?></h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i>Dernier message : <br><?php foreach($lastmessage as $afficher){ echo $afficher["message"]." le ".date("d/m/Y à H:i:s",$afficher["date"]);} ?> <span class="blue-grey-text text-lighten-5"></span>
                                        </p>
                                    </div>
                                    <div class="card-action blue-grey darken-2">
                                        <div id="profit-tristate"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m6 l3">
                                <div class="card">
                                    <div class="card-content deep-purple white-text">
                                        <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i> Réservation</p>
                                        <h4 class="card-stats-number"><?php foreach($nombreresa as $count) {echo $count['0'];} ?></h4>
                                        <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down"></i> 3% <span class="deep-purple-text text-lighten-5"><?php var_dump($lastresa); foreach($lastresa as $afficher){ echo $afficher["contenu"];} ?></span>
                                        </p>
                                    </div>
                                    <div class="card-action  deep-purple darken-2">
                                        <div id="invoice-line"></div>
                                    </div>
                                </div>
                            </div>  
                                                      
                        
  </div>
</div>
	
       
       
       
       
       <?php }else{
        header("location:pageprincipale&infos=Vous n'avez pas accès a cette page !");
    }?>
 