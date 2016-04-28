<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=TOUITTEUR;charset=utf8', 'Feideus', 'lebossdesboss32');
}

catch (Exception $e)
{
        die('Error 1.2.3.4.Z connection a la base');
}

$req = $bdd->prepare('SELECT id FROM Touitos WHERE pseudonyme = :id AND mdp = :mdp');


$req->execute(array(
    'id' => $_POST['pseudonyme'],
    'mdp' => $_POST['$mdp']));



if(!isset($req))
{
    echo "la connexion a echouee";
}

else
{
    $resultat['pseudonyme'] = $_POST['pseudonyme'];
    session_start();
    $_SESSION['pseudo'] = $resultat['pseudonyme'];
    echo "bienvenue".$resultat['pseudonyme']."Touitteur est heureux de vous revoir !";
}
?>