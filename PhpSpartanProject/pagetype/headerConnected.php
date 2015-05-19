<?php
if ($_SESSION['id'] != 1) { //Si utilisateur n'est pas l'admin
?>    


    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><img src="../ressources/imagesProfiles/<?php echo $_SESSION['pseudo']; ?>.jpg" alt='Image de Profil de l\'Utilisateur' style="width:30px; height:30px;"/></li>                       
                            <li>Bonjour <?php echo $_SESSION['pseudo']; ?></li>
                            <li><a href="../code/compte.php"><i class="fa fa-user"></i> Mon Compte</a></li>
                            <li><a href="../code/mesTrajets.php"><i class="fa fa-user"></i> Trajets</a></li>
                            <li><a href="../code/logout.php">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->

    <?php
} else {   //Si utilisateur est l'admin
    ?>

    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><img src="../ressources/imagesProfiles/<?php echo $_SESSION['pseudo']; ?>.jpg" alt='Image de Profil de l\'Utilisateur' style="width:30px; height:30px;"/></li>                       
                            <li>Bonjour <?php echo $_SESSION['pseudo']; ?></li>
                            <li><a href="../code/compte.php"><i class="fa fa-user"></i> Mon Compte</a></li>
                            <li><a href="../code/mesTrajets.php"><i class="fa fa-user"></i> Trajets</a></li>
                            <li><a href='../code/listeTousComptesAdmin.php'><i class="fa fa-user"></i> Tous Les Comptes</a></li>
                            <li><a href='../code/listeTousTrajetsAdmin.php'><i class="fa fa-user"></i> Tous Les Trajets</a></li>
                            <li><a href="logout.php">Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End header area -->
    <?php
}
?>
