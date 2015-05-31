<?php
$path='';
$title='';
include '../pagetype/hautPage.php';
$idTrajet=$_POST['idTrajet'];
?>

<div class="container">

    
    <h1>Participants du trajet numéro <?php echo $idTrajet; ?>:</h1>
    <?php
    //Récupération du conducteur :
    $co=  connexionBdd();
    $reqConducteurTxt=" SELECT * FROM trajet WHERE idTrajet='".$idTrajet."'";
    $idConducteur=  lectureTableauPhpResultatRequete(mysqli_query($co, $reqConducteurTxt))['idConducteur'][0];
   
    //Récupération des passagers :
    $tabPassagers=  getPassagersByIdTrajet($idTrajet);
    
    echo '<h1>Conducteur :</h1>';
    $infosConducteur=  mysqli_query($co, "SELECT * FROM user WHERE idUser='".$idConducteur."' ");
    lectureTableauHtmlResultatRequete($infosConducteur);
    
    if(count($tabPassagers)==0){
        echo '<h1>Il n\'y a pas de passagers sur ce trajet.</h1>';        
    }else{
        echo '<h1>Passagers :</h1>';
          
        $requeteText="SELECT * FROM user as u, passager as p WHERE p.idTrajet='".$idTrajet."' AND p.idPassager=u.idUser";
        $infosPassagers=mysqli_query($co,$requeteText);
        lectureTableauHtmlResultatRequete($infosPassagers);
    }
    
    ?>
    

</div>


<?php
include '../pagetype/basPage.php';
?>