<?php

$path = '';
$title = 'Test';
include '../pagetype/hautPage.php';
?>

<div class="essaiDenis">
<?php

$co = connexionBdd();
$sql2 = " SELECT * FROM trajet ";
$result2 = mysqli_query($co, $sql2) or die("Requete pas comprise");
lectureTableauHtmlResultatRequete($result2);
?>

</div>

<?php
include '../pagetype/basPage.php';
?>