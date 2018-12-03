<?php

if(!isset($_SESSION['chemin'])) $_SESSION['chemin']='';
if(!isset($_GET['aliment'])) $aliment='';
else $aliment=$_GET['aliment'];

if(strcmp($aliment, 'Aliment')==0 || strcmp($aliment,'')==0){
	$SESSION['chemin']='Aliment/';
}
else{
	$SESSION['chemin']='/'.$aliment;
}

header('location:../index.php?aliment='.$aliment);


?>