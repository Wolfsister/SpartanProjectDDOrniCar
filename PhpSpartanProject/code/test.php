<?php
$path = '';
$title = 'Test';
include '../pagetype/hautPage.php';
?>

<div class="container">
    <?php
    //var_dump($_SESSION);

//    $date1 = date("d-m-Y");
//    echo $date1;
//    $heure = date("H-i");
    //echo $heure;
    //$year=  date("Y");
    //echo $year;
//    $datetime1 = new DateTime('2009-10-11');
//    $datetime2 = new DateTime('2009-11-13');
//    $interval = $datetime1->diff($datetime2);   // dt2 - dt1
//    echo $interval->format('%R%a days');
//    if( $datetime1<$datetime2){echo 'OK' ;}
    
//    $requete = " SELECT * FROM passager WHERE idTrajet=9 ";
//    $reqSql = mysqli_query($co, $requete);
//    $tabC = lectureTableauPhpResultatRequete($reqSql);

//    $tab=  getUserById(1);
//    
//    print_r($tab);

    //affichagePersonnesPourAvis(9, 1);
    
    //if(aDonnéAvis(1,4,8)){echo 'AVISDONNE';}else{echo 'nope';}  
    //enleverUnePlaceTrajet(14);
    
//    echo calculNoteMoyenne(1);
//    echo round(1.34, 1);
    //var_dump($_SESSION);
    
   // affichageFormulaireEnvoiMessage();
    
 
    
    $co = connexionBdd();
//MESSAGES RECUS
//$requeteTextRecus = " SELECT * FROM message WHERE idReceveur='" . $_SESSION['id'] . "' ORDER BY date DESC ";
//$reqRecus = mysqli_query($co, $requeteTextRecus);
//$tabRecus = lectureTableauPhpResultatRequete($reqRecus);
//print_r($tabRecus);
    
    ?>

<input type="button" onClick="bascule('boite');" value="Poster un commentaire">
<div name="boite" id="boite" style="visibility: hidden">
<form>
<label style="vertical-align: top;">Votre commentaire : </label>
<textarea rows="4" cols="50"></textarea>
</form>
</div>

    

</div>

<script>
    
    function bascule(elem)
{
// Quel est l'état actuel ?
etat=document.getElementById(elem).style.visibility;
if(etat=="hidden"){document.getElementById(elem).style.visibility="visible";}
else{document.getElementById(elem).style.visibility="hidden";}
} 
    
function changeCouleur(element, clr){
    element.style.color=clr;
}

function monAlert(){
    alert ("test");
//    alert ("<input type="text" name="prix" />");

}

function popitup(url) {
newwindow=window.open(url,'name','height=600,width=500');
if (window.focus) {newwindow.focus()}
return false;
}
</script>
    <?php
    include '../pagetype/basPage.php';
    ?>