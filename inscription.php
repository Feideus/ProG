<?php


 class inscription 
 {
		 	var $pseudo;
		 	var $passe;
		 	var $passe2;
		 	var $email;
 


			function testchamps()
            { 
                echo"COUCOU";
				if(!empty($this->pseudo))
                {// D'abord,je teste si le champs login est non vide.  
					if(!empty($this->passe) AND !empty($this->passe2))
                    {// Ensuite, je teste si le champs mdp est non vide.
						if($this->passe === $this->passe2)
                        {	
							if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) 
                            {
									return true;
							}
						}	
					}
                }
				return false;
            }

 
            
            function ajoutTouitos($id,$pseudo,$email,$motPasse)
		{
                echo"COUCOU3";
                $bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');		
                // Je me connecte à la base de données .		
                // Je vais crypter le mot de passe.	
                $req = $bdd->prepare('INSERT INTO Touitos VALUES(:id,:pseudonyme,:email,:motPasse,:photo,:statut)');
                $req->execute(array('id' => $id, 'pseudonyme' => $pseudo, 'email' => $email, 'motPasse' => $motPasse, 'photo' => 't' , 'statut' => 'temp'));
            }					
            
                 
function TestTouitos ($ARGlogin,$ARGemail)
			{
			   
                $login = $ARGlogin;
                $email = $ARGemail;

                $bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');
				// Je me connecte à la base de données .
				$Touitos = $bdd ->prepare("SELECT pseudonyme, email from Touitos");

				$Touitos->execute();
				$Touitos->setFetchMode(PDO::FETCH_OBJ);

				while($user = $Touitos->fetch())
               {
					if (strcmp($user->pseudonyme, $ARGlogin) === 0)
					{
						if(strcmp($user->email,$ARGemail) === 0)
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
}

                $bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');
				// Je me connecte à la base de données .
				$temp = $bdd ->prepare("SELECT MAX(id) FROM Touitos");

				$temp->execute();
                $temp = $temp->fetch();
                $NouveauID = intval($temp["MAX(id)"]);
                $NouveauID = $NouveauID + 1;

echo"".$NouveauID;

                $inscription = new inscription;
                $inscription->passe = htmlentities($_POST['mdp']);
				$inscription->passe2 = htmlentities($_POST['mdp2']);
				$inscription->pseudo = htmlentities($_POST['pseudonyme']);
				$inscription->email = htmlentities($_POST['email']);
				if($inscription->testchamps())
                    {
                        switch ($inscription->TestTouitos($inscription->pseudo, $inscription->email))
                       {
						case 1 :
                            echo '<p>Compte crée!<br/> Voivi le lien vers la page d\'index<br/> <a href="connexion.html">Se connecter</a></p>';
							$inscription->ajoutTouitos((int) $NouveauID, $inscription->pseudo,$inscription->email,$inscription->passe);
							break;
						case 2 :
                            echo "pseudo deja utilisé"; 
							require_once("inscription.php"); 
							exit();
							
							break;
						case 3 :
                            echo "email deja utilisé";
							require_once("inscription.php"); 
							exit();
							 
							break;
                       }

                       }


?>
