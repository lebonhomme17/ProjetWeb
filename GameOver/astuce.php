<?php
  include "connexionbdd.php";
  session_start();

  if(!isset($_GET['id'])){
  	header('Location: index.php');
  	exit();
  }else{
  	$stmt = oci_parse($conn, "Select * From Trick Join Free_Trick Using(id) Where id Like '" . $_GET['id'] . "'");
	oci_execute($stmt, OCI_DEFAULT);
	if (oci_fetch($stmt)) {?>



<html>

  <head>
    <title>Astuces</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="style.css" />
  </head>
  
  <body>

  <?php include "menuhaut.php"; ?>

  	<div>
  		
  		<p><b>Auteur :</b><?php echo oci_result($stmt, "PSEUDO");?></p>
  		<p><b>Jeu :</b><?php echo oci_result($stmt, "GAME_NAME");?></p>
  		<p><b>Niveau :</b><?php echo oci_result($stmt, "GAME_LEVEL");?></p>
  		<p><br/><br/><i><?php echo oci_result($stmt, "TRICK_TEXT");?></i></p>

  		<form method="post" action="vote.php">
	  		<input type="hidden" name="id" value=<?php echo "'".$_GET['id']."'";?>>
	  		<input type="hidden" name="pseudo" value=<?php echo "'".$_SESSION['pseudo']."'";?>>
	  		<input type="submit" name="vote" value="J'ai jugé cette astuce utile">
	  	</form>

	  	<a href="index_astuce.php">retour à la liste des astuces</a>

  	</div>

  </body>
  
</html>





	<?php  
	}else{
		header('Location: index.php');
  		exit();
	}
  }
?>

