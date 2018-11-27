<?php
  session_start();
  include "connexionbdd.php";

  if(!($_SESSION['type']=="amateur" || $_SESSION['type']=="pro")){
    header('Location: index.php');
    exit();
  }

?>

<html>

  <head>
    <title>Nouvelle Astuce Gratuite</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>

  <?php include "menuhaut.php"; ?>

    <div>

      <form method="post" action="add_free_trick.php">
        <h1>Nouvelle Astuce Gratuite</h1>
		
		<br/>

        <br/>
        <label for="nom_jeu">Jeu</label>
        <select name="nom_jeu">
          <?php
            $query="Select name From Game";
            $stmt = oci_parse($conn, $query);
            oci_execute($stmt, OCI_DEFAULT);
            while (oci_fetch($stmt)) {
              echo "<option value='" . oci_result($stmt, "NAME") . "'>" . oci_result($stmt, "NAME") . "</option>\n";
            }
          ?>
        </select>
		
		<br/>
        <input type="hidden" name="pseudo" value=<?php echo "\"".$_SESSION['pseudo']."\""?>>
		
		<br/>
        <label for="level">Niveau</label>
        <input type="number" name="level" min="1">
		
		<br/>
        <label for="trick_text">Texte de l'astuce</label><br/>
        <textarea name="trick_text" rows="40" cols="100"></textarea>
		<br/>
        <input type="submit" value="Nouvelle Astuce Gratuite">

      </form>

    </div>

  </body>

</html>