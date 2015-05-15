<?php

$path = '';
$title = 'Test';
include '../pagetype/hautPage.php';
?>

<div class="essaiDenis">
<?php

//$co = connexionBdd();
//$sql2 = " SELECT * FROM user";
//$result2 = mysqli_query($co, $sql2) or die("Requete pas comprise");

$idDonneur='4';
$idReceveur='1';
$idTrajet='8';
if(aDonnéAvis($idDonneur, $idReceveur, $idTrajet)){echo 'avisDonné'; }else{ echo 'Pas avis';};

//echo '<pre>';
//print_r($tab2);
//echo '</pre>';
?>

</div>

<?php
include '../pagetype/basPage.php';
?>