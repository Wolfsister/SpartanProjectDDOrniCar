<?php
$path='';
$title='';
include '../pagetype/hautPage.php';

$idTrajet = $_POST['idTrajet'];
$co = connexionBdd();
$reqText = "SELECT * FROM trajet WHERE idTrajet='" . $idTrajet . "'";
$tabTrajet = lectureTableauPhpResultatRequete(mysqli_query($co, $reqText));
$date = $tabTrajet['anneeMoisJour'][0];
$dateActuelle = date("Y-m-d");
?>

<div class="container">



</div>


<?php
include '../pagetype/basPage.php';
?>