<?php

$title = '';

?>

<?php

if (!empty($_POST)) {

    if (empty($_POST["contenu"])) {
        include '../pagetype/hautPage.php';
        echo "Votre message est vide.<br/>";
        echo "<a href='boiteMessagerie.php'> Retour à la messagerie. </a>";
    } else {
        include "fonctions.php";
        $idReceveur=$_POST['idReceveur'];
        $contenu=$_POST['contenu'];
        insertIntoMessage($idReceveur, $contenu);
        header("Location: boiteMessagerie.php");
        
    }
}
?>



<?php

include '../pagetype/basPage.php';
?>



