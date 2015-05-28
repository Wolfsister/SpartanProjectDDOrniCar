<?php
$path='';
$title='';
include '../pagetype/hautPage.php';
?>

<div class="container">

<?php

marquerMesssageLu($_POST['idMessage']);
echo $_POST['contenu'];



?>

</div>


<?php
include '../pagetype/basPage.php';
?>