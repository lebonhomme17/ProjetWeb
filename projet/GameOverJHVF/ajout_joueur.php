<?php
	$db = '';

	$conn = oci_connect("SYSTEM", "rw642h9b", $db);

	$query="insert into Gamer values (";
	$query=$query."'".$_POST['pseudo']."',";
	$query=$query."null".",";
	$query=$query."'".$_POST['mail']."',";
	if(isset($_POST['amateur'])){
		$query=$query."'True'".",";
	}else{
		$query=$query."'False'".",";
	}
	$query=$query."'".$_POST['genre']."',";
	$query=$query.$_POST['age'].",";
	$query=$query."'".$_POST['etude']."',";
	$query=$query."null ,null)";

	echo $query;

	$stmt = oci_parse($conn, $query);
	oci_execute($stmt, OCI_DEFAULT);
	echo $conn . " inserted Gamer\n\n";
	oci_commit($conn);
?>