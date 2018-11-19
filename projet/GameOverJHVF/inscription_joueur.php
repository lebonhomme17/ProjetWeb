<?php
  
?>

<html>

  <head>
    <title>Inscription</title>
    <meta charset="utf-8"/>
  </head>

  <body>

    <div>

      <form method="post" action="ajout_joueur.php">
        <h1>Inscription</h1>

        <br/>
        <label for="pseudo">Pseudo :</label>
        <input type="text" name="pseudo">

        <br/>
        <label for="mail">Adresse Mail :</label>
        <input type="email" name="mail">

        <br/>
        <input type="checkbox" name="amateur" checked>Je suis joueur amateur

        <br/>
        <label>Sexe :</label>
        <input type="radio" name="genre" value="M">M
        <input type="radio" name="genre" value="F">F

        <br/>
        <label for="age">Age :</label>
        <input type="number" name="age">

        <br/>
        <p>Niveau d'étude :</p>
        <select name="etude">
          <option value="Bac">Bac ou équivalent</option>
          <option value="L">Bac+3</option>
          <option value="M">Bac+5</option>
          <option value="D">Bac+8 ou plus</option>
        </select>

        <input type="submit" value="Inscription">

      </form>

    </div>

  </body>

</html>
