<?php
$chaine="prof=lemercier,cours=web,salle=C01,date=23/02/2010,cours=php";    
$tableauCles=array();
$tableauValeurs=array();
$tableauAssociatifInfos=array();
?>

<!DOCTYPE html>

<html>
    <head>
        <title>TD03_exo4</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <h1>Liste, chaîne et tableau associatif</h1>
        <?php 
        $premiereDivision=explode(",", $chaine);
        echo '<pre>';
        print_r($premiereDivision);
        echo '</pre>';
        $b=true;

        echo "</br>";
        foreach($premiereDivision as $value){
            $miniTableauChaine=explode("=", $value);
            $cle=$miniTableauChaine[0];
            $valeur=$miniTableauChaine[1];
            array_push($tableauCles, $cle);
            array_push($tableauValeurs, $valeur);
            $tableauAssociatifInfos[$cle]=$valeur;
        }
        echo "Tableau Clés: ";
        echo '<pre>';
        print_r($tableauCles);
        echo '</pre>';
        echo "</br>";
        
        echo "Tableau Valeurs: ";
        echo '<pre>';
        print_r($tableauValeurs);
        echo '</pre>';
        
        echo "Tableau Associatif: ";
        echo '<pre>';
        print_r($tableauAssociatifInfos);
        echo '</pre>';
        
        
        ?>
       
    </body>
</html>
