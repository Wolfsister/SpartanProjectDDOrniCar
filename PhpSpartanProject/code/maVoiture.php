<?php
$co = connexionBdd();
$req = "SELECT * FROM voiture WHERE idPossesseur='" . $_SESSION['id'] . "' ";
$sqlquery = mysqli_query($co, $req);
$tabVoiture = lectureTableauPhpResultatRequete($sqlquery);
$marque = $tabVoiture['marque'][0];
$modele = $tabVoiture['modele'][0];
$couleur = $tabVoiture['couleur'][0];
$annee = $tabVoiture['annee'][0];
$photo = '../ressources/imagesVoitures/' . $_SESSION['pseudo'] . '.jpg';
?>


<!--            Si pas de voiture : Bouton Ajouter une voiture, en disant avant que x ne possède pas de voiture, sinon afficher :-->
<div class='maVoiture'>
    <img class="ImageVoitureMonCompte"  src='../ressources/imagesVoitures/<?php echo $pseudo . ".jpg"; ?>' alt='Image de la Voiture'/>

    <ul>
        <li>Marque : <?php echo $marque; ?></li>
        <li>Modèle : <?php echo $modele; ?></li>
        <li>Couleur : <?php echo $couleur; ?></li>
        <li>Année de Mise en Circulation : <?php echo $annee; ?></li>
        <li>Photo à mettre dans l'encart</li>

    </ul>
</div>