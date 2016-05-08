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
$req3 = $bdd->prepare('SELECT ID FROM Touitos,Suivre WHERE (Suivre.IDReceveur =:idreceveur AND Suivre.demande = "A")');
 
$req2 = $bdd->prepare('SELECT date_t,texte,IDAuteur FROM Touites,TouitesPublics WHERE
(Touites.IDMsg = TouitesPublics.IDMsg
AND (TouitesPublics.IDAuteur = :idauteur)) ORDER BY date_t');

$req->execute(array('pseudonyme' => $NameHost));
$IDHote = $req->fetch();

$req3->execute(array('idreceveur' => $IDHote['ID']));

while($Donnee = $req3->fetch())        
{
    //var_dump($Donnee['ID']);
    $req2->execute(array('idauteur' => $Donnee['ID']));
    while($tmp2 = $req2->fetch())
        {
            //var_dump($tmp2['texte']);
            $req5 = $bdd->prepare('SELECT pseudonyme FROM Touitos WHERE ID = :idAuteur');
            $req5->execute(array('idAuteur' => $tmp2['IDAuteur']));
            $tmp3 = $req5->fetch();
            echo "Le :".$tmp2['date_t']." ".$tmp3['pseudonyme']." a touité : ".$tmp2['texte']."<br/>";    

        }
}
 
?>

