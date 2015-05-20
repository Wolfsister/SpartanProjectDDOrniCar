<?php
$path='';
$title='';
include '../pagetype/hautPage.php';
?>

<div class="container">

    // chercher tous les trajets où la date est antérieure à la date actuelle
    
    <?php
    $currentTime=date("Y-m-d");
    $reqTrajets="SELECT * FROM trajet as t, passager as p WHERE anneeMoisJour<'".$currentTime."' AND ((t.idConducteur='".$_SESSION['id']."') OR (t.idTrajet=p.idTrajet AND p.idPassager='".$_SESSION['id']."')) ";
    echo $reqTrajets;
    
    
    ?>

</div>


<?php
include '../pagetype/basPage.php';
?>
