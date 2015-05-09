<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <head>
        <title>TD05_exo1_soutenance_action</title>
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
                    printf("<li>Jour : %s </li>", $_GET["Jour"]);
                    printf("<li>NumJour : %s </li>", $_GET["NumJour"]);
                    printf("<li>Mois : %s </li>", $_GET["Mois"]);
                    printf("<li>Heure : %s </li>", $_GET["Heure"]);
                    printf("<li>Salle : %s </li>", $_GET["Salle"]);

                    ?>    

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
