<!DOCTYPE html>
<?php
    include 'Donnees.inc.php';
    
    $aliment = $_GET['aliment'];
    
?>

<html>
    <head>
        <title>Liste de toutes les recettes</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            
            .recette
            {
                width: 700px;
                margin : auto;
                border: 2px solid lightblue;
                margin-top: 50px;
                padding: 0px 10px 0px 10px;
                background-color: lightgray;
            }
            
            .recette h1
            {
                text-align: center;
                color : darkblue;
            }
            
        </style>
    </head>
    <body>
        
        <?php
            include 'menu.html';
        ?>
        
        <div>
            
            <?php
                foreach ($Recettes as $r) {
                    if(in_array($aliment, $r['index']) || strcmp($aliment, '')==0){
                        $titre = $r['titre'];
                        $img = iconv('UTF-8', 'ASCII//TRANSLIT//IGNORE', $titre);
                        $img = str_replace(' ', '_', $img);
                        $img = $img.'.jpg';
                        $listeIngredients = explode("|", $r['ingredients']);
                        $prepa = explode(". ",$r['preparation']);
            ?>
            <div class="recette">
            <h1><?php echo $titre;?></h1>
            
            <img src='Photos/<?php echo $img;?>' alt="Pas d'image" widht="100" height="100">
            
            <p>Ingrédients: <?php echo '<br/>';foreach($listeIngredients as $li){
                echo $li.'<br/>';
            }
                ;?></p>
            
            <p>Préparation: <?php echo '<br/>';foreach($prepa as $p){
                echo $p."".'<br/>';
            };?></p>
            
            </div>
            <?php
                    }
                }
            ?>
            
        </div>
        
    </body>
</html>