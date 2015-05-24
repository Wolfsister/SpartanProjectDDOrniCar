<?php
$path='';
$title = '';
include '../pagetype/hautPage.php';
?>

<?php

if (isset($_POST)) {
    $erreurSaisie = false;
    if (empty($_POST["VilleDepart"])) {
        echo("Veuillez renseigner une ville de Départ.<br/>");
        $erreurSaisie = true;
    }

    if (empty($_POST["VilleArrivee"])) {
        echo("Veuillez renseigner une ville d'Arrivée.<br/>");
        $erreurSaisie = true;
    }

    if (empty($_POST["date"])) {
        echo("Veuillez renseigner une heure de départ.<br/>");
        $erreurSaisie = true;
    }
    if (empty($_POST["heure"])) {
        echo("Veuillez renseigner une heure de départ.<br/>");
        $erreurSaisie = true;
    }
    if (empty($_POST["minute"])) {
        echo("Veuillez renseigner une heure plus précise.<br/>");
        $erreurSaisie = true;
    }
    
    if (empty($_POST["prix"])) {
        echo("Veuillez renseigner un prix pour votre trajet.<br/>");
        $erreurSaisie = true;
    }
    
    if (empty($_POST["places"])) {
        echo("Veuillez indiquer le nombre de places disponibles pour votre trajet.<br/>");
        $erreurSaisie = true;
    }
    
    if ($erreurSaisie == true) {
        echo '<a href ="./proposerTrajet.php"> Retour à la connexion. </a>';
    }else{
        insertIntoTrajet($_SESSION['id'], $_POST['VilleDepart'], $_POST['VilleArrivee'], $_POST['prix'], $_POST['date'], $_POST['heure'], $_POST['minute'], $_POST['places']);
        echo 'Votre trajet a bien été enregistré !'; //A sortir du php et mettre dans un div container
    }
}    
    
?>



<?php

include '../pagetype/basPage.php';
?>