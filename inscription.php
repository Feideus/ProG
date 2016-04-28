<?php
		 /**
		 *
		 */
 class inscription 
 {
		 	var $pseudo;
		 	var $passe;
		 	var $passe2;
		 	var $email;

			function testchamps()
            {
				if(!empty(this_$pseudo))
                {// D'abord,je teste si le champs login est non vide.  
					if(!empty(this_$passe)&&!empty(this_$passe2))
                    {// Ensuite, je teste si le champs mdp est non vide.
						if(this$passe === this$passe2)
                        {	
							if (filter_var(this$email, FILTER_VALIDATE_EMAIL)) 
                            {
									return true;
							}
						}	
					}
				}
				return false;
			}
         

function ajoutTouitos($id,$pseudo,$email,$mdp,$t,$status)
			{			
								$bdd = new PDO('mysql:host=localhost;dbname=TOUITTEUR', 'Feideus', 'lebossdesboss32');		
								// Je me connecte à la base de données .		
								// Je vais crypter le mot de passe.	
								$bdd->prepare("INSERT INTO Touitos VALUES(:id,:pseudonyme,:email,:mdp,:t,:status)");
                                $bdd->execute(array('id' => $id, 'pseudonyme' => $pseudo, 'email' => $email, 'mdp' => $mdp, 't' => $t , 'status' => $status);
								
			}

            function TestTouitos ($ARGlogin,$ARGemail)
			{
				var $login;
                var $email;

                $login = $ARGlogin;
                $email = $ARGemail;

				$bdd = new PDO('mysql:host=localhost;dbname=TOUITTEUR', 'Feideus', 'lebossdesboss32');		
				// Je me connecte à la base de données .
				$Touitos = $bdd ->prepare("SELECT pseudonyme, email from Touitos");

				$Touitos->execute();
				$Touitos->setFetchMode(PDO::FETCH_OBJ);

				while($user = $Touitos->fetch()){
					if (strcmp($user->pseudonyme, $ARGlogin))
					{
						if(strcmp($user->email,$ARGemail))
						{
							return 2;
						}
							else
							{
								return 3;
							}
						}
					}
					return 1;
		   }
                                
                $this_passe = htmlentities($_POST['mdp']);
				$this_passe2 = htmlentities($_POST['mdp2']);
				$this_pseudo = htmlentities($_POST['pseudo']);
				$this_email = htmlentities($_POST['email']);
				if(testchamps()){
					switch (TestTouitos($this_pseudo, $this_email)){
						case 1 :
							ajout($this_pseudo,$this_email,$this_passe);
							echo '<p>Compte crée!<br/> Voivi le lien vers la page d\'index<br/> <a href="connexion.html">Se connecter</a></p>';
							break;
						case 2 :
							require("inscription.php"); 
							exit();
							echo "pseudo deja utilisé"; 
							break;
						case 3 :
							require("inscription.php"); 
							exit();
							echo "email deja utilisé"; 
							break;
					}

                }
            }
 }
?>