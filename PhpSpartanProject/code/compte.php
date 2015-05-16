<?php
$title = '';
include '../pagetype/hautPage.php';
?>


<div class="row">
    <div class='monCompte'>
    <?php
//   include ('./profil.php');
//    if (aUneVoiture($_SESSION['id'])==true) { 
//        include ('./maVoiture.php');
//    } else {
//        include ('./add_Voiture.php');
//    }
    ?>

        <?php 
            $co=  connexionBdd();
            $req= "SELECT * FROM user WHERE idUser='".$_SESSION['id']."' ";
            $sqlquery=  mysqli_query($co, $req);
            $tabUser=  lectureTableauPhpResultatRequete($sqlquery);
            $pseudo=$tabUser['pseudo'][0];
            $nom=$tabUser['nom'][0];
            $prenom=$tabUser['prenom'][0];
            $solde=$tabUser['solde'][0];
            $reqConducteur = "SELECT * FROM trajet WHERE idConducteur='".$_SESSION['id']."' ";
            $sqlqueryconducteur=  mysqli_query($co, $reqConducteur);
            $nbTrajetsEnConducteur= mysqli_num_rows($sqlqueryconducteur);
            $reqPassager = "SELECT * FROM passager WHERE idPassager='".$_SESSION['id']."' ";
            $sqlquerypassager=  mysqli_query($co, $reqPassager);
            $nbTrajetsEnPassager= mysqli_num_rows($sqlquerypassager);
            $nbTrajetsTotal=$nbTrajetsEnConducteur+$nbTrajetsEnPassager;
            $photo='../ressources/imagesProfiles/'.$_SESSION['pseudo'].'.jpg';
            
            ?>
    
        <section id='profilMonCompte'>
            <h1>Mon Profil :</h1>
            <ul>
                <li>Pseudo : <?php echo $pseudo;?></li>
                <li>Nom : <?php echo $nom;?></li>
                <li>Prénom : <?php echo $prenom;?></li>
                <li>Solde : <?php echo $solde;?></li>
                <li>Nombre de Trajets Effectués : <?php echo $nbTrajetsEnPassager.' en tant que passager, '.$nbTrajetsEnConducteur.' en tant que conducteur, pour un total de '.$nbTrajetsTotal; ?> </li>
                <li>Photo à mettre dans l'encart</li>

            </ul>
        </section>
        <section id='profilVoiture'>
            <?php 
            $co=  connexionBdd();
            $req= "SELECT * FROM voiture WHERE idPossesseur='".$_SESSION['id']."' ";
            $sqlquery=  mysqli_query($co, $req);
            $tabVoiture=  lectureTableauPhpResultatRequete($sqlquery);
            $marque=$tabVoiture['marque'][0];
            $modele=$tabVoiture['modele'][0];
            $couleur=$tabVoiture['couleur'][0];
            $annee=$tabVoiture['annee'][0];
            $photo='../ressources/imagesVoitures/'.$_SESSION['pseudo'].'.jpg';
            
            ?>
            
            <h1>Ma Voiture</h1>
<!--            Si pas de voiture : Bouton Ajouter une voiture, en disant avant que x ne possède pas de voiture, sinon afficher :-->

            <ul>
                <li>Marque : <?php echo $marque;?></li>
                <li>Modèle : <?php echo $modele;?></li>
                <li>Couleur : <?php echo $couleur;?></li>
                <li>Année de Mise en Circulation : <?php echo $annee;?></li>
                <li>Photo à mettre dans l'encart</li>

            </ul>
        </section>
    </div>    

</div>




<?php
include '../pagetype/basPage.php';
?>