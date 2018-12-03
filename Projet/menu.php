<div class="header"> 
<table>
<tr>
	<td><div class="titre">Mes boissons favorites</div></td>
	<td><img src='Builder.jpg' widht="100" height="100">

	<td><div class="barre_recherche">
		<form action="action/recherche.php" id="recette_search" method="post">
		<input name="p" value="1" type="hidden">
            <span id="searchIcon"></span>
		<input class="textfield" id="searchBox" name="s" title="Search" placeholder="Search" type="text">
		</form>
		</div>
	<td><div class="connexion">	
    <a href="index.php?page=aliments">Accueil</a>
	</div></td>
	<td><div class="connexion">	
		<?php if(!isset($_SESSION['pseudo']) || $_SESSION['pseudo']==""){ ?>
    <a href="identification.php">Connexion</a>
    	<?php }else{
    		echo $_SESSION['pseudo']."<br\>";
    	?>
    <a href="action/deconnexion.php">Deconnexion</a>
    	<?php
    }
    ?>
	</div></td>
	</tr>
	</table>
</div>