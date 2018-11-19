<?php
  session_start();
  include "connexionbdd.php";
  if(!$_SESSION['type']=="admin"){
    header('Location: index.php');
    exit();
  }
?>

<html>

  <head>
    <title>Enregistrer une session de jeu</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>

  <?php include "menuhaut.php"; ?>

    <div>

      <form method="post" action="save_session.php">
        <h1>Enregistrer une session de jeu</h1>

        <br/>
        <label for="pseudo">Pseudo :</label>
        <select name="pseudo">

        <?php
          $query = "Select * From Gamer";
          $stmt = oci_parse($conn, $query);
          oci_execute($stmt, OCI_DEFAULT);
          while (oci_fetch($stmt)) {
            echo "<option value='" . oci_result($stmt, "PSEUDO") . "'>" . oci_result($stmt, "PSEUDO") . "</option>";
          }
        ?>
          
        </select>
        <br/>
        <label for="debut">Debut :</label>
        <input type="datetime-local" name="debut">

        <br/>
        <label for="fin">Fin :</label>
        <input type="datetime-local" name="fin">

        <br/>
        <label for="game">Jeu :</label>
        <select name="game">

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
        <label for="lvl_deb">Niveau au début :</label>
        <input type="number" name="lvl_deb">

        <br/>
        <label for="lvl_fin">Niveau de fin :</label>
        <input type="number" name="lvl_fin">

        <br/>
        <input type="submit" name="Enregistrer" value="Enregistrer">

        <p>
          <?php echo $_GET['mes']; ?>
        </p>

      </form>

    </div>

  </body>

</html>
