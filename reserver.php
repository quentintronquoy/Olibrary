<?php 
include_once("includes/header.php");
?>
<div id="menu">
			<ul>
				<li class="active"><a href="./index.php" accesskey="1" title="Page d'Accueil">Accueil</a></li>
				<li><a href="./connexion.php" accesskey="4" title="deconnexion">Connexion</a></li>
			</ul>
	
		
	
</div>

<img id="banner" src="images/banner.jpeg">

<div>
Regardez vos emprunts : <input type="submit" value="afficher" name="go" />
</div>
<?php


    		echo "OK";
			$query=$connexion->prepare("SELECT livre_exemplaire, emprunt_date, emprunt_retour 
			FROM emprunt
			WHERE utilisateur_numdecompte = " . $_SESSION['id'] . "");
			$query->execute();
			var_dump($query);
			while($donnees = $query->fetch()){
			echo "numero de l'exemplaire :";
			echo $donnees['livre_exemplaire']."</br>";
			echo "date de l'emprunt :";
			echo $donnees['emprunt_date']."</br>";
			echo "date de retour :";
			echo $donnees['emprunt_retour']."</br>";
												}
       if(isset($_POST['go'])) 
    {		}  
    else
    {
	        echo '<p> Vous n\'avez pas encore emprunté de livre</p>
	        <p>Cliquez <a href="./index.php">ici</a> pour revenir</p>';
	}
?>