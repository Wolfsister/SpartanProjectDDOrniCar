<?php
$title = '';
include '../pagetype/hautPage.php';
?>


<div class="row">
    <?php
   include ('./profil.php');
    if (aUneVoiture($_SESSION['id'])) {
        include ('./maVoiture.php');
    } else {
        include ('./add_Voiture.php');
    }
  ?>
</div>



<?php
include '../pagetype/basPage.php';
?>