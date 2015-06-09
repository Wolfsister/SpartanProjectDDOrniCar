<?php
$path = '';
$title = '';
include '../pagetype/hautPage.php';
?>

<div class="container">

    <?php
    $idTrajet = $_POST['idTrajet'];
    $idUser = $_SESSION['id'];
    $prix = $_POST['prix'];
    $nbPlacesRestantes = nombrePlacesRestantes($idTrajet);
    ?>
    <div class="row pplan" id="anim1">
        <div class="col-md-12 col-xs-12 col-sm-12  pplan">
            </br>
            </br>
            </br>
            <p>Combien de places voulez-vous réserver sur ce trajet ?</p>
            <form method="post" action="reservation.php">
                <select name="nbPlaces">
                    <?php
                    for ($index = 1; $index <= $nbPlacesRestantes; $index++) {
                        echo "<option value=".$index.">$index</option>";
                    }
                    ?>    
                </select> 
                <input type="hidden" name="idTrajet" value="<?php echo $idTrajet;?>">    
                <input type="hidden" name="prix" value="<?php echo $prix;?>">  
                <div class="col-md-12 col-xs-12 col-sm-12"><button type="submit" class="btn btn-default btn-lg btn-block" name="register">Réserver ce Trajet</button></div> 
            </form>
            </br>
            </br>
        </div>
    </div>

</div>


<?php
include '../pagetype/basPage.php';
?>