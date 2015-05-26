<?php
$path='';
$title='';
include '../pagetype/hautPage.php';
?>

<div class="container">
    
    <?php
    var_dump($_POST);
    $idTrajet=$_POST['idTrajet'];
    $idUser=$_SESSION['id'];
    $prix=$_POST['prix'];
    if(participeAuTrajet($idUser, $idTrajet)==false){
        retirerArgent($idUser, $prix);
        insertIntoPassager($idUser, $idTrajet);
        enleverUnePlaceTrajet($idTrajet);
    }else{
        echo 'Vous participez déjà à ce trajet !';
    }
    ?>


</div>


<?php
include '../pagetype/basPage.php';
?>