<?php if($_SESSION["salarie"]["statut"] == "presta"){?>

 <div class="container">
	 <div class="row">
		
			<?php 

				if (isset ( $erreur )) 
					{
						echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>".$erreur."</div>";
					} 
					else if (isset($infos))
					{
						echo "<div class='infos valign'><i class='material-icons left medium '>check</i>".$infos."</div>";
					}
        if (!empty($membres))
		{
					foreach($membres as $membre){ ?>
                         <div class="col s12 m6 z-depth-5">
          <div class="card">
            <div class="card-image">
              <img style="width:100%;" src="images/mesforma.jpg">
              <span class="card-title">Card Title</span>
            </div>
            <div class="card-content">
             
             
        <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div class="collapsible-header"><i class="material-icons">view_agenda</i>Date</div>
      <div class="collapsible-body"><span><?php echo "".$membre["date"]."";?></span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">replay</i>Durée</div>
      <div class="collapsible-body"><span><?php echo $membre["nb_jour"]." jour(s)";?></span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">mode_edit</i>Contexte</div>
      <div class="collapsible-body"><span><?php echo $membre["contenu"] ?></span></div>
    </li>
      <li>
      <div class="collapsible-header"><i class="material-icons">settings</i>Prerequis</div>
      <div class="collapsible-body"><span><?php echo $membre["prerequis"] ?></span></div>
    </li>
    <li>
      <div class="collapsible-header"><i class="material-icons">play_for_work</i>Rue</div>
      <div class="collapsible-body"><span><?php echo $membre["numero"].", "; echo $membre["rue"] ?></span></div>
    </li>
  </ul>
            </div>
            <div class="card-action">
              <a href="<?php echo"formations&idformation=".$membre['idformation'] ?>">Voir plus</a>
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
	<div><a href="ajouterforma"><button
				class="waves-effect waves-light btn blue accent-1 right " >Ajouter une formation<i class="material-icons right">add</i>
			</button></a></div><br>
</div>
<?php }else{
        header("location:pageprincipale&infos=Vous n'avez pas accès a cette page !");
    }?>
