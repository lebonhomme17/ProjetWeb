<?php
	include "connexionbdd.php";
	session_start();

	if(!$_SESSION['type']=="admin"){
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['Ajout'])){
		$query="insert into Editor values (";
		$query=$query."'".htmlentities($_POST['name'])."')";
		
		echo $query;

		$stmt = oci_parse($conn, $query);
		oci_execute($stmt, OCI_DEFAULT);
		echo $conn . " inserted Gamer\n\n";
		oci_commit($conn);

		header('Location: nouvel_editeur.php?mes=Editeur ajouté');
		exit();
	}else{
		header('Location: index.php');
		exit();
	}
	
?>