<?php

$path = '';
$title = 'Test';
include '../pagetype/hautPage.php';
?>

<div class="container">
<?php

//$co = connexionBdd();
//$sql2 = " SELECT * FROM user";
//$result2 = mysqli_query($co, $sql2) or die("Requete pas comprise");


//DONNERAVIS('5', '4', '9', '2');
//
//CALCULNOTEMOYENNE('4');


$idTrajet='9';
echo nombrePlacesRestantes($idTrajet);


//echo '<pre>';
//print_r($tab2);
//echo '</pre>';
?>

</div>

<?php
include '../pagetype/basPage.php';
?>