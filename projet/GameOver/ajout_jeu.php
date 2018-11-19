<?php
	include "connexionbdd.php";
	session_start();

	if(!$_SESSION['type']=="admin"){
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['Ajout'])){
		$query="insert into Game values (";
		$query=$query."'".htmlentities($_POST['name'])."',";
		$query=$query."'".$_POST['editor_name']."',";
		$query=$query."'".$_POST['genre']."',";
		if(isset($_POST['off_line'])){
			$query=$query."'True'".",";
		}else{
			$query=$query."'False'".",";
		}
		if(isset($_POST['multiplayer'])){
			$query=$query."'True'".",";
		}else{
			$query=$query."'False'".",";
		}
		$query=$query."to_date('".$_POST['released']."','YYYY-MM-DD'),";
		$query=$query.$_POST['nb_levels'].")";

		echo $query;

		$stmt = oci_parse($conn, $query);
		oci_execute($stmt, OCI_DEFAULT);
		echo $conn . " inserted Gamer\n\n";
		oci_commit($conn);

		header('Location: nouveau_jeu.php?mes=Le jeu a été ajouté');
		exit();
	}else{
		header('Location: index.php');
		exit();
	}
	
?>