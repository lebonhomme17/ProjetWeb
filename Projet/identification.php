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

    <div>

      <form method="post" action="action/identification.php">
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
          <?php 
          if(isset($_GET['mes'])){
            echo $_GET['mes']; 
          }
          ?>
        </p>

      </form>

    </div>

  </body>

</html>