<?php	
	session_start();
	setcookie('name',$_SESSION['pseudo'],10000000);
	var_dump($_SESSION['pseudo']);
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="Page_Info.css"/>
    <title> Info Personnelles </title>
  </head>

  <body>
    <header id="Leheader">
      <div>
        <!--<img src="/~/Téléchargements/Travail Info/projets/ProG_Touitteur/NomDeLimage"/>-->
        <h3>Bienvenue sur la page des infos persos</h3>
      </div>
    </header>
    <section id="LaSection">
      <div id="PremierDiv">
        <header id="PremierDivHeader">
          <h2>Paramètres du compte</h2>
        </header>
        <div class="DivPartie">
          informations Personnelles
        </div>
	<div>

	  <form id="FormInfoPerso" method="POST" action="modifierInfo.php">

            <div class="fieldset clearfix">
              <label>Pseudo</label>
              <input type="text" name="pseudo"></input>
              
            </div>
            

            
            <div class="DivPartie">
              Identifiants et Connexion
            </div>
	    <div class="fieldset clearfix">
              <label>Mot de passe</label>
              <input type="password" name="password"></input>
              
	    </div>
	    <div class="fieldset clearfix">
              <label>Email</label>
              <input type="email" name="email"> </input>
              
	    </div>
	    <button type="submit">
              Modifier
            </button>
	  </form>
	  </div>
        <nav id="DeuxiemeDiv">
          <header id ="DeuxiemeDivHeader">
            Catégories
          </header>

	  <a href="préférences.html"><p> personnalisation du profil</p></a>

        </nav>
        
    </section>
    
  </body>

</html>

