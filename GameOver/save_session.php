<?php
	include "connexionbdd.php";
	session_start();

	if(!$_SESSION['type']=="admin"){
		header('Location: index.php');
		exit();
	}

	if(isset($_POST['Enregistrer'])){
		$debut=str_replace("T", " ", $_POST['debut']);
		$fin=str_replace("T", " ", $_POST['fin']);

		$query="insert into game_session values (";
		$query=$query."'".htmlentities($_POST['pseudo'])."',";
		$query=$query."to_date('".$debut."', 'yyyy-mm-dd hh24:mi'),";
		$query=$query."'".htmlentities($_POST['game'])."',";
		$query=$query."to_date('".$fin."', 'yyyy-mm-dd hh24:mi'),";
		$query=$query.$_POST['lvl_deb'].",";
		$query=$query.$_POST['lvl_fin'].")";

		echo $query;

		$stmt = oci_parse($conn, $query);
		oci_execute($stmt, OCI_DEFAULT);
		echo $conn . " inserted Game_Session\n\n";
		oci_commit($conn);

		header('Location: ajout_session.php?mes=La session a été enregistrée');
		exit();
	}else{
		header('Location: index.php');
		exit();
	}
	
?>