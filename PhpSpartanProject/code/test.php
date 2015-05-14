<?php
$title='Test';
include '../pagetype/hautPage.php';
?>

<p>
<?php

//$tab=array("user"=>(array("pseudo"=>"Admin","motdepasse"=>"admin")));
//echo '<pre>';
//print_r($tab);
//echo '</pre>',
//$tabRes=searchInDataBase($tab);
//print_r($tabRes);

//    createIDCar();

$co=  connexionBdd();
$requete= "SELECT idUser FROM user WHERE user.pseudo='Wolfsister'";
$query=mysqli_query($co, $requete);
$tabQuery=mysqli_fetch_array($query);
echo $tabQuery['idUser'];
?>
    
      
</p>



<?php
include '../pagetype/basPage.php';
?>