
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Maison des Ligues</title>
<link rel="stylesheet" href="materialize/css/materialize.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
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
				<a href="identification" class="brand-logo">Maison des Ligues</a> <a href="identification"
					data-activates="mobile-demo" class="button-collapse"><i
					class="material-icons">menu</i></a>
				<ul id="nav-mobile" class="right hide-on-med-and-down">
					<li class="active"><a href="identification"><i
							class="material-icons left">perm_identity</i>Connexion</a></li>
					<li><a target="_blank" href="images/portail_utilisateur_formation.pdf"><i class="material-icons left">help_outline</i>Aides</a></li>
				</ul>
				<ul class="side-nav" id="mobile-demo">
					<li><a href="index.php"><i class="material-icons left">perm_identity</i>Connexion</a></a></li>
					<li><a  target="_blank" href="images/portail_utilisateur_formation.pdf"><i class="material-icons left">help</i>Aide</a></li>
				</ul>
			</div>
		</nav>
	</header>
	<?= $contenu?>

	<script src="js/jquery.js"></script>
	<script src="materialize/js/materialize.js"></script>
	<script src="js/script.js"></script>
</body>
</html>