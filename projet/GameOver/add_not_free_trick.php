<?php
	include "connexionbdd.php";
	session_start();

	if(!$_SESSION['type']=="pro"){
		header('Location: index.php');
		exit();
	}

	$query="select max(id)+1 as ID from Trick";

	$stmt = oci_parse($conn, $query);
	oci_execute($stmt, OCI_DEFAULT);
	oci_fetch($stmt);
	$id=oci_result($stmt, "ID");
	if(is_null($id))$id=1;
	
	$query="insert into Trick values (";
	$query=$query.$id.",";
	$query=$query."'".$_POST['nom_jeu']."',";
	$query=$query.$_POST['level'].",";
	$query=$query."'".$_POST['pseudo']."')";


	$stmt = oci_parse($conn, $query);
	oci_execute($stmt, OCI_DEFAULT);
	echo $conn . " inserted Free_Trick\n\n";
	oci_commit($conn);


	$query="insert into Not_Free values (";
	$query=$query.$id.",";
	$query=$query."'".$_POST['deal']."')";


	$stmt = oci_parse($conn, $query);
	oci_execute($stmt, OCI_DEFAULT);
	echo $conn . " inserted Free_Trick\n\n";
	oci_commit($conn);

	header('Location: index_astuce.php');
	exit();
?>