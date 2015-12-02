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

<?php


			$query=$connexion->prepare("SELECT livre_exemplaire, emprunt_date, emprunt_retour 
			FROM emprunt
			WHERE utilisateur_numdecompte = " . $_SESSION['id'] . "");
			$query->execute();
			$count = $query->rowCount();
			echo $count;
			#var_dump($query);

			if ($count > 0) {

			while($donnees = $query->fetch()){
			echo "numero de l'exemplaire :";
			echo $donnees['livre_exemplaire']."</br>";
			echo "date de l'emprunt :";
			echo $donnees['emprunt_date']."</br>";
			echo "date de retour :";
			echo $donnees['emprunt_retour']."</br>";
												}
											}
    else
    {
	        echo '<p> Vous n\'avez pas encore emprunté de livre</p>
	        <p>Cliquez <a href="./index.php">ici</a> pour revenir</p>';
	}
?>