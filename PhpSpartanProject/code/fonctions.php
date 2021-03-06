<?php
if (!isset($_SESSION)) {
    session_start();
    if(empty($_SESSION['connected'])){
        $_SESSION['connected']=0;
    }
}


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

function logClassic($pseudo) {

    $co = connexionBdd();
    $rechercheMail = "SELECT * FROM user WHERE pseudo='" . $pseudo . "' ";
    $tabResultat = mysqli_fetch_array(mysqli_query($co, $rechercheMail));
    $id = getIdUserByPseudo($pseudo);

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

function getUserById($idUser) {
    $co = connexionBdd();
    $requete = "SELECT * FROM user WHERE idUser='" . $idUser . "'";
    $query = mysqli_query($co, $requete);
    if (!$query) {
        die('Invalid query: ' . mysql_error());
    }
    $tabQuery = mysqli_fetch_array($query);
    return $tabQuery;
}

function getPseudoById($idUser) {
    $tab = getUserById($idUser);
    $pseudo = $tab['pseudo'];
    return $pseudo;
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

function insertIntoMessage($pseudoReceveur, $contenu) {
    $co = connexionBdd();
    $idEnvoyeur = $_SESSION['id'];
    $date = date("Y-m-d");
    $idReceveur = getIdUserByPseudo($pseudoReceveur);
    $requeteInsert = "INSERT INTO message VALUES (NULL, '" . $idEnvoyeur . "', '" . $idReceveur . "', '" . $contenu . "', '0', '" . $date . "' )";
    mysqli_query($co, $requeteInsert);
}

function messageAnnulationAutomatique($idAnnulé, $idTrajet) {
    $co = connexionBdd();
    $date = date("Y-m-d");
    $pseudoAnnulé = getPseudoById($idAnnulé);
    $infosTrajet = getTrajetByIdTrajet($idTrajet);

    $pseudoConducteur = getPseudoById($infosTrajet['idConducteur'][0]);
    $villeDépart = $infosTrajet['villeDepart'][0];
    $villeArrivée = $infosTrajet['villeArrivee'][0];
    $dateTrajet = $infosTrajet['anneeMoisJour'][0];
    $prix = $infosTrajet['prix'][0];

    $contenu = "Désolé " . $pseudoAnnulé . ", " . $pseudoConducteur . " a annulé le trajet entre " . $villeDépart . " et " . $villeArrivée . " du " . $dateTrajet . ". Votre compte est donc désormais recrédité de " . $prix . " € correspondant au montant de votre trajet ainsi que 10 € supplémentaires de dédommagement.";
    $requeteInsert = "INSERT INTO message VALUES (NULL, '1', '" . $idAnnulé . "', '" . $contenu . "', '0', '" . $date . "' )";
    mysqli_query($co, $requeteInsert);
}

function insertIntoTrajet($idConducteur, $villeDepart, $villeArrivee, $prix, $anneeMoisJour, $heure, $minute, $nbPlaces) { //$anneMoisJour : YYYY-MM-DD
    $co = connexionBdd();
    $requete = "INSERT INTO trajet VALUES (NULL, '" . $idConducteur . "', '" . $villeDepart . "', '" . $villeArrivee . "', '" . $prix . "', '" . $anneeMoisJour . "', '" . $heure . "', '" . $minute . "', '" . $nbPlaces . "', '0' )";
    mysqli_query($co, $requete);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}

function insertIntoAvis($idDonneur, $idReceveur, $idTrajet, $note) {
    $co = connexionBdd();
    $requete = "INSERT INTO avis VALUES ('" . $idDonneur . "', '" . $idReceveur . "', '" . $idTrajet . "', '" . $note . "' )";
    mysqli_query($co, $requete);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}

function insertIntoPassager($idPassager, $idTrajet) {
    $co = connexionBdd();
    $requete = "INSERT INTO passager VALUES ('" . $idPassager . "','" . $idTrajet . "','' )";
    mysqli_query($co, $requete);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
}

function aDonnéAvis($idDonneur, $idReceveur, $idTrajet) {
    $avisDonné = false;
    $co = connexionBdd();
    $requete = "SELECT * FROM avis WHERE idDonneur='" . $idDonneur . "' AND idReceveur='" . $idReceveur . "' AND idTrajet='" . $idTrajet . "' ";
    $doQuery=mysqli_query($co, $requete);
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
    $noteMoyenne = round(mysqli_fetch_array($r)['avg(note)'], 1);
    return $noteMoyenne;
}

function updateNote($note, $idUser) {
    $co = connexionBdd();
    $updateText = "UPDATE user SET note='" . $note . "' WHERE idUser='" . $idUser . "' ";
    mysqli_query($co, $updateText);
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
//    $co = connexionBdd();
////Savoir combien de places étaient disponibles au départ pour le trajet
//    $requeteNbPlaces = "SELECT * FROM trajet WHERE idTrajet='" . $idTrajet . "'  ";
//    $sqlireq = mysqli_query($co, $requeteNbPlaces);
//    $tabNbPlaces = lectureTableauPhpResultatRequete($sqlireq);
//    $nbPlacesOriginales = $tabNbPlaces['nombrePlaces'][0];
////Savoir combien de passagers ont deja réservé ce voyage
//    $requeteNbPassagers = "SELECT * FROM passager WHERE idTrajet='" . $idTrajet . "'  ";
//    $sqlireqNbPassagers = mysqli_query($co, $requeteNbPassagers);
//    $nbPlacesPrises = mysqli_num_rows($sqlireqNbPassagers);
//
//    $nbPlacesRestantes = ($nbPlacesOriginales) - ($nbPlacesPrises);
//    return $nbPlacesRestantes;
    
    $co=connexionBdd();
    $requeteNbPlaces="SELECT * FROM trajet WHERE idTrajet='".$idTrajet."' ";
    $sqliRq=  mysqli_query($co, $requeteNbPlaces);
    $tab=  lectureTableauPhpResultatRequete($sqliRq);
    $nbPlaces=$tab["nombrePlaces"][0];
    return $nbPlaces;
}

function isDriver($idUser, $idTrajet) {
    $driver = false;
    $co = connexionBdd();
    $req = " SELECT * FROM trajet WHERE idTrajet='" . $idTrajet . "' ";
    $requeteSqli = mysqli_query($co, $req);
    $tab = lectureTableauPhpResultatRequete($requeteSqli);
    $idConducteur = $tab["idConducteur"][0];
    if ($idConducteur == $idUser) {
        $driver = true;
    }
    return $driver;
}

function recupererIdTrajetsEnTab($id) {


    $co = connexionBdd();
    $tabTousTrajets = array();
    //$currentTime = date("Y-m-d");
//Faire aussi test sur l'heure
//En conducteur
//    $reqTrajetsConducteur = "SELECT idTrajet FROM trajet as t WHERE anneeMoisJour<='" . $currentTime . "' AND t.idConducteur='" . $id . "' ";
    $reqTrajetsConducteur = "SELECT idTrajet FROM trajet as t WHERE valide='1' AND t.idConducteur='" . $id . "' ";

    $sqliCon = mysqli_query($co, $reqTrajetsConducteur);
    while ($resultCon = mysqli_fetch_array($sqliCon)) {
        foreach ($resultCon as $key => $value) {
            if (is_integer($key)) {
                $tabTousTrajets[] = $value;
            }
        }
    }


//En passager
    $reqTrajetsPassager = "SELECT p.idTrajet FROM passager as p, trajet as t WHERE t.valide='1' AND p.idPassager='" . $id . "' AND p.idTrajet=t.idTrajet ";
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

    //Tester si quelqu'un dans le voyage
    $requeteNbAvisADonner = "SELECT * FROM passager WHERE idTrajet='" . $idTrajet . "' ";
    $nbAvisADonner = mysqli_num_rows(mysqli_query($co, $requeteNbAvisADonner)); //1 seul conducteur et le passager se compense
    //Tester si avis déjà donné
    $trajetDejaNote = false;
    if ($nbAvisADonner > 0) {
        $requeteAvisDonne = "SELECT * FROM avis WHERE idDonneur='" . $_SESSION['id'] . "' AND idTrajet='" . $idTrajet . "' ";
        $nbAvisDejaDonne = mysqli_num_rows(mysqli_query($co, $requeteAvisDonne)); //1 seul conducteur et le passager se compense
        if ($nbAvisDejaDonne > 0) {

            $trajetDejaNote = true;
        }
    }

    if ($trajetDejaNote == false && $nbAvisADonner > 0) {

        $requete = "SELECT * FROM trajet WHERE idTrajet='" . $idTrajet . "'";
        $requeteSqli = mysqli_query($co, $requete);
        $tabTrajet = lectureTableauPhpResultatRequete($requeteSqli);
        $villeDepart = $tabTrajet['villeDepart'][0];
        $villeArrivee = $tabTrajet['villeArrivee'][0];
        $anneeMoisJour = $tabTrajet['anneeMoisJour'][0];
        $date = date("d-m-Y", strtotime($anneeMoisJour));
        $prix = $tabTrajet['prix'][0];

        echo '<form method="post" action="avis_action.php"> ';
        echo '<tr><td>' . $villeDepart . '</td><td>' . $villeArrivee . '</td><td>' . $date . '</td><td>' . $prix . ' €</td><td><div class="col-md-12 col-xs-12 col-sm-12"><button type="submit" class="btn btn-default btn-lg btn-block" name="register">Donner Avis</button></div></td></tr>';
        echo '<input type=hidden name="idTrajet" value="' . $idTrajet . '"/>';
        echo '</form>';
    }
}

function affichagePersonnesPourAvis($idTrajet, $idUser) {
    $co = connexionBdd();
    $conducteur = isDriver($idUser, $idTrajet);
//Debut FORM
    echo "<form method='post' action='avis_action_action.php'>";

    echo "<table class='tableauAffichageBDD'><tr><th>Photo</th><th>Pseudo</th><th>Prénom</th><th>Nom</th><th>NoteMoyenneActuelle</th><th>Votre Avis (/5)</th><tr>"; //Mettre select note à la fin
    if ($conducteur == true) {
        $requeteC = "SELECT DISTINCT idPassager, idTrajet FROM passager WHERE idTrajet='" . $idTrajet . "' ";
        $reqSql = mysqli_query($co, $requeteC);
        $tabC = lectureTableauPhpResultatRequete($reqSql);

        $nbLignes = 0;
        foreach ($tabC as $key => $valueinit) {
            if ($key == 'idPassager') {
                foreach ($valueinit as $key2 => $value) {
                    $nbLignes++;
                    $tabUser = getUserById($value);
                    $nom = $tabUser['nom'];
                    $prenom = $tabUser['prenom'];
                    $pseudo = $tabUser['pseudo'];
                    $note = $tabUser['note'];
                    //Jusque là pas de soucis
                    $photo = '<img src="../ressources/imagesProfiles/' . $value . '.jpg" width="20px" heigth="20px" />';
                    $select = "<select name='" . $nbLignes . "'><option value=0>Pas d'Avis<option value=1>A Eviter<option value=2>Décevant<option value=3>Bien<option value=4>Excellent<option value=5>Extraordinaire </select>";


                    echo '<tr><td>' . $photo . '</td><td>' . $pseudo . '</td><td>' . $prenom . '</td><td>' . $nom . '</td><td>' . $note . '</td><td>' . $select . '</td>';
                    echo '<input type="hidden" name="id' . $nbLignes . '" value=' . $value . ' />'; //Value donne l'ID de la perosnne notée
                }
            }
        }
    } else {
        //Recupération du conducteur
        $nbLignes = 1;

        $requeteC = "SELECT * FROM trajet WHERE idTrajet='" . $idTrajet . "' ";
        $reqSql = mysqli_query($co, $requeteC);
        $tabC = lectureTableauPhpResultatRequete($reqSql);
        //$nbLignes++;
        $idConducteur = $tabC['idConducteur'][0];
        $tabUser = getUserById($idConducteur);
        $nom = $tabUser['nom'];
        $prenom = $tabUser['prenom'];
        $pseudo = $tabUser['pseudo'];
        $note = $tabUser['note'];

        $photo = '<img src="../ressources/imagesProfiles/' . $idConducteur . '.jpg" width="20px" heigth="20px" />';
        $select = "<select name='" . $nbLignes . "'><option value=0>Pas d'Avis<option value=1>A Eviter<option value=2>Décevant<option value=3>Bien<option value=4>Excellent<option value=5>Extraordinaire</select>";


        echo '<tr><td>' . $photo . '</td><td>' . $pseudo . '</td><td>' . $nom . '</td><td>' . $prenom . '</td><td>' . $note . '</td><td>' . $select . '</td>';
        echo '<input type="hidden" name="id' . $nbLignes . '" value=' . $idConducteur . ' />';


        $requetePassager = "SELECT DISTINCT idPassager, idTrajet FROM passager WHERE idTrajet ='" . $idTrajet . "' ";
        $sqlPassager = mysqli_query($co, $requetePassager);
        $tabPassager = lectureTableauPhpResultatRequete($sqlPassager);
        foreach ($tabPassager as $key => $valueinit) {
            if ($key == 'idPassager') {
                foreach ($valueinit as $key2 => $value) {
                    if ($value != $idUser) {
                        $nbLignes++;
                        $tabUser = getUserById($value);
                        $nom = $tabUser['nom'];
                        $prenom = $tabUser['prenom'];
                        $pseudo = $tabUser['pseudo'];
                        $note = $tabUser['note'];
                        //Jusque là pas de soucis
                        $photo = '<img src="../ressources/imagesProfiles/' . $value . '.jpg" width="20px" heigth="20px" />';
                        $select = "<select name='" . $nbLignes . "'><option value=1>A Eviter<option value=2>Décevant<option value=3>Bien<option value=4>Excellent<option value=5>Extraordinaire </select>";


                        echo '<tr><td>' . $photo . '</td><td>' . $pseudo . '</td><td>' . $nom . '</td><td>' . $prenom . '</td><td>' . $note . '</td><td>' . $select . '</td>';
                        echo '<input type="hidden" name="id' . $nbLignes . '" value=' . $value . ' />';
                    }
                }
            }
        }
    }

    echo '<input type="hidden" name="nbPassager" value="' . $nbLignes . '" >';
    echo '<input type="hidden" name="idTrajet" value="' . $idTrajet . '" >';
    echo '</table>';

    echo '<div class="col-md-12 col-xs-12 col-sm-12"><button type="submit" class="btn btn-default btn-lg btn-block" name="register">Valider tous les Avis</button> ';
    echo '</form>';
//Fin de form
}

function aDejaDonneAvis($idUser, $idReceveur, $idTrajet) {
    $avisDejaDonne = false;
    $co = connexionBdd();
    $req = "SELECT * FROM avis WHERE idDonneur='" . $idUser . "' AND idReceveur='" . $idReceveur . "' AND idTrajet='" . $idTrajet . "' ";
    $sql = mysqli_query($co, $req);
    $nbLignes = mysqli_num_rows($sql);
    if ($nbLignes != 0) {
        $avisDejaDonne = true;
    }
    return $avisDejaDonne;
}

function redirection($lien) {
    header('Location: ' . $lien);
}

function retirerArgent($idUser, $montant) {
    $co = connexionBdd();
    $reqText = " SELECT * FROM user WHERE idUser='" . $idUser . "' ";
    $tab = lectureTableauPhpResultatRequete(mysqli_query($co, $reqText));
    $soldeAvant = $tab['solde'][0];
    $soldeActuel = $soldeAvant - $montant;
    $updateText = "UPDATE user SET solde='" . $soldeActuel . "' WHERE idUser='" . $idUser . "' ";
    mysqli_query($co, $updateText);
}

function donnerArgent($idUser, $montant) {
    $co = connexionBdd();
    $reqText = " SELECT * FROM user WHERE idUser='" . $idUser . "' ";
    $tab = lectureTableauPhpResultatRequete(mysqli_query($co, $reqText));
    $soldeAvant = $tab['solde'][0];
    $soldeActuel = $soldeAvant + $montant;
    $updateText = "UPDATE user SET solde='" . $soldeActuel . "' WHERE idUser='" . $idUser . "' ";
    mysqli_query($co, $updateText);
}

function affichageTrajetPourReservation($villeDepart, $villeArrivee, $date) {


    //A ADAPTER POUR RECHERCHE TRAJET
    $co = connexionBdd();
//Debut FORM

    echo "<table class='tableauAffichageBDD'><tr><th>Ville de Départ</th><th>Ville d'Arrivée</th><th>Date</th><th>Pseudo du Conducteur</th><th>Prix</th><th>Heure</th><th>Minutes</th><th>Nombre Places Restantes</th><th></th><tr>"; //Ajouter voiture ?
    $requeteText = "SELECT * FROM trajet WHERE villeDepart='" . $villeDepart . "' AND villeArrivee='" . $villeArrivee . "' AND anneeMoisJour='" . $date . "' AND nombrePlaces>0  ";
    $reqSql = mysqli_query($co, $requeteText);
    $nbTrajets = mysqli_num_rows($reqSql);
    $tab = lectureTableauPhpResultatRequete($reqSql);

    if ($nbTrajets > 0) {
        echo '<div class="container">';
        for ($i = 0; $i < $nbTrajets; $i++) {
            echo "<form method='post' action='rechercheTrajet_action_action.php'>";
            $idTrajet = $tab['idTrajet'][$i];
            $idConducteur = $tab['idConducteur'][$i];
            $pseudoConducteur = getPseudoById($idConducteur);
            $prix = $tab['prix'][$i];
            $heure = $tab['heure'][$i];
            $minute = $tab['minute'][$i];
            $nbPlaces = $tab['nombrePlaces'][$i];
            $btSubmit = '<div class="col-md-12 col-xs-12 col-sm-12"><button type="submit" class="btn btn-default btn-lg btn-block" name="register">Réserver ce Trajet</button> ';

            echo '<tr><td>' . $villeDepart . '</td><td>' . $villeArrivee . '</td><td>'.$date.'</td><td>' . $pseudoConducteur . '</td><td>' . $prix . '</td><td>' . $heure . '</td><td>' . $minute . '</td><td>' . $nbPlaces . '</td><td>' . $btSubmit . '</td>';
            echo '<input type="hidden" name="idTrajet" value=' . $idTrajet . ' />';
            echo '<input type="hidden" name="prix" value=' . $prix . ' />';

            echo '</form>';
        }
        echo '</div>';
// $photo = '<img src="../ressources/imagesProfiles/' . $value . '.jpg" width="20px" heigth="20px" />';
    }else{ echo "Il n'existe pas de trajets avec vos paramètres.";}

    echo '</table>';


//Fin de form
}

function affichageTrajetPourReservationVilleDepart($villeDepart) {


    //A ADAPTER POUR RECHERCHE TRAJET
    $dateActuelle=date("Y-m-d");
    $co = connexionBdd();
//Debut FORM

    echo "<table class='tableauAffichageBDD'><tr><th>Ville de Départ</th><th>Ville d'Arrivée</th><th>Date</th><th>Pseudo du Conducteur</th><th>Prix</th><th>Heure</th><th>Minutes</th><th>Nombre Places Restantes</th><th></th><tr>"; //Ajouter voiture ?
    $requeteText = "SELECT * FROM trajet WHERE villeDepart='" . $villeDepart . "' AND nombrePlaces>0 AND anneeMoisJour>'".$dateActuelle."' ";
    $reqSql = mysqli_query($co, $requeteText);
    $nbTrajets = mysqli_num_rows($reqSql);
    $tab = lectureTableauPhpResultatRequete($reqSql);

    if ($nbTrajets > 0) {
        echo '<div class="container">';
        for ($i = 0; $i < $nbTrajets; $i++) {
            echo "<form method='post' action='rechercheTrajet_action_action.php'>";
            $idTrajet = $tab['idTrajet'][$i];
            $idConducteur = $tab['idConducteur'][$i];
            $pseudoConducteur = getPseudoById($idConducteur);
            $prix = $tab['prix'][$i];
            $date = $tab['anneeMoisJour'][$i];
            $heure = $tab['heure'][$i];
            $minute = $tab['minute'][$i];
            $villeArrivee= $tab['villeArrivee'][$i];
            $nbPlaces = $tab['nombrePlaces'][$i];
            $btSubmit = '<div class="col-md-12 col-xs-12 col-sm-12"><button type="submit" class="btn btn-default btn-lg btn-block" name="register">Réserver ce Trajet</button> ';

            echo '<tr><td>' . $villeDepart . '</td><td>' . $villeArrivee . '</td><td>'.$date.'</td><td>' . $pseudoConducteur . '</td><td>' . $prix . '</td><td>' . $heure . '</td><td>' . $minute . '</td><td>' . $nbPlaces . '</td><td>' . $btSubmit . '</td>';
            echo '<input type="hidden" name="idTrajet" value=' . $idTrajet . ' />';
            echo '<input type="hidden" name="prix" value=' . $prix . ' />';

            echo '</form>';
        }
        echo '</div>';
// $photo = '<img src="../ressources/imagesProfiles/' . $value . '.jpg" width="20px" heigth="20px" />';
    }else{ echo "Il n'existe pas de trajets avec vos paramètres.";}

    echo '</table>';


//Fin de form
}

function affichageTrajetPourReservationVilleDepartArrivee($villeDepart, $villeArrivee) {


    //A ADAPTER POUR RECHERCHE TRAJET
    $dateActuelle=date("Y-m-d");
    $co = connexionBdd();
//Debut FORM

    echo "<table class='tableauAffichageBDD'><tr><th>Ville de Départ</th><th>Ville d'Arrivée</th><th>Date</th><th>Pseudo du Conducteur</th><th>Prix</th><th>Heure</th><th>Minutes</th><th>Nombre Places Restantes</th><th></th><tr>"; //Ajouter voiture ?
    $requeteText = "SELECT * FROM trajet WHERE villeDepart='" . $villeDepart . "' AND villeArrivee='" . $villeArrivee . "' AND nombrePlaces>0 AND anneeMoisJour>'".$dateActuelle." ";
    $reqSql = mysqli_query($co, $requeteText);
    $nbTrajets = mysqli_num_rows($reqSql);
    $tab = lectureTableauPhpResultatRequete($reqSql);

    if ($nbTrajets > 0) {
        echo '<div class="container">';
        for ($i = 0; $i < $nbTrajets; $i++) {
            echo "<form method='post' action='rechercheTrajet_action_action.php'>";
            $idTrajet = $tab['idTrajet'][$i];
            $idConducteur = $tab['idConducteur'][$i];
            $pseudoConducteur = getPseudoById($idConducteur);
            $prix = $tab['prix'][$i];
            $heure = $tab['heure'][$i];
            $date = $tab['anneeMoisJour'][$i];
            $minute = $tab['minute'][$i];
            $nbPlaces = $tab['nombrePlaces'][$i];
            $btSubmit = '<div class="col-md-12 col-xs-12 col-sm-12"><button type="submit" class="btn btn-default btn-lg btn-block" name="register">Réserver ce Trajet</button> ';

            echo '<tr><td>' . $villeDepart . '</td><td>' . $villeArrivee . '</td><td>'.$date.'</td><td>' . $pseudoConducteur . '</td><td>' . $prix . '</td><td>' . $heure . '</td><td>' . $minute . '</td><td>' . $nbPlaces . '</td><td>' . $btSubmit . '</td>';
            echo '<input type="hidden" name="idTrajet" value=' . $idTrajet . ' />';
            echo '<input type="hidden" name="prix" value=' . $prix . ' />';

            echo '</form>';
        }
        echo '</div>';
// $photo = '<img src="../ressources/imagesProfiles/' . $value . '.jpg" width="20px" heigth="20px" />';
    }else{ echo "Il n'existe pas de trajets avec vos paramètres.";}

    echo '</table>';


//Fin de form
}
function participeAuTrajet($idUser, $idTrajet) {
    $participe = false;
    $co = connexionBdd();
    $requeteTextP = "SELECT * FROM passager WHERE idPassager='" . $idUser . "' AND idTrajet='" . $idTrajet . "' ";
    $numLignesP = mysqli_num_rows(mysqli_query($co, $requeteTextP));
    if ($numLignesP == 0) {
        $requeteTextC = "SELECT * FROM trajet WHERE idConducteur='" . $idUser . "' AND idTrajet='" . $idTrajet . "' ";
        $numLignesC = mysqli_num_rows(mysqli_query($co, $requeteTextC));
        if ($numLignesC > 0) {
            $participe = true;
        }
    } else {
        $participe = true;
    }
    return $participe;
}

function enleverUnePlaceTrajet($idTrajet) {
    $co = connexionBdd();
    $reqText = " SELECT * FROM trajet WHERE idTrajet='" . $idTrajet . "' ";
    $tab = lectureTableauPhpResultatRequete(mysqli_query($co, $reqText));
    $placesAvant = $tab['nombrePlaces'][0];
    $placesApres = $placesAvant - 1;
    $updateText = "UPDATE trajet SET nombrePlaces='" . $placesApres . "' WHERE idTrajet='" . $idTrajet . "' ";
    mysqli_query($co, $updateText);
}

function affichageFormulaireEnvoiMessage() {
    echo '<form method="post" action="envoiMessage_action.php" ><label> Destinataire :</label><select name="idReceveur" id="idReceveur">';
    $co = connexionBdd();
    $sql1 = " SELECT DISTINCT pseudo, idUser FROM user WHERE idUser<>'" . $_SESSION['id'] . "' ORDER BY pseudo ";
    $result1 = mysqli_query($co, $sql1) or die("Requete pas comprise");
    while ($row1 = mysqli_fetch_array($result1)) {
        echo "<option name=" . $row1['idUser'] . ">" . $row1['pseudo'] . " </option> ";
    }
    echo '</select><br />';
    echo '<textarea name="contenu" id="contenu" placeholder="Contenu du message" style="width: 394px; height: 124px;"></textarea>';
    echo '<button type="submit" id="boutonMessage" class="btn btn-default btn-lg btn-block" name="sendMessage" onclick="alert(\'Le message a bien été envoyé. \')">Envoyer le Message</button>';

    //Poubelle   onclick="alert(\'Le message a bien été envoyé. \')"
}

function marquerMesssageLu($idMessage) {
    $co = connexionBdd();
    $requeteTxt = "UPDATE message SET lu='1' WHERE idMessage='" . $idMessage . "' ";
    mysqli_query($co, $requeteTxt);
}

function getTrajetByIdTrajet($idTrajet) {
    $co = connexionBdd();
    $requeteText = " SELECT * FROM trajet WHERE idTrajet='" . $idTrajet . "' ";
    $tabTrajet = lectureTableauPhpResultatRequete(mysqli_query($co, $requeteText));
    return $tabTrajet;
}

function getMessageByidMessage($idMessage) {
    $co = connexionBdd();
    $requeteText = " SELECT * FROM message WHERE idMessage='" . $idMessage . "' ";
    $tabMessage = lectureTableauPhpResultatRequete(mysqli_query($co, $requeteText));
    return $tabMessage;
}

function getContenuByidMessage($idMessage) {
    $tab = getMessageByidMessage($idMessage);
    $contenu = $tab['contenu'][0];
    return $contenu;
}

function getPassagersByIdTrajet($idTrajet) {
    $co = connexionBdd();
    $requeteText = " SELECT * FROM passager WHERE idTrajet='" . $idTrajet . "' ";
    $tabPassagers = lectureTableauPhpResultatRequete(mysqli_query($co, $requeteText));
    return $tabPassagers;
}

function getPrixByIdTrajet($idTrajet) {
    $tab = getTrajetByIdTrajet($idTrajet);
    $prix = $tab['prix'][0];
    return $prix;
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function messageAnnulationTrajetPourTousEtRemboursement($idTrajet) {
    $tabPassagers = getPassagersByIdTrajet($idTrajet);
    $prix = getPrixByIdTrajet($idTrajet);
    $idsRembourses=array();
    if (!empty($tabPassagers)) {
        foreach ($tabPassagers['idPassager'] as $value) {
            if(!in_array($value, $idsRembourses)){
            messageAnnulationAutomatique($value, $idTrajet);
            }
            $remboursement = $prix + 10;
            donnerArgent($value, $remboursement);
            $idsRembourses[]=$value;
        }
    }
}

function supprimerTrajetBDD($idTrajet) {
    $co = connexionBdd();
    $reqTextTrajet = " DELETE FROM trajet WHERE idTrajet='" . $idTrajet . "' ";
    mysqli_query($co, $reqTextTrajet);
    $reqTextPassager = " DELETE FROM passager WHERE idTrajet='" . $idTrajet . "' ";
    mysqli_query($co, $reqTextPassager);
}

function supprimerTrajetEnConducteur($idTrajet) {
    $tabTrajet = getTrajetByIdTrajet($idTrajet);
    $idConducteur = $tabTrajet['idConducteur'][0];
    $montant = $tabTrajet['prix'][0];
    $tabPassagers = getPassagersByIdTrajet($idTrajet);
    $nbPassagers = count($tabPassagers['idPassager']);
    //Signaler annulation trajet aux utilisateurs et leur rendre argent

    messageAnnulationTrajetPourTousEtRemboursement($idTrajet);

    // Supprimer trajet de la BDD
    supprimerTrajetBDD($idTrajet);


    //Envoyer un messsage à l'annuleur
    $co = connexionBdd();
    $date = date("Y-m-d");

    $villeDépart = $tabTrajet['villeDepart'][0];
    $villeArrivée = $tabTrajet['villeArrivee'][0];
    $dateTrajet = $tabTrajet['anneeMoisJour'][0];

    if ($nbPassagers == 0) {
        $contenu = "Votre trajet entre " . $villeDépart . " et " . $villeArrivée . " du " . $dateTrajet . " a bien été annulé.";
    } else {
        //Enlever 10€ X nombre de passagers
        $penalite = 10 * $nbPassagers;
        retirerArgent($idConducteur, $penalite);
        $contenu = "Votre trajet entre " . $villeDépart . " et " . $villeArrivée . " du " . $dateTrajet . " a bien été annulé. Vous payez donc à chaque passager un pénalité de 10€.";
    }
    $requeteInsert = "INSERT INTO message VALUES (NULL, '1', '" . $idConducteur . "', '" . $contenu . "', '0', '" . $date . "' )";
    mysqli_query($co, $requeteInsert);
}

//A tester

function lectureTableauHtmlTousTrajets($objetMysqliquery) { // simple ebauche
    if (mysqli_num_rows($objetMysqliquery) > 0) {
        echo '<table class="tableauAffichageBDD"><tr>';

        $premieresValeurs = array();
        foreach ($tab1 = mysqli_fetch_array($objetMysqliquery) as $key => $value) { //Récupère les noms des colonnes ainsi que le premier tuple
            if (!is_int($key)) {
                if ($key == 'idTrajet') {
                    $idTrajet = $tab1[$key];
                }
                echo '<th>' . $key . '</th>';
                $premieresValeurs[] = $value;
            }
        }
        echo '<th>Plus d\'infos </th>';
        echo '</tr>';
        echo "<form method='post' action='listeTousTrajets_action.php'>";
        echo '<tr>';
        foreach ($premieresValeurs as $key => $value) { //Met le premier tuple dans le tableau
            echo '<td>' . $value . '</td>';
        }
        echo "<td><input src='img/plus.jpg' type=image width='30px' height='30px' value=submit></td>";
        echo "<input type='hidden' name='idTrajet' value=" . $idTrajet . ">";
        echo '</tr></form>';
        while ($tab = mysqli_fetch_array($objetMysqliquery)) { //Ajoute tous les tuples suivants dans le tableau
            echo "<form method='post' action='listeTousTrajets_action.php'>";
            echo '<tr>';
            foreach ($tab as $key => $value) {

                if (!is_int($key)) {
                    echo '<td>' . $value . '</td>';
                }
                $idTrajet = $tab['idTrajet'];
            }
            echo "<input type='hidden' name='idTrajet' value=" . $idTrajet . ">";
            echo "<td><input src='img/plus.jpg' type=image width='30px' height='30px' value=submit></td>";
            echo "</form>";
            echo '</tr>';
        }
        echo '</table>';
    }
}

function lectureTableauHtmlMesTrajetsConducteurResultatRequete($objetMysqliquery) { // changerAction
    if (mysqli_num_rows($objetMysqliquery) > 0) {
        echo '<table class="tableauAffichageBDD"><tr>';

        $premieresValeurs = array();
        foreach ($tab1 = mysqli_fetch_array($objetMysqliquery) as $key => $value) { //Récupère les noms des colonnes ainsi que le premier tuple
            if (!is_int($key)) {
                if ($key == 'idTrajet') {
                    $idTrajet = $tab1[$key];
                }
                echo '<th>' . $key . '</th>';
                $premieresValeurs[] = $value;
            }
        }
        echo '<th>Passagers </th>';
        echo '<th>Validation</th>';
        echo '<th>Suppression</th>';
        echo '</tr>';
        echo "<form method='post' action='infosPassager.php'>";
        echo '<tr>';
        foreach ($premieresValeurs as $key => $value) { //Met le premier tuple dans le tableau
            echo '<td>' . $value . '</td>';
        }
        echo "<td><input src='img/plus.jpg' type=image width='30px' height='30px' value=submit></td>";
        echo "<input type='hidden' name='idTrajet' value=" . $idTrajet . ">";
        echo '</form>';
        echo "<form method='post' action='validationTrajet.php'>";
        echo '<td><button type="submit" id="boutonValidation" class="btn btn-default btn-lg btn-block" name="validation")">Valider</button></td>';
        echo "<input type='hidden' name='idTrajet' value=" . $idTrajet . ">";
        echo '</form>';
        echo "<form method='post' action='suppressionTrajet.php'>";
        echo "<td><input src='img/suppr.jpg' type=image width='30px' height='30px' value=submit></td>";
        echo "<input type='hidden' name='idTrajet' value=" . $idTrajet . ">";
        echo "</tr></form>";

        while ($tab = mysqli_fetch_array($objetMysqliquery)) { //Ajoute tous les tuples suivants dans le tableau
            echo "<form method='post' action='infosPassager.php'>";
            echo '<tr>';
            foreach ($tab as $key => $value) {

                if (!is_int($key)) {
                    echo '<td>' . $value . '</td>';
                }
                $idTrajet = $tab['idTrajet'];
            }
            echo "<input type='hidden' name='idTrajet' value=" . $idTrajet . ">";
            echo "<td><input src='img/plus.jpg' type=image width='30px' height='30px' value=submit></td>";
            echo "</form>";
            echo "<form method='post' action='validationTrajet.php'>";
            echo '<td><button type="submit" id="boutonValidation" class="btn btn-default btn-lg btn-block" name="validation")">Valider</button></td>';
            echo "<input type='hidden' name='idTrajet' value=" . $idTrajet . ">";
            echo '</form>';
            echo "<form method='post' action='suppressionTrajet.php'>";
            echo "<td><input src='img/suppr.jpg' type=image width='30px' height='30px' value=submit></td>";
            echo "<input type='hidden' name='idTrajet' value=" . $idTrajet . ">";
            echo "</tr></form>";
        }
        echo '</table>';
    }
}

function isAlreadyValide($idTrajet) {
    $valide = true;
    $tabTrajet = getTrajetByIdTrajet($idTrajet);
    if ($tabTrajet['valide'][0] == 0) {
        $valide = false;
    }
    return $valide;
}

function validerTrajet($idTrajet) {
    $co = connexionBdd();
    $updaText = "UPDATE trajet SET valide='1' WHERE idTrajet='" . $idTrajet . "'";
    mysqli_query($co, $updaText);
}

function nombrePassagersTrajet($idTrajet){
    $co=  connexionBdd();
    $reqTxt="SELECT * FROM passager WHERE idTrajet='".$idTrajet."' ";
    return mysqli_num_rows(mysqli_query($co, $reqTxt));
}

?>
