<!DOCTYPE html>
<?php

    include 'Donnees.inc.php';
    
    $aliment = $_GET['aliment'];
    if (strcmp($aliment, '')==0){
        $aliment='Aliment';
    }
    
    $super = $Hierarchie[$aliment]['super-categorie'][0];
    $sous = $Hierarchie[$aliment]['sous-categorie'];
    
?>

<html>
    <head>
        <title>Aliments</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        
        <?php
            include 'menu.html';
        ?>
        
        <div>
            
            <a href='aliments.php?aliment=<?php echo $super;?>'> <-- <?php echo $super;?> </a>
            <h1><?php echo $aliment; ?></h1>
            
            <?php
                    if(count($sous)==0){
                        ?>
            <a href="">voir les recettes</a>
            <?php
                    }
                    else{
                        foreach ($sous as $s){
                        ?>
            <a href="aliments.php?aliment=<?php echo $s;?>"><?php echo $s;?></a>
            <?php
                        }
                    }
            
            ?>
            
            
        </div>
        
    </body>
</html>
