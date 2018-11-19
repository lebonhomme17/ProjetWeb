<?php
	$db = '';

	$conn = oci_connect("SYSTEM", "rw642h9b", $db);

	$query="insert into Game values (";
	$query=$query."'".$_POST['nom_jeu']."',";
	$query=$query."'".$_POST['editeur']."',";
	$query=$query."'".$_POST['genre']."',";
	$query=$query."'".$_POST['Offline']."',";
	$query=$query."'".$_POST['Multi']."',";
	$query=$query."'".$_POST['released']."',";
	$query=$query.$_POST['nb_niveaux'].")";

	echo $query;

	$stmt = oci_parse($conn, $query);
	oci_execute($stmt, OCI_DEFAULT);
	echo $conn . " inserted Game\n\n";
	oci_commit($conn);
?>