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
<h1>Recherche D'un Livre</h1>
<a href="liste.php">Liste des Emprunts</a>
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
                      echo "<table border='1' id='liste'>";
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

                    
                    <h1 id="affichage">Affichage</h1>


                    <button onclick="cache(this, 'aCacher');" type="button" value="liste"/>Liste des Livres</button>
                   
                    <div id="aCacher" style="display:none;"> 
                    <?php

                      $sql = $connexion->prepare('SELECT * FROM livre');
                      $sql->execute();
                    echo "<table border='1'";
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

<div>
<form method="POST" id="ajout">
<fieldset>
  <legend> Ajout d'un nouveau utilisateur :</legend></br>
   <label id="connec" for="utilisateur_prenom">Prenom :</label><input type="text" name="prenom"></br></br>
   <label id="connec" for="utilisateur_nom">Nom :</label><input type="text" name="nom"></br></br>
   <label id="connec" for="utilisateur_adresse">Adresse :</label><input type="text" name="adresse"> </br></br>
   <label id="connec" for="utilisateur_numero">Numero :</label><input type="text" name="numero"> </br></br>
   <label id="connec" for="utilisateur_mdp">Mot de passe :</label><input type="password" name="mdp"> </br></br>
   <input type="submit" name="validation" value="ajouter"></br>
</fieldset>
</form>
</div>

<div>
<form method="POST" id="supprimer">
<fieldset>
  <legend> Supprimer un utilisateur :</legend></br>
   <label id="connec" for="utilisateur_prenom2">Prenom</label><input type="text" name="prenom2" required></br></br>
   <label id="connec" for="utilisateur_nom2">Nom</label><input type="text" name="nom2" required></br></br>
   <input type="submit" name="send2" value="Supprimer"></br>
</fieldset>
</form>
</div>
<?php
// $param2 = array('utilisateur_nom'=>'a',
//   'utilisateur_prenom'=>'a',
//   'utilisateur_adresse'=>'a',
//   'utilisateur_numero'=>'1',
//   'utilisateur_mdp'=>'a'
//   );
// $query=$connexion->prepare('INSERT INTO utilisateur(utilisateur_nom, utilisateur_prenom, utilisateur_adresse, utilisateur_numero, utilisateur_mdp)
//       VALUES (:utilisateur_nom, :utilisateur_prenom, :utilisateur_adresse, :utilisateur_numero, :utilisateur_mdp)');
//               $query->execute($param2);
//               var_dump($query);

 if (isset($_POST['validation'])){ // Pour ajouter un utilisateur
 

if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['adresse']) AND !empty($_POST['numero']) AND !empty($_POST['mdp'])) { 
          echo "<h1>Compte créer félicitation !</h1>";
   
            $query=$connexion->prepare('INSERT INTO utilisateur(utilisateur_nom, utilisateur_prenom, utilisateur_adresse, utilisateur_numero, utilisateur_mdp)
      VALUES (:nom, :prenom, :adresse, :numero, :mdp)');
            $param2 =  array(
              'nom' => $_POST['nom'],
              'prenom' => $_POST['prenom'],
              'adresse' => $_POST['adresse'],
              'numero' => $_POST['numero'],
              'mdp' => sha1($_POST['mdp']) 
              );
              $query->execute($param2);

} else {echo "<h1>Champ incomplet</h1>";}
}

if (isset($_POST['send2']))  // Pour supprimer un utilisateur
{
     if (empty($_POST['nom2']) || empty($_POST['prenom2']) ) // Oubli d'un champ
        {
            $message = '<p>Une erreur s\'est produite pendant votre suppression.
      Vous devez remplir tous les champs</p>
      <p>Cliquez <a href="./index.php">ici</a> pour revenir</p>';
        }  else // On check le mot de passe 
        {
            $query=$connexion->prepare('DELETE FROM utilisateur WHERE utilisateur_nom = :nom2 AND utilisateur_prenom= :prenom2');
              $param3 = array(':nom2' => $_POST['nom2'], ':prenom2' => $_POST['prenom2']);
              $query->execute($param3);
              echo "utilisateur supprimé !";
        }
}
?>



    







          
</body>

</div>
</div>
<?php
include_once("includes/footer.php");
?>