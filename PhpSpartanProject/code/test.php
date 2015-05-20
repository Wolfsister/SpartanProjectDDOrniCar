<?php
$path = '';
$title = 'Test';
include '../pagetype/hautPage.php';
?>

<div class="container">
    <?php
    //var_dump($_SESSION);

    $date1 = date("d-m-Y");
    //echo $date;
    $heure = date("H-i");
    //echo $heure;
//    $datetime1 = new DateTime('2009-10-11');
//    $datetime2 = new DateTime('2009-11-13');
//    $interval = $datetime1->diff($datetime2);   // dt2 - dt1
//    echo $interval->format('%R%a days');
//    if( $datetime1<$datetime2){echo 'OK' ;}


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

    <?php
    include '../pagetype/basPage.php';
    ?>