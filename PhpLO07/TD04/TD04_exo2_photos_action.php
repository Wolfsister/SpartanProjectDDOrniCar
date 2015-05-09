<!DOCTYPE html>

<html>
    <head>
        <title>TD04_exo2_photos_action LO07</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h2>Fichiers Envoyés :</h2>
        <ul>
            
        <?php
//        $myfile = fopen("coordonnees.txt", "w") or die("Unable to open file!");
//        $txt = $_GET["nom"]."\n";
//        fwrite($myfile, $txt);
//        $txt = $_GET["prenom"]."\n";
//        fwrite($myfile, $txt);
//        $txt = $_GET["email"]."\n";
//        fwrite($myfile, $txt);
            echo "Nom : ".$_POST["nom"]."</br>";
            echo "Prénom : ".$_POST["prenom"]."</br>";
            echo "Email : ".$_POST["email"]."</br>";
          
            $tab1=$_FILES['image1'];
            $nomtemporaire1=$tab1["tmp_name"];
            print_r($tab1);
            echo "</br>";
            move_uploaded_file($nomtemporaire1, "documents/image1.jpg");
            $size=$tab1["size"];
            $type=$tab1["type"];
            $constant_name=$tab1["name"];
            echo "Le fichier 1 qui s'appelle ".$constant_name." est de type ".$type." et pèse ".$size." octets.";
            
            $tab1=$_FILES['image2'];
            $nomtemporaire2=$tab1["tmp_name"];
            echo "</br>";
            move_uploaded_file($nomtemporaire2, "documents/image2.jpg");
            $size=$tab1["size"];
            $type=$tab1["type"];
            $constant_name=$tab1["name"];
            echo "Le fichier 2 qui s'appelle ".$constant_name." est de type ".$type." et pèse ".$size." octets.";
            
            $tab1=$_FILES['image3'];
                $nomtemporaire3=$tab1["tmp_name"];
            echo "</br>";
            move_uploaded_file($nomtemporaire3, "documents/image3.jpg");
            $size=$tab1["size"];
            $type=$tab1["type"];
            $constant_name=$tab1["name"];    
            echo "Le fichier 3 qui s'appelle ".$constant_name." est de type ".$type." et pèse ".$size." octets.";
          
            //move_uploaded_files
        ?>
       </ul>     
        
    </body>
</html>



