<?php
$co = connexionBdd();
$req = "SELECT * FROM user WHERE idUser='" . $_SESSION['id'] . "' ";
$sqlquery = mysqli_query($co, $req);
$tabUser = lectureTableauPhpResultatRequete($sqlquery);
$pseudo = $tabUser['pseudo'][0];
$nom = $tabUser['nom'][0];
$prenom = $tabUser['prenom'][0];
$solde = $tabUser['solde'][0];
$reqConducteur = "SELECT * FROM trajet WHERE idConducteur='" . $_SESSION['id'] . "' ";
$sqlqueryconducteur = mysqli_query($co, $reqConducteur);
$nbTrajetsEnConducteur = mysqli_num_rows($sqlqueryconducteur);
$reqPassager = "SELECT * FROM passager WHERE idPassager='" . $_SESSION['id'] . "' ";
$sqlquerypassager = mysqli_query($co, $reqPassager);
$nbTrajetsEnPassager = mysqli_num_rows($sqlquerypassager);
$nbTrajetsTotal = $nbTrajetsEnConducteur + $nbTrajetsEnPassager;
$photo = '../ressources/imagesProfiles/' . $_SESSION['pseudo'] . '.jpg';
?>

<section id='profilMonCompte'>
    <h1>Mon Profil </h1>
    <ul>
        <li>Pseudo : <?php echo $pseudo; ?></li>
        <li>Nom : <?php echo $nom; ?></li>
        <li>Prénom : <?php echo $prenom; ?></li>
        <li>Solde : <?php echo $solde . ' €'; ?></li>
        <li>Nombre de Trajets Effectués : <?php echo $nbTrajetsEnPassager . ' en tant que passager, ' . $nbTrajetsEnConducteur . ' en tant que conducteur, pour un total de ' . $nbTrajetsTotal; ?> </li>
        <li>Photo à mettre dans l'encart</li>

    </ul>
</section>