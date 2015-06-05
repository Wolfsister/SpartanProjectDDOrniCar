<?php
$path = '';
$title = 'Tous Trajets OrniCar';
include '../pagetype/hautPage.php';
?>

<?php if($_SESSION['id']==1){ ?>
<div class="container">
    <p>
    <h1>Trajets Créés sur OrniCar</h1>   

    <?php
    $co = connexionBdd();
    $sql = " SELECT * FROM trajet ORDER BY anneeMoisJour ";
    $result = mysqli_query($co, $sql) or die("Requete pas comprise");
    //lectureTableauHtmlResultatRequete($result);
    lectureTableauHtmlTousTrajets($result);
    ?>
</p>
</div>

<?php }else{ ?>
    
<div classe="essaiDenis"><p>Désolé, vous n'êtes pas l'administrateur ! <a href='../code/index.php'>Cliquez-ici</a> pour revenir à l'accueil.</p></div>

<?php    
}
?>

<?php
include '../pagetype/basPage.php';
?>