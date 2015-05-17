    <div class="row pplan" id="anim1">
        <div class="col-md-12 col-xs-12 col-sm-12  pplan">
            </br>
            </br>
            </br>
        </div>
    </div>
    <div class="row" id="anim2">
        <h2 class="titreAjoutVoiture">Ajouter une voiture :</h2>
        
            <form enctype="multipart/form-data" method='post' class="form-horizontal" role="form" action='./voiture_action.php'>

                <div class="form-group">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="input-group">
                            <input type="text" name="marque" class="form-control" id="marque" placeholder="Marque">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="input-group">
                            <input type="text" name="modele" class="form-control" id="modele" placeholder="Modèle">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="input-group">
                            <input type="text" name="couleur" class="form-control" id="couleur" placeholder="Couleur">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="input-group">
                            <input type="number" name="annee" class="form-control" id="annee" min='1950' max='2015'  placeholder="Année de mise en circulation">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-plus"></span></span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="input-group">
                            <label for="icone">Image de la voiture (JPG, PNG ou GIF | max. 200 Ko) :</label><br />
                            <input type="file" name="imvoiture" accept="image/*" id="icone" /><br />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="boutonDenisDorianAjouterVoitureZoheir col-md-12 col-xs-12 col-sm-12">
                        <button type="submit" class="btn btn-default btn-lg btn-block" name="register">Ajouter votre voiture</button>
                    </div>
                </div>
                </br>
                </br>
                </br>
                </br>
            </form>

        <div class="col-md-4 col-sm-3">
        </div>
    </div>
