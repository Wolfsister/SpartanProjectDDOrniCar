<?php
if (!isset($_SESSION)) {
    session_start();
    if(empty($_SESSION['connected'])){
        $_SESSION['connected']=0;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <?php
    if (!isset($path)) {
        $path = '';
    }

    include '../pagetype/head.php';
    echo '<body>';
    
// si mec connecté dans variable de session, afficher header de connecté, sinon afficher header de déconnecté
    if ($_SESSION['connected'] == 1) {
        include '../pagetype/headerConnected.php';
    } else {
        include '../pagetype/headerWhenDisconnected.php';
    }

    include '../pagetype/bannerOrnicar.html';
    include '../pagetype/mainMenuArea.php';
    ?>