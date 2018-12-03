<?php
	include "lienbdd.php";
	session_start();

	/*if(!$_SESSION['type']==""){
		header('Location: index.php');
		exit();
	}*/

	if(isset($_POST['Inscription'])){
		$query="insert into Client values (";
		$query=$query."'".htmlentities($_POST['login'])."',";
		$query=$query."'".htmlentities($_POST['mdp'])."',";	
		$query=$query."'".htmlentities($_POST['nom'])."',";
		$query=$query."'".htmlentities($_POST['prenom'])."',";
		$query=$query."'".htmlentities($_POST['login'])."',";
		$query=$query."'".$_POST['genre']."',";				
		$query=$query."'".htmlentities($_POST['mail'])."',";
		$query=$query."'".htmlentities($_POST['datenaissance'])."',";		
		$query=$query."'".htmlentities($_POST['adresse'])."',";	
		$query=$query."'".htmlentities($_POST['codepostal'])."',";					
		$query=$query."'".htmlentities($_POST['ville'])."',";
		$query=$query."'".htmlentities($_POST['numtel'])."',";

		echo $query;

		$stmt = oci_parse($conn, $query);
		oci_execute($stmt, OCI_DEFAULT);
		echo $conn . " inserted Client\n\n";
		oci_commit($conn);

		header('Location: inscription.php?mes=Le client a été ajouter');
		exit();
	}else{
		header('Location: index.php');
		exit();
	}
	
?>