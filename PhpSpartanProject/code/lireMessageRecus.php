
<div class="container">

<?php    
    
$co = connexionBdd();
//MESSAGES RECUS
$requeteTextRecus = " SELECT * FROM message WHERE idReceveur='" . $_SESSION['id'] . "' ORDER BY idMessage DESC ";
$reqRecus = mysqli_query($co, $requeteTextRecus);
$nbLignes = mysqli_num_rows($reqRecus);
$tabRecus = lectureTableauPhpResultatRequete($reqRecus);


echo "<table id='tableMessagesRecus' class='tableauAffichageBDD'><tr><th>Photo</th><th>Pseudo</th><th>Date</th><tr>"; //Mettre select note à la fin



for ($index = 0; $index < $nbLignes; $index++) {
    echo "<form method='post' action='lireMessage_action.php'>";
    $lu=$tabRecus["lu"][$index];
    //Si non lu, griser la ligne
    
    $pseudo=  getPseudoById($tabRecus['idEnvoyeur'][$index]);
    $date= $tabRecus['date'][$index];
    $idMessage=$tabRecus['idMessage'][$index];
    $photo = '<img src="../ressources/imagesProfiles/' . $tabRecus["idEnvoyeur"][$index] . '.jpg" width="40px" heigth="40px" />';
    $btSubmit = '<div id="boutonMessage" class="col-md-12 col-xs-12 col-sm-12"><button type="submit" class="btn btn-default btn-lg btn-block" name="register">Lire Message</button> ';

    echo '<tr><td>' . $photo . '</td><td>' . $pseudo . '</td><td>' . $date . '</td><td>'.$btSubmit.'</td></tr>';
    echo '<input type="hidden" name="contenu" value=' . $tabRecus['contenu'][$index] . ' />';
    echo '<input type="hidden" name="idMessage" value=' . $idMessage . ' />';
    echo '<input type="hidden" name="recu" value="oui" />';
    echo '<input type="hidden" name="date" value=' . $date . ' /></form>'; //Value donne l'ID de la perosnne notée
}

echo "</table>";

?>


</div>









