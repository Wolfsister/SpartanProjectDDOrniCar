
<!--begin of the page-->
<div class="row">
   
    <?php
    $co=  connexionBdd();
    $select= "SELECT * FROM voiture WHERE idPossesseur='".$_SESSION['id']."'";
    $reqVoit=  mysqli_query($co, $select);
    lectureTableauHtmlResultatRequete($reqVoit);
    
    
    // Provisoire, mais faire autre fonction qui donne infos dans un array, pour afficher des infos beaucoup plus jolies
    ?>
    
</div>


<!--end of the page-->
