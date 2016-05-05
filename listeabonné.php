
<!doctype html>
<html>

	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="LANG" content="fr"/>
		<link rel="stylesheet" href="abonne.css" />
		<meta name="description" content=" Liste des abonnés"/>
		<title>Liste abonnés</title>
	</head>
	<body>
		<a href="connexion.html"> <header> <h1>TOUITTEUR</h1></header></a>
		<div id="titre_de_la_page">
				<h2>Abonnés de :</h2>
		</div>
		<nav>
				<fieldset>
					<legend>Navigation</legend>
					<ul>				    
						<li>
							 <a href="parametre.html"><p>Paramètres</p></a>
				 		</li>
				 		<li>
							<a href="listeabonné.html"><p> Liste des abonnés </p></a>
						</li>
						<li>
							<a href="chat.html"><p> Messages Privés</p></a>				
					</ul>
				</fieldset>
		</nav>
		<div id="thewall">
		<?php
		    require("ListeAbonné.php");
		?>
		</div>
		<footer>
			<p>@Touitteur Erwan & Gaëtan Tout droits réservés ©</p>
		</footer>
	</body>
</html>
