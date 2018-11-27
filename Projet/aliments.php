<?php

    include 'Donnees.inc.php';



    $aliment='Aliment';
    if(!empty($_GET['aliment'])){
        $aliment = $_GET['aliment'];
    }


    if(!isset($_SESSION['chemin'])){
        $_SESSION['chemin']= "";
    }
    else{
        $chemin = $_SESSION['chemin'];
        if(!in_array($aliment, explode("/", $chemin))){
            $_SESSION['chemin'] .= "/" . $aliment;
        }
    }





    function list_aliment($aliment, $h){
        if(array_key_exists('sous-categorie', $h[$aliment])){
                foreach ($h[$aliment]['sous-categorie'] as $a){
                    if(!empty($h[$a]['sous-categorie']) && count($h[$a]['sous-categorie'])>0){
                        echo '<a class="categorie" href="index.php?aliment='.$a.'">'.$a.'</a><br/>';
                    }
                    else{
                        echo '<a class="aliment" href="index.php?aliment='.$a.'">'.$a.'</a><br/>';
                    }
                }
            
        }

    }
    
?>

<div id="list-aliment">
    <p><?php print_r($_SESSION);//echo $_SESSION['chemin'];?></p>

    <?php

        
    
        list_aliment($aliment, $Hierarchie);
    
    ?>
    
</div>

<div id="recette">
    <?php
        if(!empty($aliment)){
            if($aliment=="Aliment"){
                echo 'Liste de toutes les recettes';
            }
            else{
    echo '<div id="titre_recette">Liste de recette(s) avec : '.$aliment.'</div>';
}
}
    include 'recettes.php';
    ?>
</div>
        

