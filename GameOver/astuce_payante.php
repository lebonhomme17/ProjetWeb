<?php
  session_start();
  include "connexionbdd.php";

  if(!$_SESSION['type']=="pro"){
    header('Location: index.php');
    exit();
  }
?>

<html>

  <head>
    <title>Nouvelle Astuce Payante</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>

  <?php include "menuhaut.php"; ?>

    <div>

      <form method="post" action="add_not_free_trick.php">
        <h1>Nouvelle Astuce Payante</h1>
		
		<br/>

        <br/>
        <label for="nom_jeu">Nom du jeu</label>
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
        <label for="deal">Deal :</label>
        <input type="radio" name="deal" value="money">Argent
        <input type="radio" name="deal" value="exchange">Echange d'astuce

    <br/>
        <label for="level">Niveau :</label>
        <input type="number" name="level" min="1">
		
		<br/>
        <input type="submit" value="Nouvelle Astuce Payante">

      </form>

    </div>

  </body>

</html>