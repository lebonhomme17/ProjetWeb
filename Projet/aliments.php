<?php

    include 'Donnees.inc.php';



    $aliment='Aliment';
    if(!empty($_GET['aliment'])){
        $aliment = $_GET['aliment'];
    }


    if(!isset($_SESSION['chemin']) || strcmp($aliment, "Aliment")==0){
        $_SESSION['chemin']= "Aliment";
    }
    else{
        $chemin = $_SESSION['chemin'];
        if(!in_array($aliment, explode("/", $chemin))){
            $_SESSION['chemin'] .= "/" . $aliment;
        }else
        {
            $_SESSION['chemin'] ="";
            foreach (explode("/",$chemin) as $key => $value) {
                $_SESSION['chemin'] .= "/" . $value;
                if(strcmp($aliment, $value)==0){
                    $_SESSION['chemin'] = ltrim($_SESSION['chemin'],'/');
                    break;
                }
            }
        }
    }

    $chemin=$_SESSION['chemin'];




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
    <nav>
        <?php
            if(! strcmp($chemin, "")==0){
                foreach (explode("/",$chemin) as $key => $value) {
                    echo "/<a href='index.php?aliment=".$value."'>".$value."</a>";
                }
            }
        ?>
    </nav>

    <?php

        
        echo '<h2>'.$aliment.'</h2>';
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
        

