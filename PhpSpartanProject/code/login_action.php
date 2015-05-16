<?php
$path='';
$title = '';
include '../pagetype/hautPage.php';
?>

<?php

if (isset($_POST)) {
    $erreurSaisie = false;
    $erreurEmail = false;
    if (empty($_POST["email"])) {
        echo("Le champ email est vide.<br/>");
        $erreurSaisie = true;
    }

    if (empty($_POST["passe"])) {
        echo("Veuillez renseigner votre mot de passe.<br/>");
        $erreurSaisie = true;
    }

    if ($erreurSaisie == true) {
        echo '<a href ="./login.php"> Retour à la connexion. </a>';
    }
    
    $rechercheMail;
    $emailExiste=false;

    if ($erreurSaisie == false) {   
        $email = $_POST["email"];
        // echo 'email='.$_POST["email"];
        $co = connexionBdd();
        $rechercheMail = "SELECT * FROM user WHERE email='" . $email . "' ";
        $resultat = mysqli_query($co, $rechercheMail);
        if (!$resultat) {
            printf("Error: %s\n", mysqli_error($co));
            exit();
        }

        $nbLignes = mysqli_num_rows($resultat); // Affiche le nombre de lignes de la requete
        
        if($nbLignes==0){
            $emailExiste=false;
            echo 'Il n\'existe pas d\'adresse mail à cette adresse, merci de vérifier votre saisie, ou cliquez <a href="./inscription.php">ici</a> pour créer un compte.';
        }else{
            $emailExiste=true;
            echo 'Email existant <br />';
        }
    }

    
    
    if(($erreurSaisie==false)&&($emailExiste==true)){
        $tabResultat=mysqli_fetch_array(mysqli_query($co, $rechercheMail));
        $mdpReel=$tabResultat['motdepasse'];
        $mdpPropose=$_POST['passe'];
        if($mdpReel==$mdpPropose){
            echo 'Bonne combinaison email/mot de passe, vous êtes désormais loggé !';
//            $_SESSION['connected']=1;
//            $_SESSION['pseudo']=$tabResultat['pseudo'];
//            var_dump($_SESSION);
//            echo 'connected ='.$_SESSION['connected'];
//            header('Location: ../code/compte.php');         
            
            logClassic($_POST['email']);
        }else{
            echo 'Le mot de passe saisi n\'est pas le bon, veuillez réessayer en cliquant <a href="./inscription.php">ici</a>.';
        }
    }
} else {
    echo 'Veuillez remplir les champs. <br />';
    echo '<a href ="./login.php"> Retour à la connexion </a>';
}
?>



<?php

include '../pagetype/basPage.php';
?>