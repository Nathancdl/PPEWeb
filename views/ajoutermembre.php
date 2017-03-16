<?php if($_SESSION["salarie"]["statut"] == "chef"){?>
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
				  <input id="nom" type="text" class="validate" name="nom" value="<?php  value('nom');?>">
				  <label for="nom">Login</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">account_circle</i>
				  <input id="nomf" type="text" class="validate" name="nomf" value="<?php  value('nomf');?>">
				  <label for="nomf">Nom</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">account_circle</i>
				  <input id="prenom" type="text" class="validate" name="prenom" value="<?php  value('prenom');?>">
				  <label for="prenom">Prénom</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">shopping_cart</i>
				  <input id="capital" type="number" class="validate" name="capital" value="<?php  value('capital');?>">
				  <label for="capital">Capital de formation</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">room</i>
				  <input id="numero_rue" type="number" class="validate" name="numero_rue" value="<?php  value('numero_rue');?>">
				  <label for="numero_rue">Numéro rue</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">room</i>
				  <input id="rue" type="text" class="validate" name="rue"  value="<?php  value('rue');?>">
				  <label for="rue">Rue</label>
				</div>
				<div class="input-field col s12">
				  <i class="material-icons prefix">location_city</i>
				  <input id="ville" type="text" class="validate" name="ville" value="<?php  value('ville');?>">
				  <label for="ville">Ville</label>
				</div>
				 <div class="input-field col s12">
					  <i class="material-icons prefix">cloud_queue</i>
					  <input id="mail" type="email" class="validate" name="mail" value="<?php  value('mail');?>">
					  <label for="mail">Adresse Mail</label>
				</div>
			  </div>
			  <div class="switch">
				<p>
      <input name="choix" type="radio" id="test1" value="on" />
      <label for="test1">Chef</label>
   
      <input name="choix" type="radio" id="test2" value="off" />
      <label for="test2">Non chef</label>
    </p>
			  </div>
			  <button
				class="waves-effect waves-light btn blue accent-1 right"
				type="submit" name="submit_ajout_membre">
				Créer <i class="material-icons right">edit</i>
				</button>
			</form>
		  </div>
	</div>
	<?php }else{
        header("location:pageprincipale&infos=Vous n'avez pas accès a cette page !");
    }?>