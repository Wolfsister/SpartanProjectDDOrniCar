<?php
$path = '';
$title = '';
include '../pagetype/hautPage.php';

$idTrajet = $_POST['idTrajet'];
$co = connexionBdd();
$reqText = "SELECT * FROM trajet WHERE idTrajet='" . $idTrajet . "'";
$tabTrajet = lectureTableauPhpResultatRequete(mysqli_query($co, $reqText));
$date = $tabTrajet['anneeMoisJour'][0];
$dateActuelle = date("Y-m-d");
?>

<div class="container">

    <?php
    if ($date <= $dateActuelle) {
       $prix=  getPrixByIdTrajet($idTrajet);
       $nbPassagers=count(getPassagersByIdTrajet($idTrajet));
       $montant=$nbPassagers*$prix;
       donnerArgent($_SESSION['id'], $montant);
       echo "Votre trajet a été validé, et votre compte crédité.";
    } else {
        echo "Vous ne pourrez valider ce trajet uniquement quand celui-ci sera effectué !";
    }
    ?>    


</div>


<?php
include '../pagetype/basPage.php';
?>