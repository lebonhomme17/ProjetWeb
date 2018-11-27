<?php
	include "connexionbdd.php";
	session_start();

	if(!($_SESSION['type']=="amateur" || $_SESSION['type']=="pro")){
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['vote'])){

		$query="insert into votes values (";
		$query=$query.$_POST['id'].",";
		$query=$query."'".htmlentities($_POST['pseudo'])."')";


		echo $query;

		$stmt = oci_parse($conn, $query);
		oci_execute($stmt, OCI_DEFAULT);
		echo $conn . " inserted Votes\n\n";
		oci_commit($conn);

		header('Location: astuce.php?id='.$_POST['id']);
		exit();
	}else{
		header('Location: index.php');
		exit();
	}
	
?>