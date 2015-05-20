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
    
    
    $currentTime=date("Y-m-d");
    $reqTrajets="SELECT * FROM trajet as t, passager as p WHERE anneeMoisJour<'".$currentTime."' AND ((t.idConducteur='".$_SESSION['id']."') OR (t.idTrajet=p.idTrajet AND p.idPassager='".$_SESSION['id']."')) ";
    echo $reqTrajets;
   
?>

<?php
include '../pagetype/basPage.php';
?>