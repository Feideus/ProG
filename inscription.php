<html>
	<head>
		<meta http-equiv="Content-Type" content="text/php; charset=utf-8"/>
		<meta name="LANG" content="fr"/>
		<meta name="DESCRIPTION" content=" Page d'inscription"/>
      <title> Page d'inscription</title>	
	</head>
	<body>
		<article>
			<?php
				function testchamps($pseudo,$passe,$passe2,$email){
						if(!empty($pseudo)){// D'abord,je teste si le champs login est non vide.  
							if(!empty($passe)&&!empty($passe2)){// Ensuite, je teste si le champs mdp est non vide.
								if($passe === $passe2){	
									if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
											return true;
									}
								}	
							}
						}
						return false;
				}
				function ajout($pseudo,$email,$passe){			
								$bdd = new PDO('mysql:host=localhost;dbname=BDE11200183', 'E11200183', '2405067885Y');		
								// Je me connecte à la base de données .		
								// Je vais crypter le mot de passe.
								$passecoder = md5($passe);	
								$bdd->query("INSERT INTO Touitos VALUES('','$pseudo','$email','$passecoder','','')");
								
				}
				function TestTouitos ($login, $email)
				{
						$bdd = new PDO('mysql:host=localhost;dbname=BDE11200183', 'E11200183', '2405067885Y');		
						// Je me connecte à la base de données .
						$Touitos = $bdd ->prepare("SELECT pseudonyme, email from Touitos");

						$Touitos->execute();

						$Touitos->setFetchMode(PDO::FETCH_OBJ);

						while($user = $Touitos->fetch()){
							if (strcmp($user->pseudonyme, $login)){
								if(strcmp($user->email,$email)){
									return 2;
								}
								else{
									return 3;
								}
							}
						}
						return 1;
				}
				$passe = htmlentities($_POST['mdp']);
				$passe2 = htmlentities($_POST['mdp2']);
				$pseudo = htmlentities($_POST['pseudo']);
				$email = htmlentities($_POST['email']);
				if(testchamps($pseudo,$passe,$passe2,$email)){
					switch (TestTouitos ($pseudo, $email)){
						case 1 :
							ajout($pseudo,$email,$passe);
							echo '<p>Compte crée!<br/> Voivi le lien vers la page d\'index<br/> <a href="connexion.html">Se connecter</a></p>';
							break;
						case 2 :
							header('Location: http://marseille/~11200183/Touitteur/inscription.html'); 
							exit();
							echo "pseudo deja utilisé"; 
							break;
						case 3 :
							header('Location: http://marseille/~11200183/Touitteur/inscription.html'); 
							exit();
							echo "email deja utilisé"; 
							break;
					}
				}
					
			?>
			
		
	</body>
</html>
