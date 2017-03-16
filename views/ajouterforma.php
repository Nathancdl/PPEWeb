<?php if($_SESSION["salarie"]["statut"] == "presta"){?>
	<div class="container" id="ajout_membre">
		<?php
					if (isset ( $erreur )) 
					{
						echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>".$erreur."</div>";
					} 
					else if (isset($infos))
					{
						echo "<div class='infos valign'><i class='material-icons left medium '>check</i>".$infos."</div>";
					}
					?>
		  <div class="row">
			<form class="col s12 m6 offset-m3" method="post" action="#">
			  <div class="row">
				<div class="input-field col s12">
				  <i class="material-icons prefix">account_circle</i>
				  <input id="contenu" type="text" class="validate" name="contenu" value="<?php  value('contenu');?>">
				  <label for="contenu">Détail de la formation</label>
				</div>
				<div class="input-field col s12">
				 
				  <input  id="date" name="date" value="<?php  value('date');?>" type="date" class="datepicker">
				
				  
				</div>
				
				<div class="input-field col s12">
				  <i class="material-icons prefix">shopping_cart</i>
				  <input id="nb_jour" type="number" class="validate" name="nb_jour" value="<?php  value('nb_jour');?>">
				  <label for="nb_jour">Nombre de jour</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">account_circle</i>
				  <input id="prerequis" type="text" class="validate" name="prerequis" value="<?php  value('prerequis');?>">
				  <label for="contenu">Prerequis de la formation</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">room</i>
				  <input id="numero" type="number" class="validate" name="numero"  value="<?php  value('numero');?>">
				  <label for="numero">Numero</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">location_city</i>
				  <input id="rue" type="text" class="validate" name="rue" value="<?php  value('rue');?>">
				  <label for="rue">Rue</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">location_city</i>
				  <input id="ville" type="text" class="validate" name="ville" value="<?php  value('ville');?>">
				  <label for="ville">Ville</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">location_city</i>
				  <input id="idtypeFormation" type="text" class="validate" name="idtypeFormation" value="<?php  value('idtypeFormation');?>">
				  <label for="idtypeFormation">Type de la Formation</label>
				</div>
				
			  </div>
			 
			  <button
				class="waves-effect waves-light btn blue accent-1 right"
				type="submit" name="submit_ajout_forma">
				Créer <i class="material-icons right">edit</i>
				</button>
			</form>
		  </div>
	</div>
	<?php }else{
        header("location:pageprincipale&infos=Vous n'avez pas accès a cette page !");
    }?>