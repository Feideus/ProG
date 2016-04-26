<!doctype html>
<html>
<head>
  <meta charset="utf-8"/>
</head>

<body>
  <?php 
     require('automate.php');
     $a=new automate(5);
     $a->setInitial(0);
     $a->setFinal(4);
     $a->setTransition(0,'a',1);
     $a->setTransition(1,'b',2);
     $a->afficher();

     ?>
</body>

</html>
