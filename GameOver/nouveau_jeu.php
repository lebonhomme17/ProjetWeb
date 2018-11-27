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
    <title>Nouveau Jeu</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>

  <?php include "menuhaut.php"; ?>

    <div>

      <form method="post" action="ajout_jeu.php">
        <h1>Nouveau Jeu</h1>

        <br/>
        <label for="name">Nom :</label>
        <input type="text" name="name">

        <br/>
        <label for="editor_name">Editeur :</label>
        <select name="editor_name">
          <?php
            $query = "Select * From Editor";
            $stmt = oci_parse($conn, $query);
            oci_execute($stmt, OCI_DEFAULT);
            while (oci_fetch($stmt)) {
              echo "<option value='" . oci_result($stmt, "NAME") . "'>" . oci_result($stmt, "NAME") . "</option>";
            }
          ?>
        </select>

        <br/>
        <label for="genre">Genre :</label>
        <select name="genre">
          <option value="RPG">RPG</option>
          <option value="RTS">RTS</option>
          <option value="FPS">FPS</option>
          <option value="HandS">Hands</option>
        </select>

        <br/>
        <input type="checkbox" name="off_line" value="M">Hors-ligne

        <br/>
        <input type="checkbox" name="multiplayer" value="F">Multi-joueur

        <br/>
        <label for="nb_levels">Nombre de niveaux :</label>
        <input type="number" name="nb_levels" min="1">

        <br/>
        <label for="released">Date de sortie :</label>
        <input type="date" name="released" min="1">

        <br/>
        <input type="submit" name="Ajout" value="Ajouter">

      </form>

      <p>
        <?php echo $_GET['mes']; ?>
      </p>

    </div>

  </body>

</html>
