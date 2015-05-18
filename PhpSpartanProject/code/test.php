<?php
$path = '';
$title = 'Test';
include '../pagetype/hautPage.php';
?>

<div class="container">
    <?php
//$co = connexionBdd();
//$sql2 = " SELECT * FROM user";
//$result2 = mysqli_query($co, $sql2) or die("Requete pas comprise");
//DONNERAVIS('5', '4', '9', '2');
//
//CALCULNOTEMOYENNE('4');
//$idTrajet='9';
//echo nombrePlacesRestantes($idTrajet);
//echo '<pre>';
//print_r($tab2);
//echo '</pre>';
    
    var_dump($_SESSION);
    ?>
<!--    <div class='monCompte'>
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
            <h1>Ma Voiture</h1>
            //Si pas de voiture : Bouton Ajouter une voiture, en disant avant que x ne possède pas de voiture, sinon afficher :
            <ul>
                <li>Marque</li>
                <li>Modèle</li>
                <li>Couleur</li>
                <li>Année de Mise en Circulation</li>
                <li>Photo à mettre dans l'encart</li>
                
            </ul>
        </section>
    </div>    

</div>-->


<?php
include '../pagetype/basPage.php';
?>