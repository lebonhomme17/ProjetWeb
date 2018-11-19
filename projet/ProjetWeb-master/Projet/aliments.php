<!DOCTYPE html>
<?php

    include 'Donnees.inc.php';
    
    function list_aliment($aliment, $h){
        if(count($h[$aliment]['sous-categorie']>0)){
            echo '<div class="sous" id=\''.$aliment.'\' style="display : none;" >';
            foreach ($h[$aliment]['sous-categorie'] as $a){
                if(count($h[$a]['sous-categorie'])>0){
                    echo '<a class="categorie" onclick=\'afficherSous("'.$a.'");\'>'.$a.'</a><br/>';
                    list_aliment($a, $h);
                }
                else{
                    echo '<a class="aliment" href="recettes.php?aliment='.$a.'">'.$a.'</a><br/>';
                }
            }
            echo '</div>';
        }
    }
    
?>

<html>
    <head>
        <title>Aliments</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<link href="style.css" rel="stylesheet" media="all" type="text/css"> 
		
        <script type="text/javascript">
            
            function afficherSous(aliment){
                var sous = document.getElementById(aliment);
                if(sous.style.display === 'none' ){
                    sous.style.display = '';
                }
                else{
                    sous.style.display = 'none';
                }
            }
        
        </script>
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
            <a onclick="afficherSous('Aliment');">Aliments</a>
            <?php
            
                list_aliment('Aliment', $Hierarchie);
            
            ?>
            
        </div>
        
    </body>
</html>
