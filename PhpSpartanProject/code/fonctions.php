<?php

function enregistrerUtilisateurToutesInfos() {
    
}

function enregistrerUtilisateurSansVoiture() {
    
}

function connexionBdd() {
    $conn = new mysqli('localhost', 'root', '', 'testornicar');
    return $conn;
}

function passerConnecté() {
    $_SESSION['connected'] = 'Yes';
}

function logout() {
    session_destroy();
    $_SESSION['connected'] = 'No';

    //unset Cookies

    header('Location: ../code/index.php');
}

function isAlreadyRegistered($email, $pseudo, $nom, $prenom) {
    $registered = false;
    //Pseudo existe deja => registered=true, echo pseudo deja utilisé
    //Email existe deja
    //Couple Nom/Prenom existe deja
    $co = connexionBdd();
    $rechercheMail = "SELECT * FROM user WHERE email='" . $email . "' ";
    $resultatMail = mysqli_query($co, $rechercheMail);
    $nbLignesMail = mysqli_num_rows($resultatMail);
    if ($nbLignesMail == 1) {
        echo 'Cette adresse email est déjà utilisée. <br />';
        $registered = true;
    }
    $recherchePseudo = "SELECT * FROM user WHERE pseudo='" . $pseudo . "' ";
    $resultatPseudo = mysqli_query($co, $recherchePseudo);
    $nbLignesPseudo = mysqli_num_rows($resultatPseudo);
    if ($nbLignesPseudo == 1) {
        echo 'Ce pseudo est déjà utilisé. <br />';
        $registered = true;
    }
    $rechercheNomPrenom = "SELECT * FROM user WHERE nom='" . $nom . "' AND prenom='" . $prenom . "' ";
    $resultatNomPrenom = mysqli_query($co, $rechercheNomPrenom);
    $nbLignesCouple = mysqli_num_rows($resultatNomPrenom);
    if ($nbLignesCouple == 1) {
        echo 'Votre couple nom/prénom est déjà utilisé. <br />';
        $registered = true;
    }
    return $registered;
}

function logRightAfterRegister($pseudo) {
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['connected'] = 1;
    header('Location: ../code/compte.php');
}

function logClassic($email) {
    
    $co = connexionBdd();
    $rechercheMail = "SELECT * FROM user WHERE email='" . $email . "' ";
    $tabResultat=mysqli_fetch_array(mysqli_query($co, $rechercheMail));
    
    $_SESSION['connected'] = 1;
    $_SESSION['pseudo'] = $tabResultat['pseudo'];
    var_dump($_SESSION);
    echo 'connected =' . $_SESSION['connected'];
    header('Location: ../code/compte.php');
}

?>
