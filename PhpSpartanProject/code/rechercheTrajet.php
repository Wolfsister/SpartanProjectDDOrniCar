<?php
$path = "/code/rechercheTrajet.php/";
$title = 'Recherche Trajet';
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

        <div class="col-md-4 col-xs-12 col-sm-4">
            <div class="col-md-6 col-sm-12">
                <form class="form-horizontal" role="form" method="post" action="recherche_action.php">
                    <fieldset>
                        <legend>Recherche avancée</legend>

                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12  splan">
                                <div class="input-group">
                                    <label for="nom">Ville de départ</label><br/>
                                    <select name="VilleDepart" id="VilleDepart">
                                        <?php
                                        $co=  connexionBdd();
                                        $sql1 = " SELECT DISTINCT villeDepart FROM trajet ";
                                        $result1 = mysqli_query($co, $sql1) or die("Requete pas comprise");
                                        while ($row1 = mysqli_fetch_array($result1)) {
                                            echo "<option>" . $row1[villeDepart] . " </option> ";
                                        }
                                        ?> 
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="input-group">
                                    <label for="nom">Ville d'arrivée</label><br/>
                                    <select name="VilleArrivee" id="VilleArrivee">
                                        <?php
                                        $co=  connexionBdd();
                                        $sql2 = " SELECT DISTINCT villeArrivee FROM trajet ";
                                        $result2 = mysqli_query($co, $sql2) or die("Requete pas comprise");
                                        while ($row2 = mysqli_fetch_array($result2)) {
                                            echo "<option>" . $row2[villeArrivee] . " </option> ";
                                        }
                                        ?> 
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <input type="date" name="DateDepart">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <button type="submit" value="register" id="register" name="register" class="btn btn-default btn-lg btn-block">Faire une recherche</button>
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

<!--end of the page-->


<?php
include '../pagetype/basPage.php';
?>