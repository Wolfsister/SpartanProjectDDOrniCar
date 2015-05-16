<?php
$path = "/code/proposerTrajet.php/";
$title='';
include '../pagetype/hautPage.php';
?>

<!--begin of the page-->
<div class="row">
	    <?php
    
		// si mec connecté dans variable de session, afficher header de connecté, sinon afficher header de déconnecté
			if ($_SESSION['connected'] == 1) {
				include 'proposerTrajetConnected.php';
			} else {
				include 'proposerTrajetNotConnected.php';
			}
			echo $_SESSION['connected'];
    ?>
</div>


<!--end of the page-->
<?php
include '../pagetype/basPage.php';
?>