<?php
if (!isset($_SESSION)) {
    session_start();
    if(empty($_SESSION['connected'])){
        $_SESSION['connected']=0;
    }
}
include '../code/fonctions.php';

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

    if ($_FILES['imvoiture']['error'] == 4) { // Erreur concernant la non-transmission de fichier
        echo("Veuillez choisir une photo de voiture. <br/>");
        $erreur = true;
    }

    if ($erreur == true) {
        printf("<a href='compte.php'> Retour à l'enregistrement de la voiture </a>");
    } else {
        //Récupération de la photo de profil de l'utilisateur
        $icone = $_FILES['imvoiture'];
        $iconeName = $icone['tmp_name'];
        $emplacementDeplacement = '../ressources/imagesVoitures/' . $_SESSION['id'] . '.jpg';
        move_uploaded_file($iconeName, $emplacementDeplacement);

        // Ajout dans BDD
        insertIntoVoiture($_SESSION['id'], $_POST["marque"], $_POST["modele"], $_POST["couleur"], $_POST["annee"], $emplacementDeplacement);

        //Finalisation Inscription
        header('Location: ../code/compte.php');
    }
}
?>

