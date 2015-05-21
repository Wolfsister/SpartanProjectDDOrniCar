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
//    $requete = " SELECT * FROM passager WHERE idTrajet=9 ";
//    $reqSql = mysqli_query($co, $requete);
//    $tabC = lectureTableauPhpResultatRequete($reqSql);

//    $tab=  getUserById(1);
//    
//    print_r($tab);

    affichagePersonnesPourAvis(9, 4);
    
    ?>

    <?php
    include '../pagetype/basPage.php';
    ?>