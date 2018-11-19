<section id="haut">

  <?php
  if(isset($_SESSION['pseudo'])){
  ?>
  <p><img src="vert.png" width="20" height="20"> <?php echo $_SESSION['pseudo'];?> </p>
  <a href="deconnexion.php">Se deconnecter</a>

  <?php
  }else{
  ?>

  <p color="#0F0"><img src="rouge.png" width="20" height="20"> Mode Anonyme </p>
  <a href="identification.php">Se connecter</a>

  <?php
  }
  ?>

</section>

<nav id="menu">
  <?php
  if($_SESSION['type']==""){
  ?>
  <a href="inscription_joueur.php">Inscription</a>
  <?php
  }
  ?>
  <?php
  if($_SESSION['type']=="admin"){
  ?>
  <a href="nouveau_jeu.php">Ajout de jeu</a>
  <a href="nouvel_editeur.php">Ajout d'editeur</a>
  <a href="ajout_session.php">Enregistrer une session de jeu</a>
  <?php
  }
  if($_SESSION['type']=="amateur" || $_SESSION['type']=="pro"){
  ?>
  <a href="achat_jeu.php">Achat de Jeu</a>
  <?php
  }
  ?>
  <a href="index_astuce.php">Astuces</a>
  <a href="classement.php">Classement</a>
  

</nav>