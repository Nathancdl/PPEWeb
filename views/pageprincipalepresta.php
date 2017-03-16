	<div class="container">
		<div class="row">
		<?php 
    echo"Bonjour, ".strtoupper($_SESSION['salarie'][0]['nomf'])."<br>";
    echo"Type de compte : prestataire";
    echo "<div class='search'>";
    echo "<input style='color:black;' type='text' name='recherche' placeholder='Rechercher une formation' class='form-control' id='recherche'/></div>";
    echo "<div class='resultat' id='resultat'></div>";
                    echo "<br>";?>
			<div class="col s12 m12 l4">
				<div class="card page_perso_chef">
					<div class="card-image">
						<img src="images/image_formations.jpg">
					</div>
					<div class="card-content">
						<h3>Nouveautées</h3>
						<p>Consultez l'ensemble des formations disponibles a ce jour.</p>
					</div>
					<div class="card-action">
						<a class="waves-effect waves-light btn"
							href="nouvellesformations">Cliquez-ici</a>
					</div>
				</div>
			</div>
			<div class="col s12 m12 l4">
				<div class="card page_perso_chef">
					<div class="card-image">
						<img src="images/image_mes_formations.jpg">
					</div>
					<div class="card-content">
						<h3>Mes Formations</h3>
						<p>Consultez Vos formations reservees.</p>
					</div>
					<div class="card-action">
						<a class="waves-effect waves-light btn" href="mesformations">Cliquez-ici</a>
					</div>
				</div>
			</div>
			<div class="col s12 m12 l4">
				<div class="card page_perso_chef">
					<div class="card-image">
						<img src="images/mesforma.jpg">
					</div>
					<div class="card-content">
						<h3>Mes Formations</h3>
						<p>Gérez vos formations</p>
					</div>
					<div class="card-action">
						<a class="waves-effect waves-light btn" href="mesformationsp">Cliquez-ici</a>
					</div>
				</div>
			</div>
		</div>
	</div>
 