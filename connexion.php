<html>
	<head>
		<meta http-equiv="Content-Type" content="text/php; charset=utf-8"/>
		<meta name="LANG" content="fr"/>
		<meta name="DESCRIPTION" content=" Page de connection"/>
      <title> Page d'accueil</title>	
	</head>
	<body>
		<article>
			<?php
					function connexion($login)
					{
						$_SESSION['connecte']=true;
						$_SESSION['login']=$login;   
						$num=1;
						if(isset($_COOKIE["number"]))
						{
						  $num=$_COOKIE["number"]+1;
						}
						setcookie("number",$num,time()+3600);
					}

					function connexionBDD($login,$mdp)
					{
						if(!empty($login))// D'abord,je teste si le champs login est non vide. 
						{ 
							if(!empty($mdp))// Ensuite, je teste si le champs mdp est non vide.
							{			
										$bdd = new PDO('mysql:host=localhost;dbname=BDE11200183', 'E11200183', '2405067885Y');		
										// Je me connecte à la base de données .
										session_start();	
										return true;
							}
							else
							{
									header('Location: http://marseille/~11200183/Touitteur/connexion.html');  
									echo 'Rentrez un mot de passe';
							}
							// et maintenant, fermez-la !
							
						}
						else
						{
								header('Location: http://marseille/~11200183/php/connexion.html'); 
								echo 'Rentrez un identifiant';	
						}
					}

					function TestTouitos ($login, $mdp)
					{
						$Touitos = $bdd ->prepare("SELECT pseudonyme, motPasse from Touitos");
						$Touitos->execute();
						$Touitos->setFetchMode(PDO::FETCH_OBJ);
						while($user = $Touitos ->fetch() )
						{
							if (strcmp($user->pseudonyme, $login) && strcmp($user->motPasse,md5($mdp)))
							{
								return true;
							}
							else
							{
								return false;
							}
						}
					}

					if(connexionBDD($_POST["pseudo"],$_POST["mdp"]))
					{
							if(TestTouitos ($_POST["pseudo"],$_POST["mdp"]))
							{
								connexion($_POST['pseudo']);
							}
						$bdd = null;						
					}
			
			?>
		</article>
		
	</body>
</html>
