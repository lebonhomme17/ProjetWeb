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
		<link href="style.css" rel="stylesheet" media="all" type="text/css"> 

    </head>
    <body>
	<div class="header"> 
<table>
<tr>
	<td><div class="titre">Mes boissons favorites</div></td>

	<td><div class="barre_recherche">
		<form action="/search" id="recette_search" onsubmit="ga('send', 'event', 'Search Clicks', 'Header', $j('#searchBox').val());" method="get">
		<input name="p" value="1" type="hidden">
            <span id="searchIcon"></span>
		<input class="textfield" id="searchBox" name="s" title="Search" placeholder="Search" type="text">
		</form>
		</div>
	</td>	
	<td><div class="liste_recettes">	
    <a href="recettes.php">Liste des recettes</a>
	</div></td>
	<td><div class="liste_aliments">
    <a href="aliments.php">Liste des aliments</a>
	</div></td>
	<td><div class="connexion">
    <a href="connexion.php">Connexion</a>
	</div></td>
	</tr>
	</table>
</div>
        
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