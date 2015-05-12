<?php
$title='';
include '../pagetype/hautPage.php';
?>


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
                                        <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    </div>
                                </div>
                            </div>
                        
                            <div class="form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" name="nom" class="form-control" id="nom" placeholder="NOM">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <div class="input-group">
                                        <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Pseudo">
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

       
<?php
include '../pagetype/basPage.php';
?> 