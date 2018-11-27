<?php
  include "connexionbdd.php";
  session_start();

  if(!$_SESSION['type']==""){
    header('Location: index.php');
    exit();
  }

  if(isset($_POST['Identification'])){
    $query="Select pseudo, amateur From Gamer Where pseudo Like '".htmlentities($_POST['pseudo'])."'";
    $stmt = oci_parse($conn, $query);
    oci_execute($stmt, OCI_DEFAULT);
    if (oci_fetch_row($stmt)) {
      $_SESSION['pseudo']=htmlentities($_POST['pseudo']);
      if("".oci_result($stmt, "amateur")=="True"){
        $_SESSION['type']="amateur";
      }else{
        $_SESSION['type']="pro";
      }
      header('Location: index.php');
      exit();
    }elseif($_POST['pseudo']=="admin"){
      $_SESSION['pseudo']="admin";
      $_SESSION['type']="admin";
      header('Location: index.php');
      exit();
    }else{
      header('Location: identification.php');
      exit();
    }


  }else{
    header('Location: identification.php');
    exit();
  }
  
?>