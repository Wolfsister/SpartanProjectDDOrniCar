<?php

function connexionBdd() {
    $conn = new mysqli('localhost', 'root', '', 'testornicar');
    return $conn;
}

function passerConnecté() {
    $_SESSION['connected'] = 'Yes';
}

function logout() {
    session_destroy();
    $_SESSION['connected'] = 'No';
    //unset Cookies
    header('Location: ../code/index.php');
}

function isAlreadyRegistered($email, $pseudo, $nom, $prenom) {
    $registered = false;
    //Pseudo existe deja => registered=true, echo pseudo deja utilisé
    //Email existe deja
    //Couple Nom/Prenom existe deja
    $co = connexionBdd();
    $rechercheMail = "SELECT * FROM user WHERE email='" . $email . "' ";
    $resultatMail = mysqli_query($co, $rechercheMail);
    $nbLignesMail = mysqli_num_rows($resultatMail);
    if ($nbLignesMail == 1) {
        echo 'Cette adresse email est déjà utilisée. <br />';
        $registered = true;
    }
    $recherchePseudo = "SELECT * FROM user WHERE pseudo='" . $pseudo . "' ";
    $resultatPseudo = mysqli_query($co, $recherchePseudo);
    $nbLignesPseudo = mysqli_num_rows($resultatPseudo);
    if ($nbLignesPseudo == 1) {
        echo 'Ce pseudo est déjà utilisé. <br />';
        $registered = true;
    }
    $rechercheNomPrenom = "SELECT * FROM user WHERE nom='" . $nom . "' AND prenom='" . $prenom . "' ";
    $resultatNomPrenom = mysqli_query($co, $rechercheNomPrenom);
    $nbLignesCouple = mysqli_num_rows($resultatNomPrenom);
    if ($nbLignesCouple == 1) {
        echo 'Votre couple nom/prénom est déjà utilisé. <br />';
        $registered = true;
    }
    return $registered;
}

function logRightAfterRegister($pseudo) {
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['connected'] = 1;
    //$_SESSION['image']
    header('Location: ../code/compte.php');
}

function logClassic($email) {

    $co = connexionBdd();
    $rechercheMail = "SELECT * FROM user WHERE email='" . $email . "' ";
    $tabResultat = mysqli_fetch_array(mysqli_query($co, $rechercheMail));

    $_SESSION['connected'] = 1;
    $_SESSION['pseudo'] = $tabResultat['pseudo'];
    var_dump($_SESSION);
    echo 'connected =' . $_SESSION['connected'];
    header('Location: ../code/compte.php');
}

function getIdUser($pseudo) {
    $co = connexionBdd();
    $requete = "SELECT idUser FROM user WHERE user.pseudo='Wolfsister'";
    $query = mysqli_query($co, $requete);
    $tabQuery = mysqli_fetch_array($query);
    return $tabQuery['idUser'];
}

function searchInDataBase($tab) {
    $co = connexionBdd();
    $requeteDeb = 'SELECT * ';
    $requeteFrom = 'FROM ';
    $requeteWhere = ' WHERE ';
    $requeteWhereMorceau = '';
    $count = 0;
    //Création de la Requête
    foreach ($tab as $key1 => $value1) {
        $requeteFrom = $requeteFrom . $key1;
        foreach ($value1 as $key2 => $value2) {
            if ($count > 0) {
                $requeteWhereMorceau = " AND " . $key1 . "." . $key2 . "='" . $value2 . "' ";
            } else {
                $requeteWhereMorceau = " " . $key1 . "." . $key2 . "='" . $value2 . "' ";
            }
            $requeteWhere = $requeteWhere . $requeteWhereMorceau;
            $count++;
        }
    }

    $requete = $requeteDeb . $requeteFrom . $requeteWhere;
    //echo $requete;
    $doQuery = mysqli_query($co, $requete);
//    if (!$doQuery) {
//            printf("Error: %s\n", mysqli_error($co));
//            exit();
//        }
    echo 'NombreLignes =' . $nbLignes = mysqli_num_rows($doQuery);
    $tabResultat = mysqli_fetch_array($doQuery);

    return $tabResultat;
    // idée : rentrer un array avec [key]=>value avec type de l'info et info
    // Ensuite faire la requete grace à un foreach
}

function createIDCar() {
    $co = connexionBdd();
    $requeteNombreVoiture = 'SELECT * FROM voiture';
    $doQuery = mysqli_query($co, $requeteNombreVoiture);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    $nbLignes = mysqli_num_rows($doQuery);
    $idCreation = $nbLignes + 1;
    return $idCreation;
}

function insertIntoUser() {
    
}

function insertIntoVoiture() {
    
}

function insertIntoTrajet() {
    
}

function insertIntoAvis() {
    
}

function addCar($idPossesseur, $marque, $modele, $couleur, $image, $annee) {
//récuperer photos, mettre Pseudo+idVoiture en nom de fichier. Doit on mettre l'image en attribut de la table ? EN fait ca sert ptet à rien mais bon
    $idVoiture = createIDCar();
    $co = connexionBdd();
    $requeteNombreVoiture = 'SELECT * FROM voiture';
    $doQuery = mysqli_query($co, $requeteNombreVoiture);
}

?>
