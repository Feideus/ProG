<?php 
  session_start();
  function connexion($login){
        $_SESSION['connecte']=true;
	$_SESSION['login']=$login;   
	$num=1;
	if(isset($_COOKIE["number"])){
	  $num=$_COOKIE["number"]+1;
	}
	setcookie("number",$num,time()+3600);
  }

  if(strcmp($_POST['login'],"Prof")==0 and strcmp($_POST['pwd'],"cool")==0){
          connexion($_POST['login']);
	  header('Location: acceuil.php');   
  }
  else{
     header('Location: 11_form_session.html');   
  }
?>