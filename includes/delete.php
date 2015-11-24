<?php //connexion base de donnée

                  try{
                    $connexion = new PDO("mysql:host=127.0.0.1;dbname=library", "root","");
                    $connexion->query("SET NAMES UTF8");
                  } catch (PDOException $e) {
                    echo "Echec lors de la connexion :" . $e->getMessage();
                    die();
                  }

            ?>
            <?php
				if (isset($_GET['id']) )
			{
			$sql=$connexion->query("DELETE FROM livre WHERE livre_exemplaire='".$_GET["id"]."'");
			        header("location:../admin.php");
			
				if (!$sql)
				{
			        die('Requête invalide : ' . mysql_error());
			        header("location:../admin.php");
			    }
			}


?>