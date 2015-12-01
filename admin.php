<?php include_once("includes/header.php");
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
<h1>Recherche D'un Livre</h1>
    <p>
      <form method="POST">
       Recherche :<input type="text" name="nom">          
       <input id="connect"  type="submit" name="send" value="Rechercher">
     </form>
   </p>


                  
                  <?php
                  //PARTI NOM
  if (isset($_POST['send']) && !empty($_POST['nom'])) {

    echo "Terme rechercher :";
    echo $_POST['nom'];
    echo "</br>";
    echo "<h1>Resultat :</h1>";
    echo "</br>";

    $nom = $_POST['nom'];
  

                      $sql = $connexion->prepare("SELECT * FROM livre WHERE livre_titre LIKE '%$nom%' OR livre_auteur LIKE '%$nom%' OR livre_exemplaire LIKE '%$nom%' ORDER BY livre_titre "); //trouve le nom et l'ajoute dans le WHERE pour n'afficher que ceux correspondant
                      $param = array(
                        'nom'=>$nom, 
                        );
                      $sql->execute($param);
                      echo "<table border='1'>";
                      while ($donnees = $sql->fetch()) {
                        echo "<tr>";
                        echo "<td>" .$donnees['livre_exemplaire']."</td>" ;
                        #echo "<td>" .$donnees['livre_prenom']."</td>" ;
                        echo "<td>" .$donnees['livre_titre']."</td>" ;
                        echo "<td><a href='./modifier.php?id=".$donnees['livre_exemplaire']."'><button>Modifier</button></a>"; //Ne pas oublier de creer modifier 
                        echo "<a href='./includes/delete.php?id=".$donnees['livre_exemplaire']."'><button>Suppprimer</button></a>"; //Ne pas oublier de rajouter supprimer
                        echo "<a href='./affichage.php?id=".$donnees['livre_exemplaire']."'><button>Plus</button></a>";
                        #echo "<td>" .$donnees['livre_prenom']."</td>" ;
                        echo "</tr>";
                        echo "</tr>";
                      }
                      echo "</table>";

                    }
                    ?>
                    <!-- Affichage : modifier / supprimer -->

                    <h1>Affichage</h1>


                    <button onclick="cache(this, 'aCacher');" type="button" value="liste"/>Liste des élèves</button>
                   
                    <div id="aCacher" style="display:none;"> 
                    <?php

                      $sql = $connexion->prepare('SELECT * FROM livre');
                      $sql->execute();
                    echo "<table border='1'";
                      while ($donnees = $sql->fetch()) {


                        echo "<tr>";
                        echo "<td>" .$donnees['livre_exemplaire']."</td>" ;
                        echo "<td>" .$donnees['livre_auteur']."</td>" ;
                        echo "<td>" .$donnees['livre_titre']."</td>" ;
                        echo "<td><a href='../includes/modifier.php?id=".$donnees['livre_exemplaire']."'><button>Modifier</button></a>"; //Ne pas oublier de creer modifier 
                        echo "<a href='../includes/delete.php?id=".$donnees['livre_exemplaire']."'><button>Suppprimer</button></a>"; //Ne pas oublier de rajouter supprimer
                        echo "<a href='../includes/affichage.php?id=".$donnees['livre_exemplaire']."'><button>Plus</button></a>";
                        echo "</tr>";
                        



                        //echo "<a href='modifier.php?id=".$donnees['id']."'><button>Modifier</button></a>"; //Ne pas oublier de creer modifier 
                        //echo "<a href='delete.php?id=".$donnees['id']."'><button>Suppprimer</button></a>"; //Ne pas oublier de rajouter supprimer
                        echo"</tr>";


                      }
                        echo "</table>";
                    
                      ?>
                      </form>

                    </div>
<script type="text/javascript">
function cache(bouton, id){
  var div=document.getElementById(id);
    if(div.style.display=="none"){
        div.style.display="block",
        bouton.innerHTML = "Cacher la Liste";

    } else{
        div.style.display="none";
        bouton.innerHTML = "Liste des Livres";

    }
}    



</script>


<br><br>
<input type="button" name="lien1" value="Ajouter un nouveau" onclick="self.location.href='./admin/ajout.php'" style="background-color:grey" style="color:white; font-weight:bold"onclick> 
<input type="button" name="lien1" value="Retour" onclick="self.location.href='../index.php'" style="background-color:grey" style="color:white; font-weight:bold"onclick> 
</div>


<fieldset>
  <legend> Ajout d'un nouveau utilisateur </legend></br>
   <label id="connec" for="utilisateur_nom">Nom</label><input type="text" name="utilisateur_nom" required></br></br>
   <label id="connec" for="utilisateur_nom">Nom</label><input type="text" name="utilisateur_nom" required></br></br>
   <label id="connec" for="utilisateur_mdp">Mot de passe</label><input type="password" name="utilisateur_mdp" required> </br></br>
   <input type="submit" name="send" value="Connecter"></br>
</fieldset>
<?php
 if (empty($_POST['utilisateur_nom']) || empty($_POST['utilisateur_prenom']) || empty($_POST['utilisateur_mdp']) ) //Oublie d'un champ
    {
        $message = '<p>Une erreur s\'est produite pendant votre identification.
  Vous devez remplir tous les champs</p>
  <p>Cliquez <a href="./index.php">ici</a> pour revenir</p>';
    }  else //On check le mot de passe
      {$query=$connexion->prepare('INSERT INTO utilisateur (utilisateur_nom, utilisateur_prenom, utilisateur_adresse, utilisateur_numero, utilisateur_mdp)
  VALUES
  ('GROSBILL', 'Frank', '1978-06-24', '' ),
  ('BOBY', 'Stromae', '1930-01-23', '1982-03-10'),
  ('PIGEON', 'Tronqu', '1991-07-07', '2015-11-17'),
  ('AIRBUS', 'Rebecca', '1880-09-02', ''),
  ('FAGGOT', 'Jean-Pierre', '1966-06-06', ''),
  ('FAT', 'Bob', '1978-02-03', ''),
  ('IJAIL', 'Pauline', '1990-10-04', ''),
  ('REMI', 'Kevin', '1943-11-15', '2004-12-13'),
  ('JACOB', 'Michel', '1955-12-25', ''),
  ('DUGAL', 'Abdul', '1970-11-04', '2015-11-14');
          $query->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
          $query->execute();
          $data=$query->fetch();


?>
          
</body>

</div>
</div>
<?php
include_once("includes/footer.php");
?>