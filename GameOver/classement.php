<?php
  include "connexionbdd.php";
  session_start();
?>

<html>

  <head>
    <title>Classement</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>

  <?php include "menuhaut.php"; ?>

    <div>

      <form method="post" action="classement.php">

        <select name="classement">
          <option value="global" <?php if($_POST['classement']=="global") echo "selected"; ?> >Global</option>
          <option value="social" <?php if($_POST['classement']=="social") echo "selected"; ?> >Social</option>
        </select>

        <input type="submit" name="actualiser" value="Actualiser">

      </form>

    </div>

    <table>
      <thead>
        <th>Pos</th>
        <th>Pseudo</th>
        <th>Score</th>
      </thead>
    <?php
      if(isset($_POST['actualiser'])){
        if($_POST['classement']=="social"){
          $stmt = oci_parse($conn, "select * from score_social");
          $pos = 1;
          oci_execute($stmt, OCI_DEFAULT);
          while (oci_fetch($stmt)) {
            echo "<tr><td>" . $pos . "</td><td>" . oci_result($stmt, "PSEUDO") . "</td><td>" . oci_result($stmt, "SOCIAL_SCORE") . "</td></tr>";
            $pos++;
          }
        }else{
          $stmt = oci_parse($conn, "select * from global_score");
          $pos = 1;
          oci_execute($stmt, OCI_DEFAULT);
          while (oci_fetch($stmt)) {
            echo "<tr><td>" . $pos . "</td><td>" . oci_result($stmt, "PSEUDO") . "</td><td>" . oci_result($stmt, "GLOBAL_SCORE") . "</td></tr>";
            $pos++;
          }
        }
      }
    ?>
    </table>

  </body>

</html>
