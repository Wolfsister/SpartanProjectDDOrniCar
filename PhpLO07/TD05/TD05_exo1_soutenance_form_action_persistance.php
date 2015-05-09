

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <head>
        <title>TD05_exo1_soutenance_form_action_persistance</title>
        <?php
        include('../pagetype/header.php');
        ?>
    </head>

    <body>
        <div id="global">
            <div id="entete">
                <?php
                include('../pagetype/entete.php');
                ?>
            </div><!-- #entete -->
            <div id="centre">
                <div id="navigation">
                    <?php
                    include('../pagetype/navigation.php');
                    ?>
                </div><!-- #navigation -->
                <div id="contenu">

                    <?php
                    include('fonctions.php');
                    ?>

                    <h3>Affichage Jours:</h3>
                    <?php
                    echo '<pre>';
                    print_r(listJour());
                    echo '</pre>';
                    ?>

                    <h3>Affichage Mois:</h3>
                    <?php
                    echo '<pre>';
                    print_r(listMois());
                    echo '</pre>';
                    ?>

                    <h3>Affichage Heures:</h3>
                    <?php
                    echo '<pre>';
                    print_r(listHeures());
                    echo '</pre>';
                    ?>

                    <h3>Affichage Salles:</h3>
                    <?php
                    echo '<pre>';
                    print_r(listSalles());
                    echo '</pre>';
                    ?>

                    <h2>Sélection Créneaux:</h2>




                    <form method="post" action = ''>

                        <?php
                        if (!empty($_POST)) {
                            printf("<li>Jour : %s </li>", $_POST["Jour"]);
                            printf("<li>NumJour : %s </li>", $_POST["NumJour"]);
                            printf("<li>Mois : %s </li>", $_POST["Mois"]);
                            printf("<li>Heure : %s </li>", $_POST["Heure"]);
                            printf("<li>Salle : %s </li>", $_POST["Salle"]);
                            persistance('premierFichier.csv');
                            
                        } else {
                            formulaire_select(listJour(), 'Jour');
                            formulaire_select(listNumJour(), 'NumJour');
                            formulaire_select(listMois(), 'Mois');
                            formulaire_select(listHeures(), 'Heure');
                            formulaire_select(listSalles(), 'Salle');
                            buttonsResetSend();
                        }
                        ?>
                    </form>



                </div><!-- #contenu -->
            </div><!-- #centre -->
            <div id="pied">
                <p id="copyright">
                    <?php
                    include('../pagetype/footer.php');
                    ?>
                </p>
            </div><!-- #pied -->
        </div><!-- #global -->

    </body>


</html>

