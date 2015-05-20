<?php
$path = '';
$title = '';
include '../pagetype/hautPage.php';
?>

<div class="container">

    // chercher tous les trajets où la date est antérieure à la date actuelle

    <?php
        $co = connexionBdd();
    $tabTousTrajets = array();
    $currentTime = date("Y-m-d");
    //Faire aussi test sur l'heure
    //En conducteur
    $reqTrajetsConducteur = "SELECT idTrajet FROM trajet as t WHERE anneeMoisJour<'" . $currentTime . "' AND t.idConducteur='" . $_SESSION['id'] . "' ";
    echo $reqTrajetsConducteur;
    $sqliCon = mysqli_query($co, $reqTrajetsConducteur);
    while ($resultCon = mysqli_fetch_array($sqliCon)) {
        foreach ($resultCon as $key => $value) {
            if (is_integer($key)) {
                $tabTousTrajets[] = $value;
            }
        }
    }


    //En passager
    $reqTrajetsPassager = "SELECT p.idTrajet FROM passager as p, trajet as t WHERE anneeMoisJour<'" . $currentTime . "' AND p.idPassager='" . $_SESSION['id'] . "' AND p.idTrajet=t.idTrajet ";
    echo $reqTrajetsPassager;
    $sqliPas = mysqli_query($co, $reqTrajetsPassager);
    while ($resultPas = mysqli_fetch_array($sqliPas)) {
        foreach ($resultPas as $key => $value) {
            if (is_integer($key)) {
                $tabTousTrajets[] = $value;
            }
        }
    }

    print_r($tabTousTrajets);
    ?>

</div>


    <?php
    include '../pagetype/basPage.php';
    ?>
