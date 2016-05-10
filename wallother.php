<!doctype html>
<html>

	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="LANG" content="fr"/>
		<link rel="stylesheet" href="wallother.css" />
		<script type="text/javascript" src = "jquery-1.12.3.js"></script>
		<script type="text/javascript" src = "cook/jquery.cookie.js"></script>
		<script type="text/javascript" src = "ScriptEssai.js"></script>
		<meta name="description" content=" Mur propre a chaque utilisateur"/>
		<script type="text/javascript">

		</script> 
		<title>Profil</title>
	</head>
	<body>
		<a href="connexion.html"> <header> <h1>TOUITTEUR</h1></header></a>
		<div id="titre_de_la_page">
				<?php 
				      echo"<p>Profil de :  <label id=";
 				      echo "Lelabel>"; 
				      echo"".$_POST['PseudoAVisiter']."</label></p>";
				?>
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
		<div id="abo">
			<form>
				<input id="Lebouton" type="button" value = "Suivre" onclick="De_Abonnement()"/>
			</form>
		</div>
		<div id="thewall">

		  <?php require("TouitesOther.php"); ?>

		</div>
		<footer>
			<p>@Touitteur Erwan & Gaëtan Tout droits réservés ©</p>
		</footer>
	</body>
</html>
