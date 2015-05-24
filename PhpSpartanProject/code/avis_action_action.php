<?php
$path='';
$title='';
include '../pagetype/hautPage.php';
?>

<div class="container">

<?php
var_dump($_POST);
$idUser=$_SESSION['id'];
$idTrajet=$_POST['idTrajet'];
$nbAvis=$_POST['nbPassager'];
echo "NbAvis= ".$nbAvis."   ";
for ($i = 1; $i <= $nbAvis ; $i++) {
    echo $i." <br />";
    $indexPersonneNotee="id".$i."";
    $idReceveur=$_POST[$indexPersonneNotee];
    $note=$_POST[$i];
    insertIntoAvis($idUser, $idReceveur, $idTrajet, $note);    
}

?>


</div>


<?php
include '../pagetype/basPage.php';
?>