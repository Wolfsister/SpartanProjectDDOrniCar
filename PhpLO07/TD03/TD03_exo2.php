<?php
    $title= "Capitales d'Etats des USA";
    $tabCapitalesUSA=array("Montgomery","Raleigh","Tallahasee","Atlanta","Topeka","Augusta","Albany","Nashville");
?>

<!DOCTYPE html>

<html>
    <head>
        <title>TD03_exo2</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        
        <h1>Tableaux en PHP</h1>
        
        <h2>Affichage avec print_r() :</h2>
        <?php
        echo $title ;
        echo " : "; 
        print_r($tabCapitalesUSA);
        ?>
        
        <h2>Affichage avec print_r() et balise pre :</h2>
        <?php
        echo $title ;
        echo " : "; 
        echo '<pre>';
        print_r($tabCapitalesUSA);
        echo '</pre>';
        ?>
        
        <h2>Affichage avec boucle foreach :</h2>
        <?php
        $count=0;
        foreach ($tabCapitalesUSA as $value) {
        $count++;
        echo $count;
        echo ' -Ville = ';
        echo $value;
        echo '</br>';
        }
        echo 'Nombre de villes = ';
        echo $count;
        ?>
        
        <h2>Affichage avec implode() :</h2>
        <?php
        echo implode(" et ", $tabCapitalesUSA)."</br>";
        echo implode(" & ", $tabCapitalesUSA)."</br>";
        echo implode(" ; ", $tabCapitalesUSA)."</br>";
        echo implode(" , ", $tabCapitalesUSA)."</br>";
        echo implode(" > ", $tabCapitalesUSA)."</br>";
        echo implode(" beats ", $tabCapitalesUSA)."</br>";
        echo implode(" USA ", $tabCapitalesUSA);
        ?>
        
        <h2>Divers Essais :</h2>
        <h4>Sélectionner un élément du tableau par sa position :</h4>
        <?php
        echo "3ème élément : ";
        echo ($tabCapitalesUSA[2])."</br>";  
        echo "5ème élément : ";
        echo ($tabCapitalesUSA[4])."</br>"; 
        echo "1er élément : ";
        echo ($tabCapitalesUSA[0])."</br>";
        ?>
        <h4>Connaître Nombre d'Eléments d'un Tableau :</h4>
        <?php
        echo ('Nombre éléments tableau = '); 
        echo count($tabCapitalesUSA);
        ?>
        <h4>Trier le tableau par ordre alphabétique</h4>
        <?php
        $tableauTriAlpha=$tabCapitalesUSA;
        sort($tableauTriAlpha);
        echo "Tableau Trié : ";
        echo implode(' ABC ', $tableauTriAlpha);
        ?>
        
        <?php
        echo "</br>Test Tableau Original : ";
        echo implode(' followed by ', $tabCapitalesUSA);
        ?>
    </body>
</html>

