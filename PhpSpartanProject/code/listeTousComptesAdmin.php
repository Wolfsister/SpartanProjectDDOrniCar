<?php
$path='';
$title='Tous Comptes OrniCar';
include '../pagetype/hautPage.php';
?>


<?php if($_SESSION['id']==1){ ?>
<div class="essaiDenis">
    <p>
    <h1>Comptes Créés sur OrniCar</h1>   

    <?php
    $co = connexionBdd();
    $sql = " SELECT * FROM user ";
    $result = mysqli_query($co, $sql) or die("Requete pas comprise");
    lectureTableauHtmlResultatRequete($result);
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