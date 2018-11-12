<!DOCTYPE html>
<?php

    include 'Donnees.inc.php';
    
?>

<html>
    <head>
        <title>Recettes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <?php
            include 'menu.html';
        ?>
        
        <div>
            
            <?php
                foreach ($Recettes as $r) {
                    $titre = $r['titre'];
                    $img = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $titre);
                    $img = str_replace(' ', '_', $img);
                    $img = $img.'.jpg';
            ?>
            
            <h1><?php echo $titre;?></h1>
            
            <img src='Photos/<?php echo $img;?>' alt="Pas d'image <?php echo $img;?>">
            
            <p>Ingrédients: <?php echo $r['ingredients'];?></p>
            
            <p>Préparation: <?php echo $r['preparation'];?></p>
            
            <?php
                }
            ?>
            
        </div>
        
    </body>
</html>
