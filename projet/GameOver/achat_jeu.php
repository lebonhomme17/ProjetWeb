<?php
  
  include "connexionbdd.php";
  session_start();

  if(!($_SESSION['type']=="amateur" || $_SESSION['type']=="pro")){
    header('Location: index.php');
    exit();
  }
  
?>

<html>

  <head>
    <title>Achat Jeu</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>

  <?php include "menuhaut.php"; ?>

    <div>

      <form method="post" action="achat.php">
        <h1>Achat Jeu</h1>

        <br/>
        <label for="game_name">Nom :</label>
        <select name="game_name">

        <?php
          $query = "Select * From Game";
          $stmt = oci_parse($conn, $query);
          oci_execute($stmt, OCI_DEFAULT);
          while (oci_fetch($stmt)) {
            echo "<option value='" . oci_result($stmt, "NAME") . "'>" . oci_result($stmt, "NAME") . "</option>";
          }
        ?>
          
        </select>

        <br/>
        <input type="submit" name="Ajout" value="Ajouter">

      </form>

      <p>
        <?php echo $_GET['mes']; ?>
      </p>

    </div>

  </body>

</html>
