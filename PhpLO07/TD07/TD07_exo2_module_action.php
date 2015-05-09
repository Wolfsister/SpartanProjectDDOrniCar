<?php
    $titlePageModele='TD07_Exo2_Module_Action';
    include('../pagetype/hautPage.php');
    require_once 'Cmodule.php';
?>
<!-- Contenu -->
<?php

$categorie=$_GET['categorie'];
$effectif=$_GET['effectif'];
$label=$_GET['label'];
$sigle=$_GET['sigle'];
$module=new Cmodule($sigle, $label, $categorie, $effectif);

if($module->valide()){
    $module->pageOK();
    echo ($module->sauveTXT()."<br />\n");
    echo ($module->sauveBDR("etudiants")."<br />\n");
}else{
    $module->pageKO();
}

?>

<?php
    include('../pagetype/basPage.php');
?>