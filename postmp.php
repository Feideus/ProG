<?php
	class TouitesPrives
	{
		var $idauteur;
		var $IDReceveur;
		var $message;
		var $dates;
		var $id; //du message


    	function attribid($tour)
		{
            if($tour === 1)
            {    
                $bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');
                $req = $bdd->prepare('SELECT MAX(IDMsg) FROM Touites');
                $req->execute();
                $Donnee = $req->fetch();
                $tmp = intval($Donnee["MAX(IDMsg)"]);
                $this->id = $tmp + 1;
            }
            else
            {
                $bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');
                $req = $bdd->prepare('SELECT MAX(IDMsg) FROM Touites');
                $req->execute();
                $Donnee = $req->fetch();
                $tmp = intval($Donnee["MAX(IDMsg)"]);
                $this->id = $tmp;
            }
		}

        
		function dates()
		{
			$this->dates = new DateTime();
		}

		function autor()
		{
			$autor = $_COOKIE['name'];
			$receveur = $_COOKIE['namereceveur'];
			try
			{
			// On se connecte à MySQL
				$bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');			
			}
			catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
       			 die('Erreur : '.$e->getMessage());
			}
		    $req = $bdd->prepare('SELECT ID FROM Touitos WHERE pseudonyme = :autor');
            $req1 = $bdd->prepare('SELECT ID FROM Touitos WHERE pseudonyme = :receveur');
            $req->execute(array('autor' => $autor));
            $req1->execute(array('receveur' => $receveur));
            $Donnee = $req->fetch();
            $Donnee1 = $req1->fetch();
            $this->idauteur = $Donnee["ID"];
            $this->IDReceveur = $Donnee1["ID"];
            

		}

		function Touites_ajout($message,$id ,$date)
		{
            
			try
			{
			// On se connecte à MySQL
				$bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');			
			}
			catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
       			 die('Erreur : '.$e->getMessage());
			}
			$req = $bdd->prepare('INSERT INTO Touites VALUES(:id,:dates,:message)');
			$req->execute(array('id' => $id, 'dates' => $date , 'message' => $message));
            
		}

		function Touites_Prives_ajout($id,$idauteur, $IDReceveur)
		{
			try
			{
			// On se connecte à MySQL
				$bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');			
			}
			catch(Exception $e)
			{
				// En cas d'erreur, on affiche un message et on arrête tout
       			 die('Erreur : '.$e->getMessage());
			}	
			$req = $bdd->prepare('INSERT INTO TouitesPrives VALUES(:IDMsg,:IDAuteur, :IDReceveur,1)');
			$req->execute(array('IDMsg' => $id, 'IDAuteur' => $idauteur , 'IDReceveur' => $IDReceveur));
		}
    }
$TouitePrive = new TouitesPrives;
		$TouitePrive->attribid(1);
//$TouitePrive->dates();
$TouitePrive->dates = 20170503;
$TouitePrive->autor();
var_dump($_POST['LeMessage']);
$TouitePrive->message = $_POST['LeMessage']; 
		$TouitePrive->Touites_ajout($TouitePrive->message,$TouitePrive->id,$TouitePrive->dates);
$TouitePrive->attribid(2);
$TouitePrive->Touites_Prives_ajout($TouitePrive->id,$TouitePrive->idauteur,$TouitePrive->IDReceveur);
?>

