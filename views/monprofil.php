	<div class="container formation_container">
	<?php 
	if (isset ( $erreur )) 
					{
                        
						echo "<div class='erreur valign'><i class='material-icons left medium '>report_problem</i>".$erreur."</div>";
                        preg_match($erreur);

					} 
					else if (isset($infos))
					{
						echo "<div class='infos valign'><i class='material-icons left medium '>check</i>".$infos."</div>";
					}
		?>
		 <table class="striped">
			<tbody>
			  <tr>
				<td>Login</td>
				<td><?php echo ($_SESSION["salarie"][0]["nom"]); ?></td>
			  </tr>
			  <tr>
				<td>Nom</td>
				<td><?php echo ($_SESSION["salarie"][0]["nomf"]); ?></td>
			  </tr>
			  <tr>
				<td>Prénom</td>
				<td><?php echo ($_SESSION["salarie"][0]["prenom"]); ?></td>
			  </tr>
			  <tr>
				<td>Mail</td>
				<td><?php echo ($_SESSION["salarie"][0]["email"]); ?></td>
			  </tr>
			   <tr>
				<td>Adresse</td>
				<td><?php echo ($_SESSION["salarie"][0]["numeroRue"]." ".$_SESSION["salarie"][0]["rue"]." , ".$ville["libelle"]); ?></td>
			  </tr>
			   <tr>
				<td>Mot de passe</td>
				<td>******</td>
				
			  </tr>
			</tbody>
      </table>
      <div class="row">
		<div class="col s12 m4 offset-m4">
         <button
				class="waves-effect waves-light btn blue accent-1 right modal-trigger" href="#modal2">Modifier mon profil <i class="material-icons right">edit</i>
			</button>
          </div>
          </div>
	  <div class="row">
		<div class="col s12 m4 offset-m4">
			  <button
				class="waves-effect waves-light btn blue accent-1 right modal-trigger" href="#modal1">Modifier mon mot de passe <i class="material-icons right">edit</i>
			</button>
			
			<!-- Modal Structure -->
			<div id="modal1" class="modal">
				<div class="modal-content">
					<h4>Modifier mon mot de passe</h4>
					<form method="post" action="#">
						<div class="row">
							<div class="input-field col s12 m12 l12">
								  <input id="mdp1" type="password" class="validate" name="mdp1">
								  <label for="password">Saisissez nouveau mot de passe</label>
							</div>
							<div class="input-field col s12 m12 l12">
								  <input id="mdp2" type="password" class="validate" name="mdp2">
								  <label for="password">Saisissez le à nouveau</label>
							</div>
						</div>
						<button
						class="waves-effect waves-light btn blue accent-1 right"
						type="submit" name="submit_mdp">
						Valider <i class="material-icons right">send</i>
					</button>
					</form>
					<div class="modal-footer">
									
					</div>
				</div>
		</div>
		<div id="modal2" class="modal">
				<div class="modal-content">
					<h4>Modifier mon mot de passe</h4>
					<form method="post" action="#">
						<div class="row">
						<div style="display:none;" class="input-field col s12 m12 l12">
								  <input value="<?php echo $_SESSION["salarie"][0]["nom"]; ?>" id="nom" type="text" class="validate" name="nom">
								  <label for="nom">Votre nom</label>
							</div>
							<div class="input-field col s12 m12 l12">
								  <input id="nomf" type="text" class="validate" name="nomf">
								  <label for="nomf">Votre nom</label>
							</div>
							<div class="input-field col s12 m12 l12">
								  <input id="prenom" type="text" class="validate" name="prenom">
								  <label for="prenom">Votre prenom</label>
							</div>
							<div class="input-field col s12 m12 l12">
								  <input id="email" type="text" class="validate" name="email">
								  <label for="email">Votre email</label>
							</div>
						</div>
				    <input class="btn btn-success btn-block btn-lg" type='submit' name='modifuser' id='modifuser'/>
					</form>
					<div class="modal-footer">
									
					</div>
				</div>
		</div>
	</div>
	</div>
</div>
