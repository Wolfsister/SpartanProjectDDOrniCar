<?php

function enregistrerUtilisateurToutesInfos(){
    
}

function enregistrerUtilisateurSansVoiture(){
    
}

function connexionBdd(){
    $conn= new mysqli('localhost', 'root', '', 'testornicar');
    return $conn;
}

function passerConnecté(){
    $_SESSION['connected']='Yes';
}

function logout(){
    session_destroy();
    $_SESSION['connected']='No';
    
    //unset Cookies
    
    header('Location: ../code/index.php');
    
}

function isAlreadyRegistered($email,$pseudo,$nom,$prenom){
    $registered=false;
    //Pseudo existe deja => registered=true, echo pseudo deja utilisé
    //Email existe deja
    //Couple Nom/Prenom existe deja
    $co = connexionBdd();
    $rechercheMail = "SELECT * FROM user WHERE email='" . $email . "' ";
    $resultatMail = mysqli_query($co, $rechercheMail);
    $nbLignes = mysqli_num_rows($resultatMail);
    if($nbLignes=1){
        echo 'Cette adresse email est déjà utilisée.';
        $registered=true;
    }
    $recherchePseudo = "SELECT * FROM user WHERE pseudo='" . $pseudo . "' ";
    $resultatPseudo = mysqli_query($co, $recherchePseudo);
    $nbLignes = mysqli_num_rows($resultatPseudo);
    if($nbLignes=1){
        echo 'Ce pseudo est déjà utilisé.';
        $registered=true;
    }
    $rechercheNomPrenom = "SELECT * FROM user WHERE nom='" . $nom . "' AND prenom='".$prenom."' ";
    $resultatNomPrenom = mysqli_query($co, $rechercheNomPrenom);
    $nbLignes = mysqli_num_rows($resultatNomPrenom);
    if($nbLignes=1){
        echo 'Votre couple nom/prénom est déjà utilisé.';
        $registered=true;
    }
    return $registered;  
}

?>
