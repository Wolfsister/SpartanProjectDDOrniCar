<?php
session_start();
require_once './fonctions.php';
$loginOK = false;
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>OrniCar</title>

        <!-- Google Fonts -->
        <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

        <!-- Custom CSS -->
        <link rel="stylesheet" href="css/owl.carousel.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/responsive.css">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="user-menu">
                            <ul>
                                <li><a href="compte.php"><i class="fa fa-user"></i>Mon Compte</a></li>
                                <li><a href="trajet.php"><i class="fa fa-heart"></i> Mes Trajets</a></li>
                                <li><a href="login.php"><i class="fa fa-user"></i> Login</a></li>
                                <li><a href="inscription.php"><i class="fa fa-user"></i> Inscription</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End header area -->

        <div class="site-branding-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="logo">
                            <h1><a href="index.html"><span>OrniCar</span></a></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End site branding area -->

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
                            <li class="active"><a href="test.html">Accueil</a></li>
                            <li><a href="RechercheTrajet.html">Chercher un trajet</a></li>
                            <li><a href="ProposeTrajet.html">Proposer un trajet</a></li>
                            <li><a href="Contact.html">Contact</a></li>
                        </ul>
                    </div>  
                </div>
            </div>
        </div> <!-- End mainmenu area -->

        <!--beginning of the page-->

        <div class="container">
            <div class="row pplan" id="anim1">
                <div class="col-md-12 col-xs-12 col-sm-12  pplan">
                    </br>
                    </br>
                    </br>
                </div>
            </div>
            <div class="row" id="anim2">
                <div class="col-md-4 col-sm-3">
                </div>
                <div class="col-md-4 col-xs-12 col-sm-6">
                    <form enctype="multipart/form-data" method='post' class="form-horizontal" role="form" action='./inscription_action.php'>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class="input-group">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="pseudo">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class="input-group">
                                        <input type="password" name="mdp" class="form-control" id="passe" placeholder="Mot de passe">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class="input-group">
                                        <input type="password" name="mdp2" class="form-control" id="passe2" placeholder="Confirmation mot de passe">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class="input-group">
                                        <label for="icone">Image de profil (JPG, PNG ou GIF | max. 15 Ko) :</label><br />
                                        <input type="file" name="icone" accept="image/*" id="icone" /><br />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class="checkbox">
                                        <label>
                                            <input class="check" name="accept" type="checkbox"> Accepter les <a href="conditions.html" onclick="window.open(this.href, 'exemple', 'height=757, width=400, toolbar=no, menubar=yes, location=no, resizable=yes, scrollbars=no, status=no');
                                                                    return false;">CGU</a>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <button type="submit" class="btn btn-default btn-lg btn-block" name="register">S'inscrire</button>
                                </div>
                            </div>
                            </br>
                            </br>
                            </br>
                            </br>
                        </form>

                    </div>

                <div class="col-md-4 col-sm-3">
                </div>
            </div>
        </div>

        <!--end of the page-->

        <div class="footer-top-area"><!--footer of the page-->
            <div class="zigzag-bottom"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="footer-about-us">
                            <h2>e<span>OrniCar</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni at?</p>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <div class="footer-menu">
                            <h2 class="footer-wid-title">Navigation</h2>
                            <ul>
                                <li><a href="#">Mon Compte</a></li>
                                <li><a href="#">Mes Trajets</a></li>
                            </ul>                        
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End footer top area -->

        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright">
                            <p>&copy; 2015 OrniCar. All Rights Reserved. Coded by BELPOMO Dorian & CHENESSEAU Denis</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End footer bottom area -->

        <!-- Latest jQuery form server -->
        <script src="https://code.jquery.com/jquery.min.js"></script>

        <!-- Bootstrap JS form CDN -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

        <!-- jQuery sticky menu -->
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.sticky.js"></script>

        <!-- jQuery easing -->
        <script src="js/jquery.easing.1.3.min.js"></script>

        <!-- Main Script -->
        <script src="js/main.js"></script>
    </body>
</html>