<?php session_start(); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <head>
        <title>TD06_Exo1_Récupérer Super Globales</title>
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
                    
                    function afficheSuperGlobale($tab=array()){
                        
                        echo '<p>';
                        foreach ($tab as $key => $value) {
                            if(is_array($value)){                            
                                echo $key.' => '.implode(', ',$value); 
                                echo '</br>';
                            }else{
                                echo $key.' => '.$value;
                                echo '</br>';
                            }                        
                        }
                        echo '</p>';  
                    }

                    if(isset($_GET) and (!empty($_GET))){
                        afficheSuperGlobale($_GET);
                    }else{
                        echo 'Pas de variables GET définies. </br>';
                    }
                    if(isset($_POST) and (!empty($_POST))){
                        afficheSuperGlobale($_POST);
                    }else{
                        echo 'Pas de variables POST définies. </br>';
                    }
                     if(isset($_COOKIE) and (!empty($_COOKIE))){
                        afficheSuperGlobale($_COOKIE);
                    }else{
                        echo 'Pas de variables COOKIE définies. </br>';
                    }
                     if(isset($_SESSION) and (!empty($_SESSION))){
                        afficheSuperGlobale($_SESSION);
                    }else{
                        echo 'Pas de variables SESSION définies. </br>';
                    }
                   
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
