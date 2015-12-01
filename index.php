<?php include_once("includes/header.php");
?>




<div id="menu">
			<ul>
				<li class="active"><a href="./index.php" accesskey="1" title="Page d'Accueil">Accueil</a></li>
				<li><a href="./connexion.php" accesskey="4" title="Connexion">Connexion</a></li>
	
		
	
</div>

<img id="banner" src="images/banner.jpeg">


<body>


<div class="title">
	  <h2>Bienvenue sur le site de OLibrary </h2>
		
		<p>  OLibrary est une base de donnée de livre. <br>
			
		</p>
</div>

<form method="POST" action="">

<fieldset>
	<legend>Informations</legend></br>
	 <label id="connec" for="livre_titre">Rechercher</label><input type="text" name="livre_titre" required></br></br>
	 <input type="submit" name="send" value="Recherche"></br>
</fieldset>

</form>

<?php

if (isset($_POST['send']) && !empty($_POST['livre_titre'])) {

    echo "Livre rechercher :";
    echo $_POST['livre_titre'];
    echo "</br>";
    echo "<h1>Resultat :</h1>";
    echo "</br>";

    $livre_titre = $_POST['livre_titre'];

                      $sql = $connexion->prepare("SELECT * FROM livre WHERE livre_titre = :livre_titre");
                      $param = array(
                        'livre_titre'=>$livre_titre, 
                        );
 //trouve le nom et l'ajoute dans le WHERE pour n'afficher que ceux correspondant
                      $sql->execute($param);
                      //echo "<table border='1'>";
                      while ($donnees = $sql->fetch()) {
                        //print_r($donnees);
                        echo "livre exemplaire :";
                        echo $donnees['livre_exemplaire']."<br>" ;
                        echo "auteur :";
                        echo $donnees['livre_auteur']."<br>" ;
                        echo "titre :";
                        echo $donnees['livre_titre']."<br>" ;
                        echo "editeur :";
                        echo $donnees['livre_editeur']."<br>" ;
                        echo "collection :";
                        echo $donnees['livre_collection']."<br>" ; //affiche le table
                        echo"</br>";
                      }
                      //echo "</table>";


}

?>








</div>
</div>
<?php
include_once("includes/footer.php");
?>