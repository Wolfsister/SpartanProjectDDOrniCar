<?php
$path='/code/avis.php/';
$title='';
include '../pagetype/hautPage.php';
?>

<div class="container">
 
    
<?php 
$idUser=$_SESSION['id'];
$idTrajet=$_POST['idTrajet'];
affichagePersonnesPourAvis($idTrajet, $idUser);
?>

</div>


<?php
include '../pagetype/basPage.php';
?>