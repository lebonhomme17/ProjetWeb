<?php
	$db = '';

	$conn = oci_connect("SYSTEM", "rw642h9b", $db);

	$query="insert into Trick values (";
	$query=$query.$_POST['id'].",";
	$query=$query."'".$_POST['nom_jeu']."',";
	$query=$query.$_POST['level'].",";
	$query=$query."'".$_POST['pseudo']."')";
	$query="insert into Free_Trick values (";
	$query=$query.$_POST['id'].",";
	$query=$query."'".$_POST['deal']."')";

	echo $query;

	$stmt = oci_parse($conn, $query);
	oci_execute($stmt, OCI_DEFAULT);
	echo $conn . " inserted Game\n\n";
	oci_commit($conn);
?>