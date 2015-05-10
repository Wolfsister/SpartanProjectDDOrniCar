<?php

function enregistrerUtilisateurToutesInfos(){
    
}

function enregistrerUtilisateurSansVoiture(){
    
}

function connexionBdd(){
    $conn= new mysqli('localhost', 'username', 'password', 'bddname');
    return $conn;
}

?>
