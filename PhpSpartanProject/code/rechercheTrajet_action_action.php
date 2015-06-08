<?php
$path = '';
$title = '';
include '../pagetype/hautPage.php';
?>

<div class="container">

    <?php
    $idTrajet = $_POST['idTrajet'];
    $idUser = $_SESSION['id'];
    $prix = $_POST['prix'];
    if (participeAuTrajet($idUser, $idTrajet) == false) {
        retirerArgent($idUser, $prix);
        insertIntoPassager($idUser, $idTrajet);
        enleverUnePlaceTrajet($idTrajet);
        header ("Location: mesTrajets.php");
    } else {
        ?>
        <div class="row pplan" id="anim1">
            <div class="col-md-12 col-xs-12 col-sm-12  pplan">
                </br>
                </br>
                </br>
                <p>Vous participez déjà à ce trajet !</p>
                </br>
                </br>
            </div>
        </div>
        <?php
    }
    ?>


</div>


<?php
include '../pagetype/basPage.php';
?>