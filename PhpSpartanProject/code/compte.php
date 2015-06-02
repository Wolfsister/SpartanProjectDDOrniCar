<?php
$title = '';
include '../pagetype/hautPage.php';
?>


<div class="row">
    <?php if($_SESSION['connected']==1){ ?>
    <div class='monCompte'>



        <?php include '../code/profil.php'; ?>


        <section id='profilVoiture'>
            <h1 class='titreMaVoiture'>Ma Voiture</h1>           

            <?php
            if (aUneVoiture($_SESSION['id']) == true) {
                include ('../code/maVoiture.php');
            } else {
                include ('../code/add_voiture.php');
            }
            ?>

        </section>
    </div>    

    <?php }else{ ?>
    <div class="container">
    <p>Veuillez d'abord vous connecter.</p>
    </div>
    <?php } ?>
        
</div>




<?php
include '../pagetype/basPage.php';
?>