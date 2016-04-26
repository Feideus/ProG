<?php
	if(isset($_POST['login']) and !empty($_POST['login'])){
	   echo "<p>Login: ".htmlentities($_POST['login'])."<br/></p>";	   
	}
	if(isset($_POST['pwd']) and !empty($_POST['pwd'])){
	   echo "<p>Mot de passe: ".htmlentities($_POST['pwd'])."<br/></p>";	   
	}
?>