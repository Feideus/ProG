<?php
	$name = $__COOKIE['name';
	$pseudo = $__POST['pseudo'];
	try
	{
    	$bdd=new PDO		('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');
	}

	catch (Exception $e)
	{
        	die('Error 1.2.3.4.Z connection a la base');
	}

	$req = $bdd->prepare('SELECT ID FROM Touitos WHERE pseudonyme = :pseudonyme');
	$req1 = $bdd->prepare('UPDATE Touitos SET  pseudonyme = ':pseudo' WHERE = Touitos.ID = :id');

	$req->execute(array('pseudonyme' => $name));
	$id = $req->fetch();
	$req1->excute(array('pseudo' => $pseudo,'id' => $id));
	require("Page_Info.html");
?>
