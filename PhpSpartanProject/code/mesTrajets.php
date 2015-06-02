<?php
$path = '';
$title = '';
include '../pagetype/hautPage.php';
?>

<div class="container">

    <?php
    if ($_SESSION['connected'] == 1) {

        echo '<h2>En tant que conducteur : </h2>';
        $co = connexionBdd();
        $reqSqlC = "SELECT * FROM trajet WHERE idConducteur='" . $_SESSION['id'] . "' AND valide='0' ORDER BY anneeMoisJour";
        $reqConducteur = mysqli_query($co, $reqSqlC);

        $nbLignes1 = mysqli_num_rows($reqConducteur);
        if ($nbLignes1 == 0) {
            echo "Vous ne prenez part à aucun trajet en tant que conducteur.";
        } else {
            lectureTableauHtmlMesTrajetsConducteurResultatRequete($reqConducteur);
        }




        echo '<h2>En tant que passager : </h2>';
        $reqSqlP = "SELECT * FROM trajet as t, passager as p WHERE p.idPassager='" . $_SESSION['id'] . "' AND t.idTrajet=p.idTrajet ORDER BY anneeMoisJour";
        $reqPassager = mysqli_query($co, $reqSqlP);

        $nbLignes2 = mysqli_num_rows($reqConducteur);
        if ($nbLignes2 == 0) {
            echo "Vous ne prenez part à aucun trajet en tant que passager.";
        } else {
            lectureTableauHtmlResultatRequete($reqPassager);
        }
    } else {
        ?>
        <p>Veuillez d'abord vous connecter.</p>
    <?php } ?>

</div>


<?php
include '../pagetype/basPage.php';
?>