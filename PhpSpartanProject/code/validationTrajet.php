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
//    if ($date <= $dateActuelle) {
        if (isAlreadyValide($idTrajet)) {
            echo "Vous avez déjà validé ce trajet !";
        } else {
            $prix = getPrixByIdTrajet($idTrajet);
            $nbPassagers = nombrePassagersTrajet($idTrajet);
            $montant = $nbPassagers * $prix;
            donnerArgent($_SESSION['id'], $montant);
            echo "Votre trajet a été validé, et votre compte crédité de ".$montant." €.";
            validerTrajet($idTrajet);
        }
//    } else {
//        echo "Vous ne pourrez valider ce trajet uniquement quand celui-ci sera effectué !";
//    }
    ?>    


</div>


<?php
include '../pagetype/basPage.php';
?>