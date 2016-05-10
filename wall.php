-<!doctype html>
<html>

	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="LANG" content="fr"/>
		<link rel="stylesheet" href="wall.css" />
		<meta name="description" content=" Mur propre a chaque utilisateur"/>
		<title>Profil</title>
	</head>
	<body>
		<a href="connexion.html"> <header> <h1>TOUITTEUR</h1></header></a>
		<div id="titre_de_la_page">
				<h2>Profil de :</h2>
		</div>
		<nav>
				<fieldset>
					<legend>Navigation</legend>
					<ul>				    
						<li>
							 <a href="Page_info.html"><p>Page paramètres</p></a>
				 		</li>
				 		<li>
							<a href="listeabonné.php"><p> Liste des abonnés </p></a>
						</li>
						<li>
							<a href="chat.html"><p> Messages Privés</p></a>	</li>	
				<li>
							<a href="wall.php"><p> Mon profil </p></a>	</li>
	<li>
							<a href="préférences.html"><p> Préférences </p></a>				</li>
					</ul>
				</fieldset>
		</nav>
		<form method="POST" action="wallother.php">
		  <textarea id="PseudoAVisiter" name="PseudoAVisiter">Quel profil voulez vous consulter ?</textarea>
		  <button type ="submit" id="ButtonProfil"> Visiter </button>
		</form>
		<div id="sendpost">
			<form action ="posttouitte.php" method = "POST">
				<legend>Publier un Message</legend>
				<TEXTAREA name="Message" rows=4 cols=40></TEXTAREA> 
				<input id="Lebouton" type="submit" value = "Envoyer"/>
			</form>
		</div>
		<div id="Deco">
			<form action ="deconnexion.php" method = "GET">
				
				<input id="Lebouton" type="submit" value = "Se Deconnecter"/>
			</form>
		</div>
		<div id="thewall">

		  <?php
		     require("LesTouites.php");
		  ?>

		</div>
		<footer>
			<p>@Touitteur Erwan & Gaëtan Tout droits réservés ©</p>
		</footer>
	</body>
</html>
