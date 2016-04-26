<!doctype html>
<html>
<head>
  <meta charset="utf-8"/>
</head>

<body>
  <h1> COUCOU </h1>
  <?php 
     $tab['nom']="Bob";
     $tab[1]="Dupont";
     $tab['age']=25;
     $tab[]=3457.57;
     $tab['epargne']=false;
     
     foreach($tab as $cle=>$val)
     {
         if($val===true or $val===false)
	 {
            echo "Clé: ".$cle." Valeur: un booléen<br/>";
         }
         else
    	 {
            echo "Clé: ".$cle." Valeur: ".$val."<br/>";
         }
     }
  	//require('essai.php');
  ?>
</body>

</html>
