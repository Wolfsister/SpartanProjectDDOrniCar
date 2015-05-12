<?php
$title='';
include '../pagetype/hautPage.php';
?>

<?php

require_once './fonctions.php';

if (!empty($_POST)) {
//    echo var_dump($_POST);
//    echo var_dump($_FILES);
    $erreur = false;

    if (empty($_POST["nom"])) {
        echo("Le champ nom est vide.<br/>");
        $erreur = true;
    }
    if (empty($_POST["prenom"])) {
        echo("Le champ prenom est vide.<br/>");
        $erreur = true;
    }
    if (empty($_POST["pseudo"])) {
        echo("Le champ pseudo est vide.<br/>");
        $erreur = true;
    }
    if (empty($_POST["email"])) {
        echo("Le champ email est vide. <br/>");
        $erreur = true;
    }
    if (empty($_POST["mdp"])) {
        echo("Le champ mot de passe est vide. <br/>");
        $erreur = true;
    }
    if (empty($_POST["mdp2"])) {
        echo("Le champ de confirmation du mot de passe est vide. <br/>");
        $erreur = true;
    }

//    if ($_FILES["name"]=="") {
//        echo("Veuillez choisir une photo de profil. <br/>");
//        $erreur = true;
//    }

    if (!isset($_POST['accept'])) {
        echo("Vous devez accepter les Conditions Générales d'Utilisation pour pouvoir profiter d'OrniCar. <br/>");
        $erreur = true;
    }

    $existeDeja=  isAlreadyRegistered($_POST['email'], $_POST['pseudo'], $_POST['nom'], $_POST['prenom']);
    if($existeDeja==true){
        $erreur=true;
    }
    
    if ((($_POST['mdp']) != ($_POST['mdp2'])) && ($existeDeja==false)) {
        echo("La vérification de mot de passe ne correspond pas au mot de passe précédemment saisi. <br/>");
        $erreur = true;
    }

    if ($erreur == true) {
        printf("<a href='inscription.php'> Retour à l'inscription </a>");
    } else {
        $icone = $_FILES['icone'];
        $iconeName = $icone['tmp_name'];
        $iconeType = $icone["type"];
        $emplacementDeplacement = '../ressources/imagesProfiles/' . $_POST['pseudo'] . '.jpg';
        move_uploaded_file($iconeName, $emplacementDeplacement);

        // Ajout dans BDD
        $conn= new mysqli('localhost', 'root', '', 'testornicar');
//        if ($conn->connect_error) {
//            die("Connection failed: " . $conn->connect_error);
//        }
//        echo "Connected successfully";
        
        $insertion = "INSERT INTO user (idUser, nom, prenom, pseudo, motdepasse, email, idVoiture, photo, note, solde, age) VALUES (NULL, '".$_POST['nom']."', '". $_POST['prenom']."', '". $_POST['pseudo']."', '".$_POST['mdp']."', '".$_POST['email']."', NULL, '".$emplacementDeplacement."', NULL,'0',NULL)";
        mysqli_query($conn, $insertion);
        
        

        echo 'Félicitations pour votre inscription '.$_POST['prenom'].' '.$_POST['nom'].', ou '.$_POST['pseudo'].' devrais-je dire ! :)';
    }
}
?>



<?php
include '../pagetype/basPage.php';
?>



