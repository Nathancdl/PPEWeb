	<div class="container">
	 <div class="row">
		<?php 
		$i = 0;
		if (!empty($formations))
		{
			foreach ($formations as $formation)
			{
				$etat = chercherEtatFormation($formation["idformation"],$_SESSION["salarie"][0]["idsalarie"]);
				$i++;
			
				?>
					
				 <div class="col s12 m6 z-depth-5">
          <div class="card">
            <div class="card-image">
             <?php  if ($etat["etat"] == "validee"){ 
				echo " <img  src='images/valid.png'>";}
                    else if($etat["etat"] == "en cours de validation")
                    {echo " <img  src='images/pending.gif'>";}
                    else{echo "<img src='images/error.png'>";}?>
             
              <span class="card-title"><?php echo $formation["contenu"] ?></span>
            </div>
            <div class="card-content">
             
             Date : <label for="icon_prefix"><?php echo "".$formation["date"]."";?></label><br>
             Durée :  <label for="icon_email"><?php echo $formation["nb_jour"];?></label><br>
              Contexte :  <label for="icon_prefix2"><?php echo $formation["contenu"] ?></label><br>
               Prerequis : <label for="icon_prefix2"><?php echo "".$formation["prerequis"].", "; ?></label><br>
                Rue : <label for="icon_prefix2"><?php echo $formation["rue"]; ?></label><br>
               Status :  <label for="icon_prefix2">  <?php  if ($etat["etat"] == "validee"){ 
				echo " Validée";}
                    else if($etat["etat"] == "en cours de validation")
                    {echo "En Attente";}
                    else{echo "Refusée";}?> </label>
            </div>
            <div class="card-action">
              <a href="formations&idformation=<?php echo $formation["idformation"]; ?> ">Voir plus</a>
            </div>
          </div>
        </div>
       
                 
				

				<?php 
			}
		}
		else 
		{
			echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>Vous n'avez aucune formation dans votre historique</div>";
		}
		?>
   
       
        
      </div>
	</div>

