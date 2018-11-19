<?php
  
?>

<html>

  <head>
    <title>Nouvelle Astuce Payante</title>
    <meta charset="utf-8"/>
  </head>

  <body>

    <div>

      <form method="post" action="add_not_free_trick.php">
        <h1>Nouvelle Astuce Payante</h1>
		
		<br/>
        <label for="id">Id</label>

        <br/>
        <label for="nom_jeu">Nom du jeu</label>
        <input type="text" name="nom_jeu">
		
		<br/>
        <label for="pseudo">Pseudo</label>
        <input type="text" name="pseudo">
		
		<br/>
        <label for="deal">Pseudo</label>
        <input type="radio" name="deal" value="money">Argent
        <input type="radio" name="deal" value="exchange">Echange d'astuce
		
		<br/>
        <label for="level">Texte de l'astuce</label>
        <input type="text" name="lavel">
		
        <input type="submit" value="Nouvelle Astuce Payante">

      </form>

    </div>

  </body>

</html>