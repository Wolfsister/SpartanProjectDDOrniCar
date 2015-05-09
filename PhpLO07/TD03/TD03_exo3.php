<?php
    $tableauAssociatifCapitalesPays=array("France" => "Paris", "Italie" => "Rome", "Belgique" => "Bruxelles", "Espagne" => "Madrid", "Allemagne" => "Berlin", "Portugal" => "Lisbonne");
    
?>

<!DOCTYPE html>

<html>
    <head>
        <title>TD03_exo3</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <h1>Tableaux Associatifs</h1>
        
        <h2>Tableau Associatif Pays/Capitales :</h2>
        <?php
        echo print_r($tableauAssociatifCapitalesPays);
        ?>
        
        <h2>Recherche d'une capitale en fonction d'un pays :</h2>
        <?php
        echo $tableauAssociatifCapitalesPays["Allemagne"]."</br>";
        echo $tableauAssociatifCapitalesPays["France"]."</br>";
        echo $tableauAssociatifCapitalesPays["Portugal"]."</br>";
        ?>
        
        <h2>Affichage du tableau grâce à une boucle foreach :</h2>
        <?php 
        foreach ($tableauAssociatifCapitalesPays as $key => $value) {
            echo $key;
            echo ' a pour capitale ';
            echo $value;
            echo '</br>';
        }
        ?>
        
        <h2>Affichage liste clés et liste valeurs :</h2>
        <h3>Affichage Liste Clés:</h3>
        <?php 
        echo '<pre>';
        print_r(array_keys($tableauAssociatifCapitalesPays));
        echo '</pre>';
        ?>
        <h3>Affichage Liste Valeurs:</h3>
        <?php 
        echo '<pre>';
        print_r(array_values($tableauAssociatifCapitalesPays));
        echo '</pre>';
        ?>
    </body>
</html>
