<?php


$NameHost=$_COOKIE['name'];

try
{
    $bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');
}

catch (Exception $e)
{
        die('Error 1.2.3.4.Z connection a la base');
}

$req = $bdd->prepare('SELECT ID FROM Touitos WHERE pseudonyme = :NameHost');
$req->execute(array('NameHost' => $NameHost));
$Donnee1 = $req->fetch();



$req10 = $bdd->prepare('SELECT IDReceveur FROM Touitos,Suivre WHERE (Touitos.ID = Suivre.IDDemandeur AND (Suivre.IDDemandeur = 1) AND Suivre.demande = "A")'); 


$req10->execute(array('idName' => $Donnee1['ID']));

while($Donnee = $req10->fetch())        
{
    $req2 = $bdd->prepare('SELECT pseudonyme FROM Touitos WHERE ID = :IDname');
    $req2->execute(array('IDname' => $Donnee['IDReceveur']));
	echo"         -----VOS SUIVIS-----        "."<br/>";
	$IDName = $req2->fetch();
    echo "".$IDName['pseudonyme']."<br/>";    
}
 
?>

