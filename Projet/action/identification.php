<?php
  include "../lienbdd.php";
  session_start();

  if(isset($_SESSION['pseudo']) && $_SESSION['pseudo']!=""){
    header('Location: ../index.php');
    exit();
  }
  if(isset($_POST['Identification'])){
    $query= $bdd->prepare("Select login, mdp From client Where login Like '".$_POST['pseudo']."'");
    $query->execute();
    if ($row = $query->fetch()) {
      if($row['mdp']==$_POST['motdepasse']){
        $_SESSION['pseudo']=htmlentities($_POST['pseudo']);
        header('Location: ../index.php');
        exit();
      }
    }else{
      header('Location: ../identification.php');
      exit();
    }
  }else{
    header('Location: ../identification.php');
    exit();
  }
  
?>