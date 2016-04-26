<!doctype html>
<html>
<head>
  <meta charset="utf-8"/>
</head>

<body>
  <?php 
     require('moyenne.php');     
     $notes=array(15,14,9.5,12,20);
     echo array_sum($notes)." ".count($notes)."<br/>";
     echo "Ma moyenne est de ".moyenne($notes)."<br/>";
     ?>
</body>

</html>
