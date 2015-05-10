<!DOCTYPE html>
<html lang="fr">
<?php
include '../pagetype/head.php';
echo '<body>';
// si mec connecté dans variable de session, afficher header de connecté, sinon afficher header de déconnecté
include '../pagetype/headerWhenDisconnected.php';
include '../pagetype/bannerOrnicar.html';
include '../pagetype/mainMenuArea.html';
?>