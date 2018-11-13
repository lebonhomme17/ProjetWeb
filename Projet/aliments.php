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
        
        <style type="text/css">
            
            .sous
            {
                //display: none;
                margin-left: 50px;
            }
            
            .categorie
            {
                color : blue;
            }
            
            .aliment
            {
                color : red;
            }
        </style>
        
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
        
        <div>
            <a onclick="afficherSous('Aliment');">Aliments</a>
            <?php
            
                list_aliment('Aliment', $Hierarchie);
            
            ?>
            
        </div>
        
    </body>
</html>
