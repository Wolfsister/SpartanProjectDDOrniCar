

<div class="container">
    <div class="row pplan" id="anim1">
        <div class="col-md-12 col-xs-12 col-sm-12  pplan">
            </br>
            </br>
            </br>
        </div>
    </div>

    <div class="row" id="anim2">

        <div class="col-md-4 col-xs-12 col-sm-4">
            <div class="col-md-6 col-sm-12">
                <form class="form-horizontal" role="form" method="post" action="proposerTrajet_action.php">
                    <fieldset>
                        <legend>Proposer un Trajet</legend>

                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12  splan">
                                <div class="input-group">
                                    <input type="text" name="VilleDepart" id="VilleDepart" placeholder="Ville de Départ"/>
                                </div>
                            </div>
                        </div>

                       <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12  splan">
                                <div class="input-group">
                                    <input type="text" name="VilleArrivee" id="VilleDepart" placeholder="Ville d'Arrivée"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12  splan">
                                <div class="input-group">
                                    <input type="number" min='0' name="prix" id="prix" placeholder="Prix du voyage"/>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12  splan">
                                <div class="input-group">
                                    <input type="number" min='0' name="places" id="places" placeholder="Nombre de places disponibles pour les passagers"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <input type="date" name="date" min='2015-05-16' placeholder="Date (YYYY-MM-DD)">
                            </div>
                        </div>
                       
                        Plutot Faire un Select avec toutes les heures
                        <div class="form-group">  
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <input type="number" name="heure" min='0' max='24' placeholder="Heure (Format 24h)">   
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <input type="number" name="minute" min='0' max='59' placeholder="Minute(s)">
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <button type="submit" value="register" id="register" name="register" class="btn btn-default btn-lg btn-block">Proposer Trajet</button>
                            </div>
                        </div>
                    </fieldset>
                    </br>
                    </br>
                    </br>
                    </br>

                </form>
            </div>

        </div>
        <div class="col-md-4 col-sm-3">
        </div>
    </div>
</div>


