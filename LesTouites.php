<?php

$NameHost = $_COOKIE['name'];


if ($NameHost !== "") 
{
    $LeNom = strtolower($LeNom);
}

try
{
    $bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');
}

catch (Exception $e)
{
        die('Error 1.2.3.4.Z connection a la base');
}

$req = $bdd->prepare('SELECT ID FROM Touitos WHERE pseudonyme = :pseudonyme');
$req10 = $bdd->prepare('SELECT texte,date_t FROM Touites,TouitesPublics WHERE (Touites.IDMsg = TouitesPublics.IDMsg AND (TouitesPublics.IDAuteur = :idNameHost)) ORDER BY date_t'); 

$req->execute(array('pseudonyme' => $NameHost));
$IDNameHost = $req->fetch();

$req10->execute(array('idNameHost' => $IDNameHost['ID']));

while($Donnee = $req10->fetch())        
{
            echo "Le :".$Donnee['date_t']." ".$_COOKIE['name']." a touité  ".$Donnee['texte']."<br/>";    
}
 
?>
