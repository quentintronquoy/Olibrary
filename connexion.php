<?php include_once("includes/header.php");
?>




<div id="menu">
			<ul>
				<li><a href="./index.php" accesskey="1" title="Page d'Accueil">Accueil</a></li>
				<li><a href="./emprunte.php" accesskey="2" title="Page de notre école">Livre emprunté</a></li>
				<li><a href="./reserver.php" accesskey="3" title="Fiche d'inscription">Réserver un livre</a></li>
				<li class="active"><a href="./reserver.php" accesskey="4" title="Connexion">Connexion</a></li>
	
		
	
</div>


<div class="title">
	  <h2> Connexion </h2>
	</div>
</br>
		<form method="POST" action="">

<fieldset>
	<legend>Informations</legend></br>
	 <label id="connec" for="nom">Nom</label><input type="text" name="nom" required></br></br>
	 <label id="connec" for="mdp">Mot de passe</label><input type="password" name="mdp" required> </br></br>
	 <input type="submit" name="submit" value="Connecter"></br>
</fieldset>
<?php

    if (isset($_POST['submit'])) 
    {
        if (empty($_POST['nom']) || empty($_POST['mdp']) ) // Oubli d'un champ
        {
            $message = '<p>Une erreur s\'est produite pendant votre identification.
      Vous devez remplir tous les champs</p>
      <p>Cliquez <a href="./index.php">ici</a> pour revenir</p>';
        }  else // On check le mot de passe
          {

              $query=$connexion->prepare('SELECT utilisateur_nom, utilisateur_mdp, utilisateur_ID FROM utilisateur WHERE Enseignant_nom = :nom');
              $query->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
              $query->execute();
              $data=$query->fetch();

              $query1=$connexion->prepare('SELECT admin_nom, admin_mdp, admin_ID FROM admin WHERE admin_nom = :nom');
              $query1->bindValue(':nom',$_POST['nom'], PDO::PARAM_STR);
              $query1->execute();
              $data1=$query1->fetch();

          if ($data['utilisateur_mdp'] ==  sha1($_POST['mdp'])) // Acces OK !
          {


    // // on teste si nos variables sont définies
    // if (isset($_POST['login']) && isset($_POST['mdp'])) {

    //   // on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
    //   if ($login_valide == $_POST['login'] && $mdp_valide == $_POST['mdp']) {
    //     // dans ce cas, tout est ok, on peut démarrer notre session

        // on la démarre émoticône smile
        //session_start ();
        // on enregistre les paramètres de notre visiteur comme variables de session ($login et $mdp) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
        $_SESSION['id'] = $data['utilisateur_ID'];
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['mdp'] = $_POST['mdp'];

        // on redirige notre visiteur vers une page de notre section membre
        header ('location: notes_professeur.php');

      } elseif ($data1['admin_mdp'] == sha1($_POST['mdp'])) {
      	

     	$_SESSION['id'] = $data1['admin_ID'];
        $_SESSION['nom'] = $_POST['nom'];
        $_SESSION['mdp'] = $_POST['mdp'];

        // on redirige notre visiteur vers une page de notre section membre
        header ('location: admin.php');

      }
      else {
        // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
        echo '<body onLoad="alert(\'Membre non reconnu...\')">';
        // puis on le redirige vers la page d'accueil
        //echo '<meta http-equiv="refresh" content="0;URL=accueil.php">';
      }
    }
    }
?>



</div>
</div>
<?php
include_once("includes/footer.php");
?>