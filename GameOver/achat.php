<?php
	include "connexionbdd.php";
	session_start();

	if(!($_SESSION['type']=="amateur" or $_SESSION['type']=="pro")){
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['Ajout'])){
		$query="insert into Acquisition values (";
		$query=$query."'".$_SESSION['pseudo']."',";
		$query=$query."'".$_POST['game_name']."',";
		$query=$query."sysdate)";

		echo $query;

		$stmt = oci_parse($conn, $query);
		oci_execute($stmt, OCI_DEFAULT);
		echo $conn . " inserted Gamer\n\n";
		oci_commit($conn);

		header('Location: achat_jeu.php?mes=Le jeu a été ajouté dans votre liste de jeux achetés');
		exit();
	}else{
		header('Location: index.php');
		exit();
	}
	
?>