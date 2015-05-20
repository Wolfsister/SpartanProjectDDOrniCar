<?php

function connexionBdd() {
    $conn = new mysqli('localhost', 'root', '', 'testornicar');
    //$conn = new mysqli('mysql.hostinger.fr', 'u885690161_admin', 'doriandenis', 'u885690161_orni');
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
    $aUneVoiture = true;
    $requete = "SELECT * FROM voiture WHERE idPossesseur= '" . $idUser . "' ";
    $co = connexionBdd();
    $resultat = mysqli_query($co, $requete);
    $nbLignes = mysqli_num_rows($resultat);
    if ($nbLignes == 0) {
        $aUneVoiture = false;
    }
    return $aUneVoiture;
}

function logRightAfterRegister($pseudo) {
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['connected'] = 1;
    $id = getIdUserByPseudo($pseudo);
    $_SESSION['id'] = $id;

    header('Location: ../code/compte.php');

//    echo '<script type = "text/javascript">alert("Inscription Réussie !")</script> ';
//    echo '<script type="text/javascript"> document.location.href="../code/compte.php"    </script>';
}

function logClassic($email) {

    $co = connexionBdd();
    $rechercheMail = "SELECT * FROM user WHERE email='" . $email . "' ";
    $tabResultat = mysqli_fetch_array(mysqli_query($co, $rechercheMail));
    $id = getIdUserByEmail($email);

    $_SESSION['connected'] = 1;
    $_SESSION['pseudo'] = $tabResultat['pseudo'];
    $_SESSION['id'] = $id;

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
    $idCreation = $nbLignes + 100;
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
    $idVoiture = createIDCar();
    $requeteInsert = "INSERT INTO voiture VALUES ('" . $idVoiture . "', '" . $idUser . "', '" . $marque . "', '" . $modele . "', '" . $couleur . "', '" . $image . "', '" . $annee . "')";
    echo $requeteInsert;
    mysqli_query($co, $requeteInsert);
    //Update idVoiture dans tuple User
    $requeteUpdate = "UPDATE user SET idVoiture='" . $idVoiture . "' WHERE idUser='" . $idUser . "'  ";
    mysqli_query($co, $requeteUpdate);
}

function insertIntoTrajet($idConducteur, $villeDepart, $villeArrivee, $prix, $anneeMoisJour, $heure, $minute, $nbPlaces) { //$anneMoisJour : YYYY-MM-DD
    $co = connexionBdd();
    $requete = "INSERT INTO trajet VALUES (NULL, '" . $idConducteur . "', '" . $villeDepart . "', '" . $villeArrivee . "', '" . $prix . "', '" . $anneeMoisJour . "', '" . $heure . "', '" . $minute . "', '" . $nbPlaces . "' )";
    $doQuery = mysqli_query($co, $requete);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}

function insertIntoAvis($idDonneur, $idReceveur, $idTrajet, $note) {
    $co = connexionBdd();
    $requete = "INSERT INTO avis VALUES ('" . $idDonneur . "', '" . $idReceveur . "', '" . $idTrajet . "', '" . $note . "' )";
    $doQuery = mysqli_query($co, $requete);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}

function insertIntoPassager($idPassager, $idTrajet) {
    $co = connexionBdd();
    $requete = "INSERT INTO passager VALUES ('" . $idPassager . "','" . $idTrajet . "' )";
    $doQuery = mysqli_query($co, $requete);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}

function aDonnéAvis($idDonneur, $idReceveur, $idTrajet) {
    $avisDonné = false;
    $co = connexionBdd();
    $requete = "SELECT * FROM avis WHERE idDonneur='" . $idDonneur . "' AND idReceveur='" . $idReceveur . "' AND idTrajet='" . $idTrajet . "' ";
    $doQuery = mysqli_query($co, $requete);
    if (mysqli_num_rows($doQuery) > 0) {
        $avisDonné = true;
    }
    return $avisDonné;
}

function donnerAvis($idDonneur, $idReceveur, $idTrajet, $note) {
    if (aDonnéAvis($idDonneur, $idReceveur, $idTrajet)) {
        echo 'Vous avez déjà donné un avis à cet utilisateur pour ce trajet.';
    } else {
        insertIntoAvis($idDonneur, $idReceveur, $idTrajet, $note);
    }
}

function calculNoteMoyenne($idUser) { //Permet de calculer la note moyenne d'un utilisateur en fonction de toutes les notes qu'il a recu
    $co = connexionBdd();
    $requete = "SELECT avg(note) FROM avis WHERE idReceveur='" . $idUser . "' ";
    $r = mysqli_query($co, $requete);
    return mysqli_fetch_array($r)['avg(note)'];

    // Marche, mais diminuer la précision de la note, une note au dixième suffit
}

function chercherVille($villeArrivee) {
    $co = connexionBdd();
    $requete = "SELECT * FROM trajet WHERE villeArrivee='" . $villeArrivee . "' ";
    $r = mysqli_query($co, $requete);
    $tab = mysqli_fetch_array($r);
    print_r($tab);
}

