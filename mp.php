<!doctype html>
<html>

	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="LANG" content="fr"/>
		<link rel="stylesheet" href="mp.css" />
		<meta name="description" content=" Message privé avec une personne"/>
		<title>Mp</title>
	</head>
	<body>
		<a href="connexion.html"> <header> <h1>TOUITTEUR</h1></header></a>
		<div id="titre_de_la_page">
				<h2>Conversation avec :</h2>
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
		<div id="sendpost">
			<form method="post">
				<legend>Envoyer un message privé</legend>
				<TEXTAREA name="Message" rows=4 cols=40></TEXTAREA> 
				<input id="Lebouton" type="button" value = "Envoyer"/>
			</form>
		</div>
		<div id="thewall">
			<strong><legend class="histo">Historique conversation</legend></strong>
			<?php
			   require("messagePrive.php");
			?>




		</div>
		<footer>
			<p>@Touitteur Erwan & Gaëtan Tout droits réservés ©</p>
		</footer>
	</body>
</html>
