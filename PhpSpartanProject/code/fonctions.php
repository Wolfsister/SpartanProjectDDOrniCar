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

function isAlreadyRegistered(){
    $registered=false;
    //Pseudo existe deja => registered=true, echo pseudo deja utilisé
    //Email existe deja
    //Couple Nom/Prenom existe deja
    
}

?>
