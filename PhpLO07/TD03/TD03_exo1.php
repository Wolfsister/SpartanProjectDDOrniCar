<?php
$format = "d-m-Y : H:i:s";
$date = date($format);
echo "Vivez l'instant ! </br>";

echo "$date </br>";
echo("Bonjour à tous !");
define("NOM", "CHENESSEAU");
define("PRENOM", "Denis");
define("AGE", "20");
?>        

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <head>
        <title>TD03_Exo1</title>
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
                    <p>
                        <?php
                        echo("Je m'appelle ");
                        echo(\PRENOM);
                        echo(" !");
                        ?>

                        <ul>
                            <li>Nom: <?php echo(\NOM) ?></li>
                            <li>Prénom: <?php echo(\PRENOM) ?></li>
                            <li>Âge: <?php echo(\AGE) ?></li>
                        </ul>
                    </p>

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
