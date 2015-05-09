<?php
    $titlePageModele='TD07_Exo2_Module_Form';
    include('../pagetype/hautPage.php');
?>
<!-- Contenu -->

<form method="get" action='TD07_exo2_module_action.php'>
    </p><label>Sigle</label>
    <input type="text" name='sigle'>
    </p><label>Label</label>
    <input type="text" name='label'>
    </p><label>Catégorie</label>
    <input type="radio" name='categorie' value='CS'>CS
    <input type="radio" name='categorie' value='TM'>TM
    <input type="radio" name='categorie' value='EC'>EC
    <input type="radio" name='categorie' value='ME'>ME
    <input type="radio" name='categorie' value='CT'>CT
    </p><label>Effectif</label>
    <input type="number" name='effectif'>
    <br /><br />
    <input type='submit' name='Valider'>
    <input type='reset' name='Reset'>
</form>

<?php
    include('../pagetype/basPage.php');
?>