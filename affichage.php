<?php include_once("./includes/header.php");
?>

<div id="menu">
      <ul>
        <li class="active"><a href="./index.php" accesskey="1" title="Page d'Accueil">Accueil</a></li>
        <li><a href="./emprunte.php" accesskey="2" title="Page de notre école">Livre emprunté</a></li>
        <li><a href="./reserver.php" accesskey="3" title="Fiche d'inscription">Réserver un livre</a></li>
        <li><a href="./connexion.php" accesskey="4" title="Connexion">Connexion</a></li>
  
    
  
</div>

<img id="banner" src="images/banner.jpeg">


<body>


<div class="title">

    <h1>Informations</h1>
 <?php
                      $sql = $connexion->prepare("SELECT * FROM livre WHERE livre_exemplaire ='".$_GET["id"]."'");
                      $sql->execute();
                      while ($donnees = $sql->fetch()) {
                        //print_r($donnees);
                        echo "numero exemplaire :";
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


         ?>

    

                  <h1><a href="./admin.php">Retour</a></h1>

                  </div>
                </div>

