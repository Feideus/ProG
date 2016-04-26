<!doctype html>
<html>
<head>
  <meta charset="utf-8"/>
</head>

<body>
  <?php 
     $tab['nom']="Bob";
     $tab[1]="Dupont";
     $tab['age']=25;
     $tab[]=3457.57;
     $tab['epargne']=false;
     
     echo $tab['nom']." ".$tab[1]." a ".$tab['age']." ans et ".$tab[2]." euros sur son compte en banque. <br/>";
     ?>
</body>

</html>
