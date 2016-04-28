<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=TOUITTEUR;charset=utf8', 'Feideus', 'lebossdesboss32');
}

catch (Exception $e)
{
        die('Error 1.2.3.4.Z connection a la base');
}

$req = $bdd->prepare('SELECT id FROM Touitos WHERE pseudonyme = :id AND motPasse = :mdp');


$req->execute(array(
    'id' => $_POST['pseudonyme'],
    'mdp' => $_POST['mdp']));


if($req->fetch() === false)
{
    require("connexion.php");
}

else
{
    require("wall.html");
    $resultat['pseudonyme'] = $_POST['pseudonyme'];
    $_SESSION['pseudo'] = $resultat['pseudonyme'];
}    
?>

