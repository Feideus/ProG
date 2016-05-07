<?php

$LeNom = $_POST["LeNomDest"];
$NameHost = $_POST["NameHost"];


if ($LeNom !== "") 
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
$req = $bdd->prepare('SELECT id FROM Touitos WHERE pseudonyme = :pseudonyme');
$req3 = $bdd->prepare('SELECT id FROM Touitos WHERE pseudonyme = :pseudonyme');
$req2 = $bdd->prepare('SELECT date_t,texte,IDAuteur FROM Touites,TouitesPrives WHERE
(Touites.IDMsg = TouitesPrives.IDMsg
AND
((TouitesPrives.IDAuteur = :idAuteur AND TouitesPrives.IDReceveur = :idreceveur)
OR
(TouitesPrives.IDReceveur = :idAuteur AND TouitesPrives.IDAuteur = :idreceveur))) ORDER BY date_t');

$req3->execute(array('pseudonyme' => $NameHost));
$req->execute(array('pseudonyme' => $LeNom));

$IDDest = $req->fetch();
$IDAut2 = $req3->fetch();


$req2->execute(array('idAuteur' => $IDDest['id'], 'idreceveur' => $IDAut2['id']));


while($Touites = $req2->fetch())        
{
    
    $req4 = $bdd->prepare('SELECT pseudonyme FROM Touitos WHERE ID = :idAuteur');
    $req4->execute(array('idAuteur' => $Touites['IDAuteur']));
    $tmp = $req4->fetch();
	echo " message de ".$tmp['pseudonyme']." : ".$Touites['texte']."<br/>";
}
?>
