<?php

include 'fonctions.php';

//Insertion des avis dans la BDD
$idUser = $_SESSION['id'];
$idTrajet = $_POST['idTrajet'];
$nbAvis = $_POST['nbPassager'];

for ($i = 1; $i <= $nbAvis; $i++) {
    $indexPersonneNotee = "id" . $i . "";
    $idReceveur = $_POST[$indexPersonneNotee];
    $note = $_POST[$i];
    if ($note != 0) {
        insertIntoAvis($idUser, $idReceveur, $idTrajet, $note);
        updateNote(calculNoteMoyenne($idReceveur), $idReceveur); //Met à jour la note moyenne du receveur
    }
}

header('Location: compte.php');
//Rajouter un message pour dire que les avis ont bien été laissés avant de faire la redirection.  OU bien ne pas faire redirection et juste afficher message ?
?>
