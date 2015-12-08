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
    <h1>Informations</h1>
 <?php
                      $sql = $connexion->prepare("SELECT * FROM livre WHERE livre_exemplaire ='".$_GET["id"]."'");
                      $sql->execute();
                      while ($donnees = $sql->fetch()) {
                        //print_r($donnees);
                        echo "Numéro exemplaire :";
                        echo $donnees['livre_exemplaire']."<br>" ;
                        echo "Auteur :";
                        echo $donnees['livre_auteur']."<br>" ;
                        echo "Titre :";
                        echo $donnees['livre_titre']."<br>" ;
                        echo "Editeur :";
                        echo $donnees['livre_editeur']."<br>" ;
                        echo "Collection :";
                        echo $donnees['livre_collection']."<br>" ; //affiche le table
                        echo"</br>";
                      }


         ?> 



        <form method="POST">
          <input type="text" name="nom" required placeholder="Auteur"/></br>
          <input type="text" name="prenom" required placeholder="Titre"/></br>
          <input type="text" name="adresse" required placeholder="Editeur"/></br>
          <input type="text" name="codepostal" required placeholder="Collection"/></br>
          <input type="hidden" name="id" value="<?php $_GET['id']?>">
          <input type="submit" name="send" value="Modifier"></br>
        </form>  
                      <?php

                       if (isset($_POST['send'])) 
                      {
                                

                                $param = array(
                                "nom" => $_POST["nom"],
                                "prenom" => $_POST["prenom"],
                                "adresse" => $_POST["adresse"],
                                "codepostal" => $_POST["codepostal"],
                                "id" => $_GET["id"],


                            );
                                

                            $req = $connexion->prepare("UPDATE livre SET livre_titre = :nom, livre_auteur = :prenom, livre_editeur = :adresse, livre_collection = :codepostal WHERE livre_exemplaire =:id");
                            $req->execute($param);

                                

                                 echo '<pre>';
                                 echo "Modification Effectuer <a href=\"affichage.php?id=".$param['id']."\">CLIQUER POUR POUR VOIR LES MODIFICATION</a>";
                                 echo '</pre>';
                            
                            

                          
                        }

 
                      $req = $connexion->prepare("SELECT * FROM emprunt WHERE livre_exemplaire='".$_GET["id"]."'");
                      $req->execute();
                      $count = $req->rowCount();
                      if ($count > 0) {
                      echo "Livre déjà emprunté";
                      } else {
                        echo '                
                        <form method="POST">
                           </br></br></br></br>
                          <h1>Emprunt</h1>
                          <input type="number" name="utilisateur_id" placeholder="ID utilisateur"></br>
                                <script type="text/javascript"> 
                                    d = new Date(); 
                                  document.write(d.toLocaleDateString()); 
                                </script></br>                  
                          <input type="submit" name="valide" value="Valide emprunt"><br>
                          <input type="number" name="emprunt_jour" value="7"placeholder="durée emprunt"></br>
                        </form>'
                ;}
                
                if (isset($_POST['valide']) AND !empty($_POST['utilisateur_id'])) {
                  $param = array(
                    "utilisateur_id"=>$_POST["utilisateur_id"],
                    "id"=>$_GET["id"],
                    "jour"=>$_POST["emprunt_jour"]
                    );

                  $req = $connexion->prepare("INSERT INTO emprunt 
                                                (emprunt_date, emprunt_retour, livre_exemplaire, utilisateur_numdecompte)
                                              VALUES 
                                                (NOW(),ADDDATE(NOW(), INTERVAL ".$param["jour"]." DAY), ".$param["id"].", ".$param["utilisateur_id"].")");
                  $req->execute($param);
                  var_dump($req);
                }
                ?>
    

                  <h1><a href="./admin.php">Retour</a></h1>

                  </div>
                </div>

</body>