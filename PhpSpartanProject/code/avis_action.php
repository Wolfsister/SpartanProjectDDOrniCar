<?php
$path='';
$title='';
include '../pagetype/hautPage.php';
?>

<div class="container">
 
    
<?php 
$idTrajet=$_POST['idTrajet'];
echo $idTrajet;
$idUser=$_SESSION['id'];
affichagePersonnesPourAvis($idTrajet, $idUser);
?>

</div>


<?php
include '../pagetype/basPage.php';
?>