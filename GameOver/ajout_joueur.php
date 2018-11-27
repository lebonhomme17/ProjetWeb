<?php
	include "connexionbdd.php";
	session_start();

	if(!$_SESSION['type']==""){
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['Inscription'])){
		$query="insert into Gamer values (";
		$query=$query."'".htmlentities($_POST['pseudo'])."',";
		$query=$query."null".",";
		$query=$query."'".htmlentities($_POST['mail'])."',";
		if(isset($_POST['amateur'])){
			$query=$query."'True'".",";
		}else{
			$query=$query."'False'".",";
		}
		$query=$query."'".$_POST['genre']."',";
		$query=$query.htmlentities($_POST['age']).",";
		$query=$query."'".$_POST['etude']."',";
		$query=$query."null ,null)";

		echo $query;

		$stmt = oci_parse($conn, $query);
		oci_execute($stmt, OCI_DEFAULT);
		echo $conn . " inserted Gamer\n\n";
		oci_commit($conn);

		header('Location: inscription_joueur.php?mes=Le joueur a été ajouter');
		exit();
	}else{
		header('Location: index.php');
		exit();
	}
	
?>