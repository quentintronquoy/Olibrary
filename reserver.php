<?php include_once("includes/header.php");
?>

<div>
Regardez vos emprunts : <input type="submit" value="envoyer" name="go" />
</div>
<?php

   if(isset($_POST['go']) AND $_POST['go']=='envoyer') 
    {
			$query=$connexion->prepare('SELECT livre_exemplaire, emprunt_date, emprunt_retour 
			FROM emprunt
			WHERE utilisateur_id in ('".implode("','",$_SESSION['id'])."')')
			$query->execute();
    }  
    else 
    {
	        echo '<p> Vous n\'avez pas encore emprunté de livre</p>
	        <p>Cliquez <a href="./index.php">ici</a> pour revenir</p>';
	}
?>