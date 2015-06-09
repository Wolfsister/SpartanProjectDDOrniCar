<?php
$path='';
$title = '';
include '../pagetype/hautPage.php';
?>

<?php
//echo $_POST['date'];
if (isset($_POST)) {

        $villeDepart=$_POST['villeDepart'];
        $villeArrivee=$_POST['villeArrivee'];
        $date="";
        if(!empty($_POST['date'])){
            $date=$_POST['date'];
            //modifier et tester si villeArrivée rentrée 
            affichageTrajetPourReservation($villeDepart, $villeArrivee, $date);
        }else{
            if($villeArrivee==0){
                affichageTrajetPourReservationVilleDepart($villeDepart);               
            }else{
                affichageTrajetPourReservationVilleDepartArrivee($villeDepart, $villeArrivee);
            }
        } 

} else {
    echo 'Veuillez remplir les champs. <br />';
    echo '<a href ="./rechercheTrajet.php"> Retour à la recherche </a>';
}
?>



<?php

include '../pagetype/basPage.php';
?>