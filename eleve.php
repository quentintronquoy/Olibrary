<?php 
include_once("../includes/header.php");
?>
<link href="../default.css" rel="stylesheet" type="text/css" media="all" />
<link href="../fonts.css" rel="stylesheet" type="text/css" media="all" />

<div id="menu">
 <ul>
  <li><a href="../index.php" accesskey="1" title="Page d'Accueil">Accueil</a></li>
  <li><a href="../notre_ecole.php" accesskey="2" title="Page de notre école">Notre école</a></li>
  <li><a href="../inscription.php" accesskey="3" title="Fiche d'inscription">Inscription</a></li>
   <li class="active"><a href="../espace_professeur.php" accesskey="4" title="l'Espace Etudiant">Espace Prof</a></li>
  <li><a href="../espace_etudiant.php" accesskey="4" title="l'Espace Etudiant">Espace Etudiant</a></li>
  <li ><a href="../contact.php" accesskey="6" title="Profnote">Contact</a></li>
  <li><a href="../includes/deconnexion.php" accesskey="5" title="Deconnexion">Deconnexion</a></li>
</ul>
</div>
</div>
</div>

<div class="wrapper">
	<div id="welcome" class="container">

    <div class="title">
     <h2> Administration </h2>
   </div>
   <div>

    <!--   Recheche : -->


    <h1>Recherche Etudiant</h1>
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
  

                      $sql = $connexion->prepare("SELECT * FROM eleve WHERE Eleve_nom LIKE '%$nom%' OR Eleve_prenom LIKE '%$nom%' ORDER BY Eleve_nom "); //trouve le nom et l'ajoute dans le WHERE pour n'afficher que ceux correspondant
                      $param = array(
                        'nom'=>$nom, 
                        );
                      $sql->execute($param);
                      echo "<table border='1'>";
                      while ($donnees = $sql->fetch()) {
                        echo "<tr>";
                        echo "<td>" .$donnees['Eleve_ID']."</td>" ;
                        echo "<td>" .$donnees['Eleve_prenom']."</td>" ;
                        echo "<td>" .$donnees['Eleve_nom']."</td>" ;
                        echo "<td><a href='../includes/modifier.php?id=".$donnees['Eleve_ID']."'><button>Modifier</button></a>"; //Ne pas oublier de creer modifier 
                        echo "<a href='../includes/delete.php?id=".$donnees['Eleve_ID']."'><button>Suppprimer</button></a>"; //Ne pas oublier de rajouter supprimer
                        echo "<a href='../includes/affichage.php?id=".$donnees['Eleve_ID']."'><button>Plus</button></a>";
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

                      $sql = $connexion->prepare('SELECT * FROM eleve');
                      $sql->execute();
                    echo "<table border='1'";
                      while ($donnees = $sql->fetch()) {


                        echo "<tr>";
                        echo "<td>" .$donnees['Eleve_ID']."</td>" ;
                        echo "<td>" .$donnees['Eleve_prenom']."</td>" ;
                        echo "<td>" .$donnees['Eleve_nom']."</td>" ;
                        echo "<td><a href='../includes/modifier.php?id=".$donnees['Eleve_ID']."'><button>Modifier</button></a>"; //Ne pas oublier de creer modifier 
                        echo "<a href='../includes/delete.php?id=".$donnees['Eleve_ID']."'><button>Suppprimer</button></a>"; //Ne pas oublier de rajouter supprimer
                        echo "<a href='../includes/affichage.php?id=".$donnees['Eleve_ID']."'><button>Plus</button></a>";
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
        bouton.innerHTML = "Cacher la liste";

    } else{
        div.style.display="none";
        bouton.innerHTML = "Liste des élèves";

    }
}    
</script>


  <form method="POST"><br>
    <input type="submit" name="PDF" value="Generation PDF">
  </form>

<?php
include '../fpdf/fpdf.php';// Alors ça c'est le moyen de générer le PDF !
if (isset($_POST['PDF'])) {
 
    class PDF extends FPDF
    {
        // En-tête
        function Header()
        {
            // Logo
            $this->Image('../images/logoRaisin2.png',10,6,30);
            // Police Arial gras 15
            $this->SetFont('Arial','B',20);
            // Décalage à droite
            $this->Cell(30,10,'EIV');
            $this->Cell(50);
            // Titre
            $this->Cell(30,10,'Bulletin',1,0,'C');
            // Saut de ligne
            $this->Ln(20);
        }

        // Pied de page
        function Footer()
        {
            // Positionnement à 1,5 cm du bas
            $this->SetY(-15);
            // Police Arial italique 8
            $this->SetFont('Arial','I',8);
            // Numéro de page
            //$this->Cell(0,10,'Page ',0,0,'C');
        }
    }

$sql = $connexion->prepare("SELECT * 
                            FROM eleve e
                            LEFT OUTER JOIN bulletin b
                            ON e.Eleve_ID = b.Bulletin_ID");
                      $sql->execute();
                      $donnees = $sql->fetch();
                        var_dump($donnees);
$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Ln(20);
$pdf->Cell(40,10,"ID",1,0,'C');
$pdf->Cell(40,10,$donnees['Bulletin_ID'],1,0,'C');
$pdf->Ln();
$pdf->Cell(40,10,"Nom",1,0,'C');
$pdf->Cell(40,10,$donnees['Eleve_nom'],1,0,'C');
$pdf->Ln(50);
$pdf->Cell(40,10,$donnees['notes'],1,0,'C');
$pdf->SetY(-50);
$pdf->Cell(40,10,$donnees['appreciation'],1,0,'C');
$pdf->Output('../candidatures/test.pdf','F'); 
echo "Generation Effectué";
                      }

?>

<script type="text/javascript">
function cache(bouton, id){
  var div=document.getElementById(id);
    if(div.style.display=="none"){
        div.style.display="block",
        bouton.innerHTML = "Cacher la liste";

    } else{
        div.style.display="none";
        bouton.innerHTML = "Liste des élèves";

    }
</script>
<br><br>
<input type="button" name="lien1" value="Ajouter un nouveau" onclick="self.location.href='../includes/ajouter.php'" style="background-color:grey" style="color:white; font-weight:bold"onclick> 
<input type="button" name="lien1" value="Retour" onclick="self.location.href='../admin.php'" style="background-color:grey" style="color:white; font-weight:bold"onclick> 
               
                  </div>
                </div>

                <?php
                //    php include("threecolumn.html");
                ?>
                <?php
                //php include_once("includes/footer.php")
                ?>
