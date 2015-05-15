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


donnerAvis('5', '4', '9', '2');

calculNoteMoyenne('4');


//echo '<pre>';
//print_r($tab2);
//echo '</pre>';
?>

</div>

<?php
include '../pagetype/basPage.php';
?>