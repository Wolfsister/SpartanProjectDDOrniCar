<?php

if (!isset($_SESSION)) {
    session_start();
    if (empty($_SESSION['connected'])) {
        $_SESSION['connected'] = 0;
    }
}
include 'fonctions.php';

//Insertion des avis dans la BDD
$idUser = $_SESSION['id'];
$idTrajet = $_POST['idTrajet'];
$nbAvis = $_POST['nbPassager'];

for ($i = 1; $i <= $nbAvis; $i++) {
    $indexPersonneNotee = "id" . $i . "";
    $idReceveur = $_POST[$indexPersonneNotee];
    $note = $_POST[$i];
    insertIntoAvis($idUser, $idReceveur, $idTrajet, $note);
    updateNote(calculNoteMoyenne($idReceveur), $idReceveur); //Met à jour la note moyenne du receveur
//Créditation du compte du donneur d'avis (si conducteur)
    if (isDriver($idUser, $idTrajet)) {
        $co = connexionBdd();
        $textPrixTrajet = " SELECT * FROM trajet WHERE idTrajet='" . $idTrajet . "' ";
        $tab = lectureTableauPhpResultatRequete(mysqli_query($co, $textPrixTrajet));
        $prix = $tab['prix'][0];

        donnerArgent($idUser, $prix);
    }
}

//redirection('./compte.php');
//Rajouter un message pour dire que les avis ont bien été laissés avant de faire la redirection.  OU bien ne pas faire redirection et juste afficher message ?

?>
