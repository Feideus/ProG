<?php
	try
	{
			// On se connecte à MySQL
				$bdd = new PDO('mysql:host=localhost;dbname=Touiteur;charset=utf8', 'erwan', 'lebossdesboss32');
  	}
			catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
       			 die('Erreur : '.$e->getMessage());
			}

			// Si tout va bien, on peut continuer

			// On récupère tout le contenu de la table jeux_video
			$reponse = $bdd->prepare('SELECT * FROM mp WHERE expediteur = $_SESSION['pseudo'] OR expediteur = $_POST['pseudo'] SORT BY date ');
            $reponse->execute();

			// On affiche chaque entrée une à une
			while ($donnees = $reponse->fetch())
			{
                echo".....". $donnees['expediteur']."..:..". $donnes['message']; 
			}

			$reponse->closeCursor(); // Termine le traitement de la requête
?>