function lectureTableauHtmlResultatRequete($objetMysqliquery) { // simple ebauche
    if (mysqli_num_rows($objetMysqliquery) > 0) {
        echo '<table class="tableauAffichageBDD"><tr>';

        $premieresValeurs = array();
        foreach ($tab1 = mysqli_fetch_array($objetMysqliquery) as $key => $value) { //Récupère les noms des colonnes ainsi que le premier tuple
            if (!is_int($key)) {
                echo '<th>' . $key . '</th>';
                $premieresValeurs[] = $value;
            }
        }
        echo '</tr>';
        echo '<tr>';
        foreach ($premieresValeurs as $key => $value) { //Met le premier tuple dans le tableau
            echo '<td>' . $value . '</td>';
        }
        echo '</tr>';
        while ($tab = mysqli_fetch_array($objetMysqliquery)) { //Ajoute tous les tuples suivants dans le tableau
            echo '<tr>';
            foreach ($tab as $key => $value) {
                if (!is_int($key)) {
                    echo '<td>' . $value . '</td>';
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    }
}

function lectureTableauPhpResultatRequete($objetMySql) {

    if (mysqli_num_rows($objetMySql) > 0) {
        $tab;

        while ($tabSql = mysqli_fetch_array($objetMySql)) {

            foreach ($tabSql as $key => $value) {
                if (!is_int($key)) {
                    $tab[$key][] = $value;
                }
            }
        }
        return $tab;
    }
}

function nombrePlacesRestantes($idTrajet) {
    $co = connexionBdd();
    //Savoir combien de places étaient disponibles au départ pour le trajet
    $requeteNbPlaces = "SELECT * FROM trajet WHERE idTrajet='" . $idTrajet . "'  ";
    $sqlireq = mysqli_query($co, $requeteNbPlaces);
    $tabNbPlaces = lectureTableauPhpResultatRequete($sqlireq);
    $nbPlacesOriginales = $tabNbPlaces['nombrePlaces'][0];
    //Savoir combien de passagers ont deja réservé ce voyage
    $requeteNbPassagers = "SELECT * FROM passager WHERE idTrajet='" . $idTrajet . "'  ";
    $sqlireqNbPassagers = mysqli_query($co, $requeteNbPassagers);
    $nbPlacesPrises = mysqli_num_rows($sqlireqNbPassagers);

    $nbPlacesRestantes = ($nbPlacesOriginales) - ($nbPlacesPrises);
    return $nbPlacesRestantes;
}

function recupererIdTrajetsEnTab($id) {


    $co = connexionBdd();
    $tabTousTrajets = array();
    $currentTime = date("Y-m-d");
    //Faire aussi test sur l'heure
    //En conducteur
    $reqTrajetsConducteur = "SELECT idTrajet FROM trajet as t WHERE anneeMoisJour<='" . $currentTime . "' AND t.idConducteur='" . $id . "' ";
    $sqliCon = mysqli_query($co, $reqTrajetsConducteur);
    while ($resultCon = mysqli_fetch_array($sqliCon)) {
        foreach ($resultCon as $key => $value) {
            if (is_integer($key)) {
                $tabTousTrajets[] = $value;
            }
        }
    }


    //En passager
    $reqTrajetsPassager = "SELECT p.idTrajet FROM passager as p, trajet as t WHERE anneeMoisJour<='" . $currentTime . "' AND p.idPassager='" . $id . "' AND p.idTrajet=t.idTrajet ";
    $sqliPas = mysqli_query($co, $reqTrajetsPassager);
    while ($resultPas = mysqli_fetch_array($sqliPas)) {
        foreach ($resultPas as $key => $value) {
            if (is_integer($key)) {
                $tabTousTrajets[] = $value;
            }
        }
    }

    return $tabTousTrajets;
}

function affichageTrajetPourAvis($idTrajet) {
    $co = connexionBdd();
    $requete = "SELECT * FROM trajet WHERE idTrajet='" . $idTrajet . "'";
    $requeteSqli = mysqli_query($co, $requete);
    $tabTrajet = lectureTableauPhpResultatRequete($requeteSqli);
    $villeDepart = $tabTrajet['villeDepart'][0];
    $villeArrivee = $tabTrajet['villeArrivee'][0];
    $anneeMoisJour = $tabTrajet['anneeMoisJour'][0];
    $date = date("d-m-Y", strtotime($anneeMoisJour));
    $prix = $tabTrajet['prix'][0];

//    echo '<table><tr><th>Ville de Départ</th><th>Ville d\'Arrivée</th><th>Date</th><th>Prix</th><th>Donner Avis</th></tr>';
    echo '<tr><td>' . $villeDepart . '</td><td>' . $villeArrivee . '</td><td>' . $date . '</td><td>' . $prix . ' €</td><td><div class="col-md-12 col-xs-12 col-sm-12"><button type="submit" class="btn btn-default btn-lg btn-block" name="register">Donner Avis</button></div></td></tr>';
}

?>
