<?php
$path='';
$title = '';
include '../pagetype/hautPage.php';
?>

<?php
//echo $_POST['date'];
if (isset($_POST)) {
    $erreurSaisie = false;
    if (empty($_POST["villeDepart"])) {
        echo("Veuillez renseigner une ville de Départ.<br/>");
        $erreurSaisie = true;
    }

    if (empty($_POST["villeArrivee"])) {
        echo("Veuillez renseigner une ville d'Arrivée.<br/>");
        $erreurSaisie = true;
    }

    if ($erreurSaisie == true) {
        echo '<a href ="./rechercheTrajet.php"> Retour à la recherche. </a>';
    }

    if ($erreurSaisie == false) {   
        $villeDepart=$_POST['villeDepart'];
        $villeArrivee=$_POST['villeArrivee'];
        $date=$_POST['date'];
         
        $co = connexionBdd();
        $rechercheTrajet = "SELECT * FROM trajet WHERE villeDepart='".$villeDepart."' AND villeArrivee='".$villeArrivee."' AND anneeMoisJour='".$date."' ";
        $resultat = mysqli_query($co, $rechercheTrajet);
        if (!$resultat) {
            printf("Error: %s\n", mysqli_error($co));
            exit();
        }
       
        $nbLignes = mysqli_num_rows($resultat); // Affiche le nombre de lignes de la requete
    
        
        if($nbLignes==0){
            echo 'Il n\'existe pas de trajet, désolé ! Proposez en un <a href="../code/proposerTrajet.php">ici</a> si vous le souhaitez !';
        }else{
            // affichage de tous les trajets
            affichageTrajetPourReservation($villeDepart, $villeArrivee, $date);
            
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