<?php session_start();?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8"/>
  </head>
  <body>
<?php
  if($_SESSION['connecte']===true){
     echo "<p>".$_SESSION['login']." est connecté</p>";
     if(isset($_COOKIE['number'])){
       echo "<p>Il s'agit de sa connexion numéro ".$_COOKIE["number"]."</p>";
     }
  }
  else{
    echo "<p><a href=\"11_form_session.html\">Veuillez vous connecter</a></p>";
  }
?>
  </body>
</html>


