<?php

$title = '';
include '../pagetype/hautPage.php';
?>

<?php

if (!empty($_POST)) {

    echo $_POST['contenu'];
    if (empty($_POST["contenu"])) {
        echo "Votre message est vide.<br/>";
        echo "<a href='inscription.php'> Retour à l'inscription </a>";
    } else {
        echo "JE usis la";
        $idReceveur=$_POST['idReceveur'];
        $contenu=$_POST['contenu'];
        insertIntoMessage($idReceveur, $contenu);

        
    }
}
?>



<?php

include '../pagetype/basPage.php';
?>



