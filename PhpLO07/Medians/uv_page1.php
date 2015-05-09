<?php
    include 'declaration.php';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>
            Median UV Page1
        </title>
        <!-- La feuille de styles "base.css" doit être appelée en premier. -->
        <link rel="stylesheet" type="text/css" href="../TD02/styles/base.css" media="all" />
        <link rel="stylesheet" type="text/css" href="../TD02/styles/modele07.css" media="screen" />
    </head>
    
    <body>
        <form method='get' action='uv_page2.php'>
            <p/><label>Nom</label>
            <input type='text' name='nom'/>
            <p/><label>Prénom</label>
            <input type='text' name='prenom'/>
            <p/><label>Filière</label>
            <?php
            $tabfil=  array_keys($isi);
            foreach ($tabfil as $value) {
                echo ('<input type=\'radio\' name=\'filiere\' value='.$value.'>'.$value);  
            }
            ?>
            <input type='submit' name='Valider'>            
        </form>       
    </body>       
 </html>       
