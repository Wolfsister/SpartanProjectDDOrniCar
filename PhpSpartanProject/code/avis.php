<?php
$path = '';
$title = '';
include '../pagetype/hautPage.php';
?>

<div class="container">

    <?php
    $tabIdTrajet = recupererIdTrajetsEnTab($_SESSION['id']);

    echo '<table><tr><th>Ville de Départ</th><th>Ville d\'Arrivée</th><th>Date</th><th>Prix</th><th></th></tr>';
    foreach ($tabIdTrajet as $key => $value) {
        affichageTrajetPourAvis($value);
    }

    echo '</table>';
    ?>

</div>


<?php
include '../pagetype/basPage.php';
?>
