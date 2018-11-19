<?php
	$db = '';

	$conn = oci_connect("SYSTEM", "rw642h9b", $db);

	$sql="select max(id)+1 as id_trick from Trick order by id desc";
	$result=mysqli_select_db($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
	$query="insert into Trick values (";
	$query=$query.select max(id)+1 from Trick order by id desc.",";
	$query=$query."'".$_POST['nom_jeu']."',";
	$query=$query.$_POST['level'].",";
	$query=$query."'".$_POST['pseudo']."');";
	
		echo $query;

	$stmt = oci_parse($conn, $query);
	oci_execute($stmt, OCI_DEFAULT);
	echo $conn . " inserted Trick\n\n";
	
	$query="insert into Free_Trick values (";
	$query=$query.$select.",";
	$query=$query."'".$_POST['trick_text']."')";

	echo $query;

	$stmt = oci_parse($conn, $query);
	oci_execute($stmt, OCI_DEFAULT);
	echo $conn . " inserted Free_Trick\n\n";
	oci_commit($conn);
?>