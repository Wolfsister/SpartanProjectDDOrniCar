<?php
$pageEnCours=basename($path, ".php"); // nous permet de récupérer la page sur laquelle on est en train de naviguer
?>


<div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li <?php if($pageEnCours=='index'){echo 'class="active"';} ?>><a href="../code/index.php">Accueil</a></li>
                        <li <?php if($pageEnCours=='rechercheTrajet'){echo 'class="active"';} ?>><a href="../code/rechercheTrajet.php">Chercher un trajet</a></li>
                        <li <?php if($pageEnCours=='proposerTrajet'){echo 'class="active"';} ?>><a href="../code/proposerTrajet.php">Proposer un trajet</a></li>
                        <li <?php if($pageEnCours=='contact'){echo 'class="active"';} ?>><a href="../code/contact.php">Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->