<?php
$title = '';
include '../pagetype/hautPage.php';
?>


<div class="row">
    <?php
//   include ('./profil.php');
//    if (aUneVoiture($_SESSION['id'])==true) { 
//        include ('./maVoiture.php');
//    } else {
//        include ('./add_Voiture.php');
//    }
    ?>

    <div class='monCompte'>
        <section id='profilMonCompte'>
            <h1>Mon Profil :</h1>
            <ul>
                <li>Pseudo</li>
                <li>Nom</li>
                <li>Prénom</li>
                <li>Solde</li>
                <li>Nombre de Trajets Effectués</li>
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