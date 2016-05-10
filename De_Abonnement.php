<?php

$PseudoPage = htmlentities($_POST['Lelabel']);
$BoutonLabel = htmlentities($_POST['BoutonLabel']);
$PseudoClient = htmlentities($_COOKIE['name']);

try
{
    $bdd=new PDO('mysql:host=localhost;dbname=Touiteur','erwan','lebossdesboss32');
}

catch (Exception $e)
{
        die('Error 1.2.3.4.Z connection a la base');
}

if (!empty($PseudoPage))
{ 
    if($BoutonLabel === "Suivre")
    {
        $req2 = $bdd->prepare('SELECT ID FROM Touitos WHERE pseudonyme = :pseudonyme');
        $req2->execute(array('pseudonyme' => $PseudoClient));
        $Donnee1 = $req2->fetch();
     
        
        $req2->execute(array('pseudonyme' => $PseudoPage));
        $Donnee2 = $req2->fetch();

   
        $req = $bdd->prepare('INSERT INTO Suivre VALUES(:IDDemandeur,:IDReceveur,"A")');
        $req->execute(array('IDDemandeur' => $Donnee1['ID'] ,'IDReceveur' => $Donnee2['ID']));
        var_dump($req);
         var_dump($Donnee1['ID']);
         var_dump($Donnee2['ID']);

    }
    else
    {
        $req2 = $bdd->prepare('SELECT ID FROM Touitos WHERE pseudonyme = :pseudonyme');
        $req2->execute(array('pseudonyme' => $PseudoClient));
        $Donnee1 = $req2->fetch();
     
        
        $req2->execute(array('pseudonyme' => $PseudoPage));
        $Donnee2 = $req2->fetch();

   
        $req = $bdd->prepare('DELETE FROM Suivre WHERE(IDDemandeur = :IDDemandeur AND IDReceveur = :IDReceveur)');
        $req->execute(array('IDDemandeur' => $Donnee1['ID'],'IDReceveur' => $Donnee2['ID']));

     }
        
}
else
{
    echo "<script type="; echo "text/javascript> alert(Connecter vous pour Suivre un Touitos);</script>"; 
}

?>
