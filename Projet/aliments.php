<!DOCTYPE html>
<?php

    include 'Donnees.inc.php';

    $aliment='';
    if(!empty($_GET['aliment'])){
        $aliment = $_GET['aliment'];
    }
    
    function list_aliment($aliment, $h){
        if(is_array($h[$aliment]['sous-categorie'])){
            if(count($h[$aliment]['sous-categorie'])>0){
                echo '<div class="sous" id=\''.$aliment.'\' style="display : none;" >';
                foreach ($h[$aliment]['sous-categorie'] as $a){
                    if(!empty($h[$a]['sous-categorie']) && count($h[$a]['sous-categorie'])>0){
                        echo '<a class="categorie" onclick=\'afficherSous("'.$a.'");\'>'.$a.'</a><br/>';
                        list_aliment($a, $h);
                    }
                    else{
                        echo '<a class="aliment" href="aliments.php?aliment='.$a.'">'.$a.'</a><br/>';
                    }
                }
                echo '</div>';
            }
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

        <?php
            include 'menu.html';
        ?>
         <table>
            <tr>
                <td valign="top">       
        <div class="list-aliment">
            <a onclick="afficherSous('Aliment');">Aliments</a>
            <?php
            
                list_aliment('Aliment', $Hierarchie);
            
            ?>
            
        </div>
</td>
<td>
        <div class="recettes">

            <?php
            if(!empty($aliment)){
echo 'Liste de recette(s) avec : '.$aliment;
}
            include 'recettes.php';
            ?>
        </div>
    </td>
</tr>
</table>
        
    </body>
</html>
