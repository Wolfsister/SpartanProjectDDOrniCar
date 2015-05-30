<?php
$path = '';
$title = '';
include '../pagetype/hautPage.php';
?>

<div class="container">

<div class="messageRecus">
    <h1>Messages Recus:</h1>
    <?php include "lireMessageRecus.php"; ?>
    <h1>Messages Envoyés:</h1>
    <?php include "lireMessageEnvoyes.php"; ?>
</div>

<div class="envoyerMessage">
    <h1>Envoyer Message:</h1>
    <?php include "envoiMessage.php"; ?>
</div>

<!--<div class="messageEnvoyes">
    <h1>Messages Envoyés:</h1>
    <?php //include "lireMessageEnvoyes.php"; ?>
</div>-->

</div>

<?php
include '../pagetype/basPage.php';
?>