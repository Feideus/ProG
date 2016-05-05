<!doctype html> 
<html> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="LANG" content="fr"/>
		<link rel="stylesheet" href="connexion.css" />
		<meta name="description" content=" Page permettant à l'utilisateur de se connecter"/>
      		<title> Page de connexion</title>	
	</head>
	<body>
		<header id = "principal">
			<h1>Page de connexion à Touitteur</h1>
		</header>
		<nav>
				<p>Si vous ne possedez pas de compte , Inscrivez vous !<br/>
            			<a href="inscription.html">Je veux rejoindre votre communauté de nains chanteurs</a> </p>
		</nav>
		<article>
			<header>
				<h2>Connexion a votre compte </h2>
			</header>
			<form action="connexionClient.php" method="post">
				<fieldset>
					<legend>Identifiants</legend>
					<ol>				    
						<li>
				   			 <label for="pseudonyme">Pseudo</label>
				   			 <input id="pseudonyme" name="pseudonyme" type="text" required/>
				 		</li>
				 		<li>
							<label for="mdp">Mot de passe</label>
							<input id="mdp" name="mdp" type="password" required/>
						</li>				
					</ol>
				</fieldset>
				<fieldset> 
						<input type="submit" name="Valider" value="Connexion"/>
				</fieldset>
			</form>
		</article>
		<?php
			require("connexionClient.php");
		?>
		<footer>
			<p>@Touitteur Erwan & Gaëtan Tout droits réservés ©</p>
		</footer>
	</body>
</html>
