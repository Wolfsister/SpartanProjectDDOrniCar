<?php
$path='';
$title='';
include '../pagetype/hautPage.php';
$idTrajet=$_POST['idTrajet'];
$tabPassagers=  getPassagersByIdTrajet($idTrajet);
?>

<div class="container">

<?php
if(count($tabPassagers['idPassager'])==0){
    echo "Vous n'avez pas encore de passagers sur ce trajet !";
}else{
    echo "<table class='tableauAffichageBDD'><tr><th>Pseudo</th><th>Prénom</th><th>Nom</th><th>Age</th><th>Contacter</th></tr>";
    for ($index = 0; $index < count($tabPassagers['idPassager']); $index++) {
        $tabInfos=  getUserById($tabPassagers["idPassager"][$index]);
        $pseudo=$tabInfos['pseudo'];
        $prenom=$tabInfos['prenom'];
        $nom=$tabInfos['nom'];
        $dateNaissance=$tabInfos['anneenaissance'];
        $anneeActuelle=date('Y');
        $age=$anneeActuelle-$dateNaissance;
        echo "<form method='post' action='envoiMessagePassager.php'>";
        //faire form onSubmit
        echo "<tr><td>".$pseudo."</td><td>".$prenom."</td><td>".$nom."</td><td>".$age."</td><td><input src='img/mail.jpg' type=image width='30px' height='30px' value=submit></td></tr>";
        echo "<input type='hidden' name='pseudo' value=".$pseudo.">";
        echo "</form>";
    }
    echo "</table>";
}




?>
    
    

</div>


<?php
include '../pagetype/basPage.php';
?>