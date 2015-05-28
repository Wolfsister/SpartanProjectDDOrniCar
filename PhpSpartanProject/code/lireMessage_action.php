

<div class="container">

<?php

marquerMesssageLu($_POST['idMessage']);

//echo 'Date Envoi: '.$_POST['date'].'<br />';
echo 'Date Envoi: '.date('d-m-Y',strtotime($_POST['date'])).'<br />';
echo $_POST['contenu'];



?>

</div>

