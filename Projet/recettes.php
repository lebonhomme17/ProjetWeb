<?php
    
    
    
?>
        <div>
            
            <?php

                function ingredients_dispos($h, $a){
                    $res= array();
                    if(array_key_exists('sous-categorie', $h[$a])){
                        foreach ($h[$a]['sous-categorie'] as $key => $value) {
                            foreach (ingredients_dispos($h,$value) as $k => $v) {
                                array_push($res, $v);
                            }
                        }
                    }else{
                        array_push($res, $a);
                    }   
                    return $res;
                }
                
                //print_r(ingredients_dispos($Hierarchie, $aliment));
                
                foreach ($Recettes as $r) {
                    $inter = array();
                    $inter = array_intersect($r['index'], ingredients_dispos($Hierarchie, $aliment));
                    if(!empty($inter)){
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