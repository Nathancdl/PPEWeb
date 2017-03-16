	<div class="container formation_container">
	
		<div class="row">
			<div class="col s12 m12 l12">
				<div class="erreurDiv valign-wrapper">
					<?php
						gestionErreursGet();
					?>
				</div>
			</div>
		</div>
		<?php 
		$i = 0;
		$j = 0;
			if(!empty($formations))
			{
				foreach($formations as $formation)
				{
				$i++;
				$j--;
		?>
		
				<?php 
                    $prestataire = chercherNomPrestataire($formation["idprestataire"]);
                    echo "
     <a style='width:100%;' href='formations&idformation=".$formation['idformation']."'>
   <div class='col s12 m6'>
          <div class='card blue-grey darken-1'>
            <div class='card-content white-text'>
              <span class='card-title'>".$formation['date']." </span>
              <p>".$formation['nb_jour']." jour(s) </p>
               <p>".$formation['numero'].", ".$formation['rue']."</p>
               <p> ".$formation['contenu']." </p>
                <p> ".$prestataire["nom"]." </p>
                <p> ".$formation["prerequis"]." </p>
            </div>
            <div class='card-action'>
              
              <a href='formations&idformation=".$formation['idformation']."'>Voir plus</a>
            </div>
          </div>
          </div>
          </a>";?>
					
			<!-- Modal Trigger -->                              <!--   TRIGGER DE RESERVATION  -->
			<a class="waves-effect waves-light btn valign modal-trigger"
				href="#modal<?php echo $i; ?>">Réserver !</a>

			<!-- Modal Structure -->
			<div id="modal<?php echo $i; ?>" class="modal">
				<div class="modal-content">
					<h4>Reserver ma formation</h4>
					<p>Souhaitez-vous réelement réserver cette formation ?</p>
					<p>
						<i><?php echo $formation["contenu"]; ?></i>
					</p>
				</div>
				<div class="modal-footer">
					<a href="#"
						class=" modal-action modal-close waves-effect waves-green btn-flat">Annuler</a>
						<a href="index.php?page=nouvellesformations&idformation=<?php echo $formation['idformation']; ?>"
						class=" modal-action modal-close waves-effect waves-green btn-flat">Réserver</a>
				</div>
			</div>
			
			         <!--   TRIGGER D'EVALUATION  
			<a class="waves-effect waves-light btn valign modal-trigger"
				href="#modal<?php echo $j; ?>">Voir les notes !</a>

			<!-- Modal Structure 
			<div id="modal<?php echo $j; ?>" class="modal">
				<div class="modal-content">
					<h4>Voici les notes qui ont été données</h4>
					<p>
						test
					</p>
				</div>
				<div class="modal-footer">
					<a href="#"
						class=" modal-action modal-close waves-effect waves-green btn-flat">OK</a>
				</div>
			</div>-->
		
		<?php
				}
			}
			else
			{
			echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>Aucune nouvelle formation</div>";
			}
	?>
	</div>
