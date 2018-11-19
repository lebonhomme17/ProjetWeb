<?php
  
?>

<html>

  <head>
    <title>Nouvelle Astuce Gratuite</title>
    <meta charset="utf-8"/>
  </head>

  <body>

    <div>

      <form method="post" action="add_free_trick.php">
        <h1>Nouvelle Astuce Gratuite</h1>
		
		<br/>
        <label for="id">Id</label>

        <br/>
        <label for="nom_jeu">Nom du jeu</label>
        <input type="text" name="nom_jeu">
		
		<br/>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo">
		
		<br/>
        <label for="level">Niveau</label>
        <input type="text" name="level">
		
		<br/>
        <label for="trick_text">Texte de l'astuce</label>
        <input type="text" name="trick_text">
		
        <input type="submit" value="Nouvelle Astuce Gratuite">

      </form>

    </div>

  </body>

</html>