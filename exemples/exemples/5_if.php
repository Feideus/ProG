<!doctype html>
<html>
<head>
  <meta charset="utf-8"/>
</head>

<body>
  <?php 
     $nom="Bob";
     $prenom="Dupont";
     $age=25;
     $compte=3457.57;
     $epargne=false;
     
     echo $nom." ".$prenom." a ".$age." ans et ".$compte." euros sur son compte en banque. <br/>";
     if($epargne==true){
       echo "Il possède un compte épargne.<br/>";
     }
     else{
       echo "Il ne possède pas un compte épargne.<br/>";     
     }

     $nombre=50;
     $chaine='50';
     if($nombre==$chaine){
        echo $nombre." et ".$chaine." ont la meme valeur<br/>";
     }
     if($nombre===$chaine){
        echo $nombre." et ".$chaine." ont le meme type<br/>";
     }
     else{
        echo $nombre." et ".$chaine." n'ont pas le meme type<br/>";
     }
     ?>
</body>

</html>
