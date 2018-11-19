<?php
  session_start();
?>

<html>

  <head>
    <title>Identification</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>

  <?php include "menuhaut.php"; ?>

    <div>

      <form method="post" action="connexion.php">
        <h1>Identification</h1>

        <br/>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo">

        <br/>
        <label for="motdepasse">Mot de passe :</label>
        <input type="password" name="motdepasse">

        <br/>
        <input type="submit" name="Identification" value="Se connecter">

        <p>
          <?php echo $_GET['mes']; ?>
        </p>

      </form>

    </div>

  </body>

</html>
