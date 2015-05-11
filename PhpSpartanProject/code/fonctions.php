<?php

function enregistrerUtilisateurToutesInfos(){
    
}

function enregistrerUtilisateurSansVoiture(){
    
}

function connexionBdd(){
    $conn= new mysqli('localhost', 'root', '', 'testornicar');
    return $conn;
}

?>
