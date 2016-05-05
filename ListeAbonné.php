<?php
         
try
{
    $bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');
}

catch (Exception $e)
{
        die('Error 1.2.3.4.Z connection a la base');
}

$id = 1;
 
$req = $bdd->prepare('SELECT IDDemandeur FROM Suivre WHERE IDReceveur = :id AND demande = "A"');
$req2 = $bdd->prepare('SELECT pseudonyme FROM Touitos WHERE id = :idReq');


$req->execute(array('id' => $id));

while ($Donnee = $req->fetch())
    {
        $req2->execute(array('idReq' => $Donnee['IDDemandeur']));
        $tmp2 = $req2->fetch();
        echo"".$tmp2['pseudonyme']."<br/>";
    }
?>