<?php


include 'fonctions.php';

$contenu = $_POST['message'];
$pseudo = $_POST['pseudo'];

insertIntoMessage($pseudo, $contenu);

header('Location: boiteMessagerie.php');
?>
