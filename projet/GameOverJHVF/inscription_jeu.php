<?php
  
?>

<html>

  <head>
    <title>Inscription Nouveau Jeu</title>
    <meta charset="utf-8"/>
  </head>

  <body>

    <div>

      <form method="post" action="ajout_jeu.php">
        <h1>New_Game</h1>

        <br/>
        <label for="nom_jeu">Nom du jeu</label>
        <input type="text" name="nom_jeu">

        <br/>
        <label for="editeur">Editeur</label>
		<select name="editeur">
          <option value="Nintendo">Nintendo</option>
          <option value="EA">EA</option>
          <option value="Microsoft">Microsoft</option>
		</select>
		
		<br/>
        <p>Genre</p>
        <select name="genre">
          <option value="HandS">HandS</option>
          <option value="FPS">FPS</option>
          <option value="RPG">RPG</option>
          <option value="RTS">RTS</option>
        </select>
		
		<br/>
        <label>Online/Offline</label>
        <input type="radio" name="Offline" value="True">Offline
        <input type="radio" name="Offline" value="False">Online

		<br/>
        <label>Solo/Multi</label>
        <input type="radio" name="Multi" value="False">Solo
        <input type="radio" name="Multi" value="True">Multi
		
        <br/>
        <label for="released">Date de sortie (en dd-mm-yyyy)</label>
        <input type="text" name="released">
		
        <br/>
        <label for="nb_niveaux">Nombre de niveaux</label>
        <input type="text" name="nb_niveaux">
		
        <input type="submit" value="New_Game">

      </form>

    </div>

  </body>

</html>