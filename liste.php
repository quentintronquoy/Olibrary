<?php include_once("includes/header.php");
?>




<div id="menu">
			<ul>
				<li class="active"><a href="./admin.php" accesskey="2" title="Liste">Liste</a></li>
				<li><a href="./ajout.php" accesskey="3" title="Ajout">Ajout</a></li>
				<li><a href="../connexion.php" accesskey="4" title="Décconnexion">Déconnexion</a></li>
	
		
	
</div>

<body>


<h1>Emprunt</h1>
 <?php
                      $sql = $connexion->prepare("SELECT * FROM emprunt ");
                      $sql->execute();

                      while ($donnees = $sql->fetch()) {
                        //print_r($donnees);
                        echo "Emprunt id :";
                        echo $donnees['emprunt_id']."<br>" ;
                        echo "Date emprunt :";
                        echo $donnees['emprunt_date']."<br>" ;
                        echo "Date retour :";
                        echo $donnees['emprunt_retour']."<br>" ;
                        echo "Livre exmplaire :";
                        echo $donnees['livre_exemplaire']."<br>" ;
                        echo "Utilisateur numéro de compte :";
                        echo $donnees['utilisateur_numdecompte']."<br>" ;
                        echo "Utilisateur numéro de compte :";
                        echo $donnees['utilisateur_numdecompte_1']."<br>" ; //affiche le table
                        echo"</br>";
                      }


         ?>




</body>




</div>
</div>
<?php
include_once("includes/footer.php");
?>