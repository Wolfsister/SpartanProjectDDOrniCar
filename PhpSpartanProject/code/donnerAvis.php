<?php
$path = "";
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
                <form class="form-horizontal" role="form" method="post" action="donnerAvis_action.php">
                    <fieldset>
                        <legend>Donner un avis</legend>

                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12 ">
                                <div class="input-group">
                                    <label for="pseudo">Nom du conducteur</label><br/>
                                    <select name="pseudo" id="pseudo">
                                        <?php
											$co=  connexionBdd();
											$sql1 = " SELECT DISTINCT pseudo FROM user ";
											$result1 = mysqli_query($co, $sql1) or die("Requete pas comprise");
											while ($row1 = mysqli_fetch_array($result1)) {
												echo "<option>" . $row1[pseudo] . " </option> ";
											}
                                        ?> 
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12">
								<fieldset class="rating">
									<input type="radio" id="star5" name="rating" value="5" /><label for="star5" title="Rocks!">5 stars</label>
									<input type="radio" id="star4" name="rating" value="4" /><label for="star4" title="Pretty good">4 stars</label>
									<input type="radio" id="star3" name="rating" value="3" /><label for="star3" title="Meh">3 stars</label>
									<input type="radio" id="star2" name="rating" value="2" /><label for="star2" title="Kinda bad">2 stars</label>
									<input type="radio" id="star1" name="rating" value="1" /><label for="star1" title="Sucks big time">1 star</label>
								</fieldset>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <button type="submit" value="register" id="register" name="register" class="btn btn-default btn-lg btn-block">Enregistrer ce vote</button>
                            </div>
                        </div>
                    </fieldset>
                    </br>
                    </br>
                    </br>
                    </br>

                </form>
        <div class="col-md-4 col-sm-3">
        </div>
    </div>
</div>

<!--end of the page-->


<?php
include '../pagetype/basPage.php';
?>