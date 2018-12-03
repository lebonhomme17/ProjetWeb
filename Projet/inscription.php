<?php
  session_start();
  /*if(!$_SESSION['type']==""){
    header('Location: index.php');
    exit();
  
  }*/
?>

<html>

  <head>
    <title>Inscription</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>

    <div>

      <form method="post" action="action/ajout_client.php">
        <h1>Inscription</h1>

        <br/>
        <label for="login">Login :</label>
        <input type="text" name="login">

        <br/>
        <label for="mdp">Mot de passe :</label>
        <input type="text" name="mdp">

        <br/>
        <label for="nom">Nom :</label>
        <input type="text" name="nom">

        <br/>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom">

        <br/>
        <label>Sexe :</label>
        <input type="radio" name="genre" value="1">M
        <input type="radio" name="genre" value="0">F

        <br/>
        <label for="mail">Adresse Mail : </label>
        <input type="email" name="mail">

        <br/>
        <label for="datenaissance">Date de naissance</label>
        <input type="date" name="datenaissance">

        <br/>
        <label for="adresse">Adresse :</label>
        <input type="text" name="prenom">

        <br/>
        <label for="codepostal">Code postal :</label>
        <input type="text" name="prenom">

        <br/>
        <label for="ville">Ville : </label>
        <input type="text" name="prenom">

        <br/>
        <label for="numtel">Numero de télephone :</label>
        <input type="tel" name="numtel">

        <br/>
        <input type="submit" name="Inscription" value="Inscription">

      </form>

      <p>
        <?php /*echo $_GET['mes'];*/ ?>
              </p>
    
    </div>

  </body>

</html>
