	<?php if($_SESSION["salarie"]["statut"] == "chef"){?>
	<div class="container">
		
			<?php 
				if (isset ( $erreur )) 
					{
						echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>".$erreur."</div>";
					} 
					else if (isset($infos))
					{
						echo "<div class='infos valign'><i class='material-icons left medium '>check</i>".$infos."</div>";
					}
					
		if(!empty($membres))
		{ echo"<div class='row'>";
			foreach ($membres as $salarie)
			{ ?>
			 
     
          <div class="col s12 m3 z-depth-5">
            <div class="card">
              <div class="card-image">
                <img style="width:100%; lenght:100%;" src="images/mesforma.jpg">
                <a href="<?php echo"membre&idsalarie=".$salarie['idsalarie'].""; ?>" class="btn-floating btn-large halfway-fab waves-effect waves-light red"><i class="material-icons">add</i></a>
              </div>
              <div class="card-content">
                <span class="card-title"><?php echo"".strtoupper($salarie['nomf'])." ".$salarie['prenom'] ?></span>
                <p><?php echo $salarie['email'] ?></p>
              </div>
            </div>
          </div>
            <?php }
				
			}
            else
				{
					echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>Aucun membre dans votre équipe</div>";
				} ?>
        

            </div>
                <div><a href="ajoutermembre"><button
				    class="waves-effect waves-light btn blue accent-1 right " >Ajouter un membre à mon équipe 
                    <i class="material-icons right">add</i>
			        </button></a></div>
	            </div>
	<?php }else{
        header("location:pageprincipale&infos=Vous n'avez pas accès a cette page !");
    }?>