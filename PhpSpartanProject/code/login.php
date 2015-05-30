<?php
$title = 'Se Connecter à OrniCar';
include '../pagetype/hautPage.php';
?>

<!--begin of the page-->

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
            <form class="form-horizontal" role="form" method="post" action="login_action.php">
                <div class="form-group">
                    <div class="col-md-12 col-xs-12 col-sm-12  splan">
                        <div class="input-group">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="input-group">
                            <input type="password" name="passe" class="form-control" id="passe" placeholder="Mot de passe">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="checkbox">
                            <label>
                                <input name="accept" type="checkbox"> Se rappeler de moi
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <button type="submit" value="register" id="register" name="register" class="btn btn-default btn-lg btn-block">Se Connecter</button>
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