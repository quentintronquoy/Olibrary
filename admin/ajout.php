<?php include_once("includes3/header3.php");
?>




<div id="menu">
			<ul>
				<li class="active"><a href="./admin.php" accesskey="2" title="Liste">Liste</a></li>
				<li><a href="./ajout.php" accesskey="3" title="Ajout">Ajout</a></li>
				<li><a href="../connexion.php" accesskey="4" title="Décconnexion">Déconnexion</a></li>
	
		
	
</div>

<body>

<div class="title">
	  <h2> Ajout d'un livre </h2>
	</div>
</br>
		<form method="POST" action="">

<fieldset>
	<legend>Informations</legend></br>
	 <label id="connec" for="titre">Titre : </label><input type="text" name="titre" required></br></br>
	 <label id="connec" for="auteur">Auteur : </label><input type="text" name="auteur" required></br></br>
	 <label id="connec" for="editeur">Editeur : </label><input type="text" name="editeur" required></br></br>
	 <label id="connec" for="collection">Collection : </label><input type="text" name="collection" required></br></br>
	 <label id="connec" for="ISBN">Code ISBN : </label><input type="text" name="ISBN" onkeypress='return event.charCode >= 48 && event.charCode <= 57'></br></br>
	 <input type="submit" name="send" value="Ajouter"></br>
	 <input type="reset" value="Annuler"></br>
</fieldset>


<?php //Quentin 
						
if (count($_POST) == 0) {  } else {


function validTitre($titre) {
	return preg_match("/^[a-zA-Z- ']+$/", $titre);
}

function validAuteur($auteur) {
	return preg_match("/^[a-zA-Z- ']+$/", $auteur);
}

function validEditeur($editeur) {
	return preg_match("/^[a-zA-Z- ']+$/", $editeur);
}

function validCollection($collection) {
	return preg_match("/^[a-zA-Z- ']+$/", $collection);
}

function validIsbn($ISBN) {
	return strlen($ISBN) == 10;
}



$errors = array();
if (!validTitre($_POST['titre'])) $errors[] = 'Votre titre ne semble pas valide(sans accent).';
if (!validAuteur($_POST['auteur'])) $errors[] = 'Votre auteur ne semble pas valide(sans accent).';
if (!validEditeur($_POST['editeur'])) $errors[] = 'Votre editeur ne semble pas valide.';
if (!validCollection($_POST['collection'])) $errors[] = 'Votre collection ne semble pas valide.';
if (!validIsbn($_POST['ISBN'])) $errors[] = 'Veuillez fournir un code valide.';
if (count($errors) > 0) {
	echo 'Il y a des erreur dans votre formulaire : <br>';
	echo ' - ' . implode('<br> - ', $errors) . '<br><br>';
} else


						{
								

								$param = array(
								"titre" => $_POST["titre"],
								"auteur" => $_POST["auteur"],
								"editeur" => $_POST["editeur"],
								"collection" => $_POST["collection"],
								"ISBN" => $_POST["ISBN"],
							);

							$sql = $connexion->prepare('INSERT INTO livre (livre_titre, livre_auteur, livre_editeur, livre_collection, livre_ISBN)
													VALUES (:titre,:auteur,:editeur,:collection,:ISBN)');

							

							if($sql->execute($param)) {
								echo "Ajout OK";
								'<pre>';
								echo '</pre>';
							}

							else {
								echo "Erreur";
								print_r($req);
							}
						}


}
						?>
								 </p>
	</div>



</body>




</div>
</div>
<?php
include_once("includes3/footer3.php");
?>