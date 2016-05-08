<?php
	class Touites
	{
		var $idpseudo;
		var $message;
		var $dates;
		var $id;

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

		function messageandauthor()
		{

            $bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');
			$this->message = $_POST["Message"];
			//$autor = $_COOKIE['pseudo'];
 	
            $req = $bdd->prepare('SELECT ID FROM Touitos WHERE pseudonyme = :autor');
            $req->execute(array('autor' => "Feideus"));
            $Donnee = $req->fetch();
            $this->idpseudo = $Donnee["ID"];

		}

		function Touites_ajout($message,$id ,$date)
		{
			$bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');	
			$req = $bdd->prepare('INSERT INTO Touites VALUES(:id,:dates,:message)');
			$req->execute(array('id' => $id, 'dates' => $date , 'message' => $message));
		}

		function Touites_Public_ajout($id,$idpseudo)
		{
			$bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');	
			$req = $bdd->prepare('INSERT INTO TouitesPublics VALUES(:IDMsg,:IDAuteur)');
			$req->execute(array('IDMsg' => $id, 'IDAuteur' => $idpseudo));
		}
 }    

        $Touite = new Touites;
		$Touite->attribid(1);
//$Touite->dates();
        $Touite->dates = 20160503;
		$Touite->messageandauthor();     

        $Touite->Touites_ajout($Touite->message, $Touite->id, $Touite->dates);
        $Touite->attribid(2);
		$Touite->Touites_Public_ajout($Touite->id,$Touite->idpseudo);
require("wall.html");

	
?>



