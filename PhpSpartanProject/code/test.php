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


//    $tabIdTrajet=  recupererIdTrajetsEnTab($_SESSION['id']);
//    print_r($tabIdTrajet);
    $tabIdTrajet=  recupererIdTrajetsEnTab('35');
    
    echo '<table><tr><th>Ville de Départ</th><th>Ville d\'Arrivée</th><th>Date</th><th>Prix</th><th>Donner Avis</th></tr>';
    foreach ($tabIdTrajet as $key => $value) {
        affichageTrajetPourAvis($value);
    }
    
    echo '</table>';
    
    
    
    ?>

    <?php
    include '../pagetype/basPage.php';
    ?>