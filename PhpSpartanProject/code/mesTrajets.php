<?php
$path='';
$title='';
include '../pagetype/hautPage.php';
?>

<div class="container">

    <?php
    
    $co=  connexionBdd();
    $reqSql= "SELECT * FROM trajet WHERE idConducteur='".$_SESSION['id']."' ORDER BY anneMoisJour";
    $reqConducteur=  mysqli_query($co, $reqSql);
    
    echo "En Conducteur";
    lectureTableauPhpResultatRequete($reqConducteur);
    ?>


</div>


<?php
include '../pagetype/basPage.php';
?>