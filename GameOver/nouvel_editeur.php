<?php
  
  include "connexionbdd.php";
  session_start();
  
  if(!$_SESSION['type']=="admin"){
    header('Location: index.php');
    exit();
  }
?>

<html>

  <head>
    <title>Nouvel Editeur</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>

  <?php include "menuhaut.php"; ?>

    <div>

      <form method="post" action="ajout_editeur.php">
        <h1>Nouvel Editeur</h1>

        <br/>
        <label for="name">Nom :</label>
        <input type="text" name="name">

        <br/>
        <input type="submit" name="Ajout" value="Ajouter">

      </form>

      <p>
        <?php echo $_GET['mes']; ?>
      </p>

    </div>

  </body>

</html>
