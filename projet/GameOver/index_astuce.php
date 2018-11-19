<?php
  include "connexionbdd.php";
  session_start();
?>

<html>

  <head>
    <title>Astuces</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
  </head>
  
    <body>

    <?php include "menuhaut.php"; ?>


    <table title="Liste des astuces">
      <thead>
        <th>Jeu</th>
        <th>Niveau</th>
        <th>Auteur</th>
        <th></th>
      </th>
      <?php
        $query = "Select * From Trick";
        $stmt = oci_parse($conn, $query);
        oci_execute($stmt, OCI_DEFAULT);
        while (oci_fetch($stmt)) {
          echo "<tr><td>" . oci_result($stmt, "GAME_NAME") . "</td><td>" . oci_result($stmt, "GAME_LEVEL") . "</td><td>" . oci_result($stmt, "PSEUDO") . "</td><td><a href='astuce.php?id=" . oci_result($stmt, "ID") . "'>voir</a></td></tr>";
        }
      ?>
    </table>

    <nav id="nav_astuce">
      <?php
      if($_SESSION['type']=="pro" || $_SESSION['type']=="amateur"){
      ?>
      <a href="astuce_gratuite.php">Ajouter Une Astuce Gratuite</a>
      <?php
      }
      ?>
      <?php
      if($_SESSION['type']=="pro"){
      ?>
      <a href="astuce_payante.php">Ajouter Une Astuce Payante</a>
      <?php
      }
      ?>
    </nav>


  </body>
  
</html>