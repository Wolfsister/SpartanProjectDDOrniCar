<?php
$title='';
include '../pagetype/hautPage.php';
?>

<?php

if (!empty($_POST)) {
    $erreur = false;

    if (empty($_POST["marque"])) {
        echo("Le champ marque est vide.<br/>");
        $erreur = true;
    }
    if (empty($_POST["modele"])) {
        echo("Le champ modèle est vide.<br/>");
        $erreur = true;
    }
    if (empty($_POST["couleur"])) {
        echo("Le champ couleur est vide.<br/>");
        $erreur = true;
    }
    
    if (empty($_POST["annee"])) {
        echo("Veuillez préciser une année de mise en circulation.<br/>");
        $erreur = true;
    }
    
    if ($_FILES['imvoiture']['error']==4) { // Erreur concernant la non-transmission de fichier
        echo("Veuillez choisir une photo de profil. <br/>");
        $erreur = true;
    }

    if ($erreur == true) {
        printf("<a href='add_voiture.php'> Retour à l'enregistrement de la voiture </a>");
    } else {
        //Récupération de la photo de profil de l'utilisateur
        $icone = $_FILES['imvoiture'];
        $iconeName = $icone['tmp_name'];
        $emplacementDeplacement = '../ressources/imagesVoitures/' . $_SESSION['pseudo'] . '.jpg';
        move_uploaded_file($iconeName, $emplacementDeplacement);

        // Ajout dans BDD
        insertIntoVoiture($_SESSION['id'], $_POST["marque"], $_POST["modele"], $_POST["couleur"], $_POST["annee"], $emplacementDeplacement);

        //Finalisation Inscription
    }
}
?>



<?php
include '../pagetype/basPage.php';
?>



