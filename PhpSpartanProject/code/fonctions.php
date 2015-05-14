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

function aUneVoiture($idUser) {
    $aUneVoiture = false;
    $requete = "SELECT * FROM voiture WHERE idPossesseur= '" . $idUser . "' ";
    $co = connexionBdd();
    $resultat = mysqli_query($co, $requete);
    $nbLignes = mysqli_num_rows($resultat);
    if ($nbLignes == 1) {
        $aUneVoiture = true;
    }
    return $aUneVoiture;
}

function logRightAfterRegister($pseudo) {
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['connected'] = 1;
    $id = getIdUserByPseudo($pseudo);
    $_SESSION['id'] = $id;

    header('Location: ../code/compte.php');
}

function logClassic($email) {

    $co = connexionBdd();
    $rechercheMail = "SELECT * FROM user WHERE email='" . $email . "' ";
    $tabResultat = mysqli_fetch_array(mysqli_query($co, $rechercheMail));
    $id = getIdUserByEmail($email);

    $_SESSION['connected'] = 1;
    $_SESSION['pseudo'] = $tabResultat['pseudo'];
    $_SESSION['id'] = $id;

    var_dump($_SESSION);
    echo 'connected =' . $_SESSION['connected'];
    header('Location: ../code/compte.php');
}

function getIdUserByPseudo($pseudo) {
    $co = connexionBdd();
    $requete = "SELECT * FROM user WHERE pseudo='" . $pseudo . "'";
    $query = mysqli_query($co, $requete);
    if (!$query) {
        die('Invalid query: ' . mysql_error());
    }
    $tabQuery = mysqli_fetch_array($query);
    return $tabQuery['idUser'];
}

function getIdUserByEmail($email) {
    $co = connexionBdd();
    $requete = "SELECT * FROM user WHERE email='" . $email . "'";
    $query = mysqli_query($co, $requete);
    if (!$query) {
        die('Invalid query: ' . mysql_error());
    }
    $tabQuery = mysqli_fetch_array($query);
    $id = $tabQuery['idUser'];
    return $id;
}

function getUserByEmail($email) {
    $co = connexionBdd();
    $requete = "SELECT * FROM user WHERE email='" . $email . "'";
    $query = mysqli_query($co, $requete);
    if (!$query) {
        die('Invalid query: ' . mysql_error());
    }
    $tabQuery = mysqli_fetch_array($query);
    return $tabQuery;
}

function getUserByPseudo($pseudo) {
    $co = connexionBdd();
    $requete = "SELECT * FROM user WHERE pseudo='" . $pseudo . "'";
    $query = mysqli_query($co, $requete);
    if (!$query) {
        die('Invalid query: ' . mysql_error());
    }
    $tabQuery = mysqli_fetch_array($query);
    return $tabQuery;
}

function searchInDataBase($tab) { //rentre tableau [table]=>([attribut]=>'valeur') 
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
    $idCreation = $nbLignes+100;
    return $idCreation;
}

function insertIntoUser($nom, $prenom, $pseudo, $passe, $email, $photo, $anneenaissance) {
    if (isAlreadyRegistered($email, $pseudo, $nom, $prenom) == false) {
        $co = connexionBdd();
        $requete = "INSERT INTO user VALUES (NULL, '" . $nom . "', '" . $prenom . "', '" . $pseudo . "', '" . $passe . "', '" . $email . "', NULL, '" . $photo . "', '', '', '" . $anneenaissance . "', '0')";
        echo $requete;
        $doQuery = mysqli_query($co, $requete);
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        echo 'DONE';
    } else {
        echo 'L\'utilisateur existe déjà !';
    }
}

function insertIntoVoiture($idUser, $marque, $modele, $couleur, $annee, $image) {
    $co = connexionBdd();
    $idVoiture=  createIDCar();
    echo 'idVoiture ='.$idVoiture.'<br />';
    $requete = "INSERT INTO voiture VALUES ('".$idVoiture."', '".$idUser."', '".$marque."', '".$modele."', '".$couleur."', '".$image."', '".$annee."')";
    echo $requete;
    $doQuery = mysqli_query($co, $requete);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    echo 'DONE';
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
