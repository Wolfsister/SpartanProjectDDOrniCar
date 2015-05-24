<?php
if (!isset($_SESSION)) {
    session_start();
    if(empty($_SESSION['connected'])){
        $_SESSION['connected']=0;
    }
}
include 'fonctions.php';

$idUser= $_SESSION['id'];
$idTrajet=$_POST['idTrajet'];
$nbAvis=$_POST['nbPassager'];
for ($i = 1; $i <= $nbAvis ; $i++) {
    $indexPersonneNotee="id".$i."";
    $idReceveur=$_POST[$indexPersonneNotee];
    $note=$_POST[$i];
    insertIntoAvis($idUser, $idReceveur, $idTrajet, $note);    
}

redirection('./compte.php');

?>
