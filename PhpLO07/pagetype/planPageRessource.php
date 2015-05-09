<?php
$numeroTD = '';
$titlePageModele = 'Plan Ressources' . $numeroTD;
include('../pagetype/hautPage.php');
?>
<!-- Contenu -->
<h2>Ressources<?php echo $numeroTD; ?></h2>
<ul>
    <h3><li><a href='../pagetype/hautPage.php'>Haut de Page</a></li></h3>
    <ul><li><a href='../pagetype/header.php'>Header</a></li>
        <li><a href='../pagetype/entete.php'>Entête</a></li>
        <li><a href='../pagetype/navigation.php'>Navigation</a></li>
    </ul>
    <h3><li><a href='../pagetype/basPage.php'>Bas de Page</a></li></h3>
    <ul><li><a href='../pagetype/footer.php'>Footer</a></li></ul>
    <h3><li><a href='../pagetype/pageModele.php'>Première Page Modèle</a></li></h3>
    <h3><li><a href='../pagetype/pageModeleOptimisee.php'>Page Modèle Optimisée</a></li></h3>
    <h3><li><a href='../pagetype/planType.php'>Premier Plan Type</a></li></h3>
    <h3><li><a href='../pagetype/planTypeOptimise.php'>Plan Type Optimisé</a></li></h3>
</ul>

<?php
include('../pagetype/basPage.php');
?>
    