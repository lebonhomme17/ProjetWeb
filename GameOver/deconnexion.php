<?php
  include "connexionbdd.php";
  session_start();
  $_SESSION['pseudo']="";
  $_SESSION['type']="";

  session_destroy();

  header('Location: index.php');
  exit();
  
?>