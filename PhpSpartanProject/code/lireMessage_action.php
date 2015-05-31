<?php
$path = '';
$title = '';
include '../pagetype/hautPage.php';
?>


<div class="container">

    <?php
    if ($_POST['recu'] == 'oui') {
        marquerMesssageLu($_POST['idMessage']);
    }
//echo 'Date Envoi: '.$_POST['date'].'<br />';
    echo 'Date Envoi: ' . date('d-m-Y', strtotime($_POST['date'])) . '<br />';
    $idMessage = $_POST['idMessage'];
    echo getContenuByidMessage($idMessage);
    ?>

</div>



<?php
include '../pagetype/basPage.php';
?>
