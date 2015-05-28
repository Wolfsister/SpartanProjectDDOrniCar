<?php
$path='';
$title='';
include '../pagetype/hautPage.php';
?>

<div class="container">

    <h1>Messages Recus:</h1>
    <?php include "lireMessageRecus.php"; ?>
    <h1>Messages Envoyés:</h1>
    <?php include "lireMessageEnvoyes.php"; ?>
    <h1>Envoyer Message:</h1>
    <?php include "envoiMessage.php"; ?>

</div>


<?php
include '../pagetype/basPage.php';
?>