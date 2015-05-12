<!DOCTYPE html>
<html lang="fr">
<?php
include '../pagetype/head.php';
echo '<body>';
// si mec connecté dans variable de session, afficher header de connecté, sinon afficher header de déconnecté
if($_SESSION['connected']==1){
    include '../pagetype/headerConnected.php';
    //echo 'headerConnected';
}else{
    include '../pagetype/headerWhenDisconnected.php';
    //echo 'headerDisconnected';
}    

include '../pagetype/bannerOrnicar.html';
include '../pagetype/mainMenuArea.html';
?>