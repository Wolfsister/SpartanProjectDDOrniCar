<?php
$title = '';
include '../pagetype/hautPage.php';
?>


<div class="row">
    <div class='monCompte'>



        <?php include '../code/profil.php'; ?>


        <section id='profilVoiture'>
            <h1 class='titreMaVoiture'>Ma Voiture</h1>           

            <?php
            if (aUneVoiture($_SESSION['id']) == true) {
                include ('../code/maVoiture.php');
            } else {
                include ('../code/add_Voiture.php');
            }
            ?>

        </section>
    </div>    

</div>




<?php
include '../pagetype/basPage.php';
?>